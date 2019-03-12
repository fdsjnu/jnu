<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Department;
use App\Post;

class DepartmentController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('name')->paginate($this->limit);
        $departmentsCount = Department::count();
        ////echo "<pre>"; print_r($departments);die;
        return view("backend.departments.index", compact('departments', 'departmentsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = new Department();
        return view("backend.departments.create", compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DepartmentStoreRequest $request)
    {
        Department::create($request->all());

        return redirect("/backend/departments")->with("message", "New department was created successfully!");
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
        $department = Department::findOrFail($id);
		//print_r( $department);die;
        return view("backend.departments.edit", compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\DepartmentUpdateRequest $request, $id)
    {
        Department::findOrFail($id)->update($request->all());

        return redirect("/backend/departments")->with("message", "Department was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\DepartmentDestroyRequest $request, $id)
    {
        //Post::withTrashed()->where('department_id', $id)->update(['department_id' => config('cms.default_department_id')]);

        $department = Department::findOrFail($id);
        $department->delete();

        return redirect("/backend/departments")->with("message", "Department was deleted successfully!");
    }

     public function search(Request $request)
    { 

        echo "hello";die;
        $id = \Request::get('id');
        dd($id);
        $id = $request->get('id');
        $departments = Department::where('id', '=', $id)->with('posts')->orderBy('name')->paginate($this->limit);
        $departmentsCount = Department::where('id', '=', $id)->count();
         
      

        return view("backend.departments.index", compact('departments', 'departmentsCount'));
    }

}
