<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Events;
use App\Models\Gallery;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        return view('frontend.basic.home');
    }
    public function gallery(){
        $title="Gallery";
        $images= Gallery::paginate(9);
        return view('frontend.basic.gallery',compact('title','images'));
    }
    public function events(){
        $title="Events";
        $events=Events::paginate(12);
        return view('frontend.basic.event',compact('title','events'));
    }
    public function documents(){
        $title="Documents";
        $document=Document::paginate(12);
        return view('frontend.basic.document',compact('title','document'));
    }
}
