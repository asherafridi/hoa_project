<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Document;
use App\Models\Events;
use App\Models\Gallery;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SiteController extends Controller
{
    public function home()
    {
        $title = "Home";
        $vendor = Vendor::limit(4)->get();
        $gallery = Gallery::whereIn('forUser', ['Members Only', 'Both'])->limit(4)->get();
        return view('frontend.basic.home', compact('title', 'vendor', 'gallery'));
    }
    public function reset()
    {
        Artisan::run('migrate:fresh');
        Artisan::run('db:seed');
        return redirect('/');
    }
    public function gallery()
    {
        $title = "Gallery";
        $images = Gallery::whereIn('forUser', ['Members Only', 'Both'])->paginate(9);
        return view('frontend.basic.gallery', compact('title', 'images'));
    }
    public function events()
    {
        $title = "Events";
        $events = Calendar::whereIn('forUser', ['Members Only', 'Both'])->paginate(12);
        return view('frontend.basic.event', compact('title', 'events'));
    }
    public function eventPage($id)
    {
        $event = Calendar::find($id);
        $title = $event->eventName;
        return view('frontend.basic.eventPage', compact('title', 'event'));
    }
    public function documents()
    {
        $title = "Documents";
        $document = Document::whereIn('forUser', ['Members Only', 'Both'])->paginate(12);
        return view('frontend.basic.document', compact('title', 'document'));
    }
    public function contactForm(Request $request)
    {
        return response()->json(['message' => 'Success'], 200);
    }
    public function newsForm(Request $request)
    {
        $title = "Thanks";
        return view('frontend.basic.thanks', compact('title'));
    }
    public function memberApproval(Request $request)
    {
        $title = "Member Approval";
        return view('frontend.basic.member-not-approved', compact('title'));

    }


}
