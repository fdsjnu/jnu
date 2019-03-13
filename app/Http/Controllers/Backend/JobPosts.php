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

class JobPosts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobposts      = JobPost::with('department')->orderBy('id')->paginate($this->limit);
        $jobpostsCount = JobPost::count();

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
        JobPost::create($request->all());

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
        $category = JobPost::findOrFail($id);

        return view("backend.jobposts.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoryUpdateRequest $request, $id)
    {
        JobPost::findOrFail($id)->update($request->all());

        return redirect("/backend/jobposts")->with("message", "Job post was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\CategoryDestroyRequest $request, $id)
    {
        Post::withTrashed()->where('category_id', $id)->update(['category_id' => config('cms.default_category_id')]);

        $category = JobPost::findOrFail($id);
        $category->delete();

        return redirect("/backend/jobposts")->with("message", "Data was deleted successfully!");
    }
}
