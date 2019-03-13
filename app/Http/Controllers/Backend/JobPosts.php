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
         JobPost::create($data);
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
        //
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
         $currentUser = Auth::user();
         $data = $request->all();
         $data['updated_by'] = $currentUser->email;
        //JobPost::findOrFail($id)->update($request->all());
         JobPost::findOrFail($id)->update($data);

        return redirect("/backend/jobposts")->with("message", "Job post was updated successfully!");
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
