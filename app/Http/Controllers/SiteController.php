<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Document;
use App\Models\Events;
use App\Models\Gallery;
use App\Models\Vendor;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $title="Home";
        $vendor= Vendor::limit(4)->get();
        $gallery = Gallery::limit(4)->get();
        return view('frontend.basic.home',compact('title','vendor','gallery'));
    }
    public function gallery(){
        $title="Gallery";
        $images= Gallery::paginate(9);
        return view('frontend.basic.gallery',compact('title','images'));
    }
    public function events(){
        $title="Events";
        $events=Calendar::paginate(12);
        return view('frontend.basic.event',compact('title','events'));
    }
    public function eventPage($id){
        $event = Calendar::find($id);
        $title = $event->eventName;
        return view('frontend.basic.eventPage',compact('title','event'));
   }
    public function documents(){
        $title="Documents";
        $document=Document::paginate(12);
        return view('frontend.basic.document',compact('title','document'));
    }
    public function contactForm(Request $request){
        return response()->json(['message' => 'Success'], 200);
    }
    public function newsForm(Request $request){
        $title = "Thanks";
        return view('frontend.basic.thanks',compact('title'));
    }


}
