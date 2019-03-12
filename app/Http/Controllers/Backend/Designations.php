<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Category;
//use App\Post;
use App\Designation;


class Designations extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates      = Designation::orderBy('name')->paginate($this->limit);
        $candidatesCount = Designation::count();

        return view("backend.designations.index", compact('candidates', 'candidatesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Designation();
        return view("backend.designations.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DesignationRequest $request)
    {
        Designation::create($request->all());

        return redirect("/backend/designations")->with("message", "New designation was created successfully!");
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
        $category = Designation::findOrFail($id);

        return view("backend.designations.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\DesignationRequest $request, $id)
    {
        Designation::findOrFail($id)->update($request->all());

        return redirect("/backend/designations")->with("message", "Designation was updated successfully!");
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

        $category = Designation::findOrFail($id);
        $category->delete();

        return redirect("/backend/designations")->with("message", "Designation was deleted successfully!");
    }

     public function search(Request $request)
    { 

        $request->flash();       
        $id = $request->get('id');
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');

        $candidates      = Designation::where('id', '=', $id)
                            ->orwhere('name', 'like', $name)
                            ->orwhere('code', '=', $code)
                            ->orderBy('name')
                            ->paginate($this->limit);
        $candidatesCount = Designation::where('id', '=', $id)->
                            orwhere('name', 'like', $name)->
                            orwhere('code', '=', $code)->
                            count();     

        return view("backend.designations.index", compact('candidates', 'candidatesCount'));
    }

}
