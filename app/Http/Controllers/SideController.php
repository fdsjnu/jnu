<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SideController extends Controller
{
    public function index()
    {
        return view("side.index");
    }
    public function signup()
    {
        return view("side.signup");
    }

}

