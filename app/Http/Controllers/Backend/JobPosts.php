<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\JobPost;
use App\Designation;
use App\Department;
use App\User;
use App\PostJobCategory;

use Illuminate\Support\Facades\Auth;
class JobPosts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobposts      = JobPost::with('departments')->orderBy('id','desc')->paginate($this->limit);
        $jobpostsCount = JobPost::count();

        //dd($jobposts);

        return view("backend.jobposts.index", compact('jobposts', 'jobpostsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$category = new JobPost();
        $items = Designation::all(['id', 'name']);
        $departments = Department::all(['id','name']);
        
        return view("backend.jobposts.create", compact('items',$items,'departments',$departments));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\JobPostRequest $request)
    {

       
         $currentUser = Auth::user();
         $data = $request->all();
         $data['created_by'] = $currentUser->email;
         $lastId =JobPost::create($data);

         // $categories = Category::all();

         // foreach ($categories as $category) {
         //        $post_job_category = new PostJobCategory;
         //        $post_job_category->post = $request->input('post');
         //        $post_job_category->job = $lastId->id;
         //        $post_job_category->category  = $category->id;
         //        $post_job_category->save();
         // }


        return redirect("/backend/jobposts")->with("message", "New job post was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobpost = JobPost::findOrFail($id);
        $total_postjobcategory = PostJobCategory::where('job','=',$id)->where('vacancy','!=','0')->count();
        $postjobcategory = PostJobCategory::where('job','=',$id)->get();
        $totalVacancy = PostJobCategory::where('job','=',$id)->sum('vacancy');

        return view("backend.jobposts.show", compact('jobpost','total_postjobcategory','postjobcategory','totalVacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobpost = JobPost::findOrFail($id);
        //dd($jobpost);

        return view("backend.jobposts.edit", compact('jobpost'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\JobPostRequest $request, $id)
    {
        //dd($request);
         $data = $request->all();
         $lastId =PostJobCategory::create($data);


        return redirect("/backend/jobposts")->with("message", "Job post was updated successfully!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editjobcategory($id,$post)
    {
        $jobpost = JobPost::findOrFail($id);
        $total_postjobcategory = PostJobCategory::where('job','=',$id)->where('vacancy','!=','0')->count();
        $postjobcategory = PostJobCategory::where('job','=',$id)->get();
        $categories = Category::all();


        return view("backend.jobposts.editjobcategory", compact('jobpost','total_postjobcategory','postjobcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatejobcategory(Request $request, $id)
    {
        //dd($request);
         PostJobCategory::where('job', $id)->delete();
        //  $data = $request->all();
        //  PostJobCategory::create($data);
        // $formValue                = new PostJobCategory;
        // $formValue->post = $request->post;
        // $formValue->job         = $request->job;
        // $formValue->category = $request->category;
        // $formValue->save();

        for ($i = 1; $i < count($request->category); $i++) {
                $answers[] = [
                    'category' => $request->category[$i],
                    'vacancy' => $request->vacancy[$i],
                    'post' => $request->post,
                    'job' => $request->job,
                    'amount' => $request->amount[$i],
                    'noFee' => $request->noFee[$i],  
                    'allowed' => $request->allowed[$i]
                ];
            }
        PostJobCategory::insert($answers);

        // $answer = new PostJobCategory;
        // $answer->post     = $post;
        // $answer->job     = $job;
       
        // for($i = 1; $i < count($request->category); $i++) {
        //     $answer->category     = $request->category[$i];
        // }
        // for($i = 1; $i < count($request->vacancy); $i++) {
        //     $answer->vacancy     = $request->vacancy[$i];
        // }
        // for($i = 1; $i < count($request->amount); $i++) {
        //     $answer->amount     = $request->amount[$i];
        // }
        // for($i = 1; $i < count($request->noFee); $i++) {
        //     $answer->noFee     = $request->noFee[$i];
        // }
        // for($i = 1; $i < count($request->allowed); $i++) {
        //     $answer->allowed     = $request->allowed[$i];
        // }
       
        // $answer->save();

        return redirect("/backend/editjobcategory/{$id}/{$request->post}")->with("message", "Categorywise Vacancies & Fee was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Post::withTrashed()->where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);

        $jobpost = JobPost::findOrFail($id);
        $jobpost->delete();

        return redirect("/backend/jobposts")->with("message", "Data was deleted successfully!");
    }

    public function search(Request $request)
    { 

        $request->flash();       
        $id = $request->get('id');
        $post = $request->get('post');
        $department = $request->get('department');
        $startDate = $request->get('startDate');
        $closeDate = $request->get('closeDate');
        $status = $request->get('status');
          
        $jobposts      = JobPost::where('id', '=', $id)
                        ->orwhere('post', '=', $post)
                        ->orwhere('department', '=', $department)
                        ->orwhere('startDate', '=', $startDate)
                        ->orwhere('closeDate', '=', $closeDate)
                        ->orwhere('status', '=', $status)
                        ->orderBy('id','desc')->paginate($this->limit);
        $jobpostsCount = JobPost::where('id', '=', $id)
                        ->orwhere('post', '=', $post)
                        ->orwhere('department', '=', $department)
                        ->orwhere('startDate', '=', $startDate)
                        ->orwhere('closeDate', '=', $closeDate)
                        ->orwhere('status', '=', $status)
                        ->count();     

        return view("backend.jobposts.index", compact('jobposts', 'jobpostsCount'));
    }
}
