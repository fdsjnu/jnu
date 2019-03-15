<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests; 
use App\Category;
use App\Post;
use App\JobPost;
use App\Designation;
use App\Department;
use App\User;
use App\PostJobCategory;

class SideController extends Controller
{
    public function index()
    {
    	$jobposts      = JobPost::distinct()->select('post','startDate','startingTime','closeDate','closingTime','post')->groupby('post')->get();
    	//$totalVacancy = PostJobCategory::groupby('post')->sum('vacancy');
    	//dd($jobposts->post);
        return view("side.index", compact('jobposts'));
    }
    public function signup()
    {
        return view("side.signup");
    }
    public static function totalVacancy($id)
    {
    	$totalVacancy = PostJobCategory::where('post','=',$id)->sum('vacancy');
    	return $totalVacancy;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SignupStoreRequest $request)
    {
    	//dd($request->role);
        $user = User::create($request->all());
        $user->attachRole($request->role);

        return redirect("/side")->with("message", "New user was created successfully!");
    }

}

