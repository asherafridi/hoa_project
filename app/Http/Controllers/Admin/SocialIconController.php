<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SocialIconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $json='{"title":"","social_icon":"","url":""}';
    public function index()
    {
        
        $title='Social Icons';
        $social = Settings::where('key','social_icon')->get();
        return view('admin.settings.social-icon.index',compact('title','social'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Social Icons Create';
        return view('admin.settings.social-icon.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $map= json_decode($this->json);
        $map->title=$request->title;
        $map->social_icon=$request->social_icon;
        $map->url=$request->Url;

        $setting=Settings::create([
            "key"=>"social_icon",
            "description"=>json_encode($map)
        ]);
        return redirect('admin/settings/social')->with(['success'=>'Operation is Successfull']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title="Edit Social Media Icon";
    $setting = Settings::findOrFail($id); // Assuming 'Settings' is your model
    return view('admin.settings.social-icon.edit', compact('setting','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    
    $setting = Settings::findOrFail($id);
    // Validate the incoming data if needed
    // Update the specific setting
    $map = json_decode($setting->description);
    $map->title = $request->title;
    $map->social_icon = $request->social_icon;
    $map->url = $request->Url;
    
    // Encode the modified data back to JSON
    $updatedDescription = json_encode($map);
    
    // Update the setting's description field
    $setting->update([
        "description" => $updatedDescription,
    ]);
    
    return redirect('admin/settings/social')->with(['success' => 'Operation is successful']);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Settings::findOrFail($id); // Assuming 'Settings' is your model
    $setting->delete();

    return redirect('admin/settings/social')->with(['success' => 'Icon deleted successfully']);
    }
}
