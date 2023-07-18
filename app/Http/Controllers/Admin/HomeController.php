<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    //
    public function index():View{
        $title = "Dashboard";
        return view('admin.dashboard',compact('title'));
    }
}
