<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;

class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories      = Category::with('posts')->orderBy('name')->paginate($this->limit);
        $categoriesCount = Category::count();

        return view("backend.categories.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view("backend.categories.create", compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryStoreRequest $request)
    {
        Category::create($request->all());

        return redirect("/backend/categories")->with("message", "New category was created successfully!");
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
        $category = Category::findOrFail($id);

        return view("backend.categories.edit", compact('category'));
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
        Category::findOrFail($id)->update($request->all());

        return redirect("/backend/categories")->with("message", "Category was updated successfully!");
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

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect("/backend/categories")->with("message", "Category was deleted successfully!");
    }

     public function search(Request $request)
    { 

        $request->flash();       
        $id = $request->get('id');
        $name = $request->get('name');
        $code = $request->get('code');
        $description = $request->get('description');

        $categories      = Category::where('id', '=', $id)
                            ->orwhere('name', 'like', $name)
                            ->orwhere('code', '=', $code)
                            ->whereNull('description', '=', $description)
                            ->with('posts')
                            ->orderBy('name')
                            ->paginate($this->limit);
        $categoriesCount = Category::where('id', '=', $id)->
                            orwhere('name', 'like', $name)->
                            orwhere('code', '=', $code)->
                            whereNull('description', '=', $description)->
                            count();     

        return view("backend.categories.index", compact('categories', 'categoriesCount'));
    }

}
