<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function frontend(){
        $title='Frontend';
        $tempFrontend  = array_filter(glob('../resources/views/frontend/*'), 'is_dir');
        foreach ($tempFrontend as $key => $temp) {
            $arr                      = explode('/', $temp);
            $frontend[$key]                 = end($arr);
        }
        $currentFrontend=Settings::where('key','website_frontend')->firstOrFail();

        
        return view('admin.settings.frontend',compact('frontend','currentFrontend','title'));
    }  
    public function frontendUpdate(Request $request){
        
        $currentFrontend=Settings::where('key','website_frontend')->firstOrFail();
        $currentFrontend->description=$request->description;
        $currentFrontend->save();

        return redirect('/admin/settings/frontend');
    } 
    public function website(){
        $title='Website Settings';
        $name=Settings::where('key','website_name')->firstOrFail();
        $website_name=$name->description;
        return view('admin.settings.website',compact('title','website_name'));
    }

    public function nameUpdate(Request $request){
        $name=Settings::where('key','website_name')->firstOrFail();
        $name->description=$request->name;
        $name->save();
        return redirect('/admin/settings/website')->with('success','Operation Successfull');
    }
    public function logoUpdate(Request $request){
        $logo=Settings::where('key','website_logo')->firstOrFail();
        $request->validate([
            'logo' => 'required|mimes:jpg,png,jpeg|max:2048'
            ]);
            if($request->file('logo')) {
                $fileName = time().'_'.$request->file('logo')->getClientOriginalName();
                $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
                
                $logo->description = '/storage/' . $filePath;
                $logo->save();
                return back()
                ->with('success','File has been uploaded.');
            }
    }

    public function iconUpdate(Request $request){
        $icon=Settings::where('key','website_icon')->firstOrFail();
    }

    public function header(){
        $title='Header Setting';
        return view('admin.settings.header',compact('title'));
    }
    public function headerUpdate(Request $request){
        if($request->header_subtitle){
            setting_update('header_subtitle',$request->header_subtitle);
        }
        
        if($request->header_title){
            setting_update('header_title',$request->header_title);
        }
        if($request->header_background){
            $image_address= $request->header_background->store('uploads/header_background');
            setting_update('header_background',$image_address);
        }

        return redirect()->back()->with('success','Operation Successfull');

    }

    
    public function about(){
        $title='About Setting';
        return view('admin.settings.about',compact('title'));
    }
    
    public function aboutUpdate(Request $request){
        if($request->about_background){
            $image_address= $request->about_background->store('uploads/about_background');
            setting_update('about_background',$image_address);
        }
        unset($request['about_background']);
        unset($request['_token']);
        foreach($request->all() as $key=>$value){
            if($key="about_background"){
                continue;
            }
            if($request->$key){      
                setting_update($key,$value);
            }
        }
        return redirect()->back()->with('success','Operation Successfull');
    }
    public function social(){
        
    }
}
