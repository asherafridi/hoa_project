<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $title="Gallery";
        $gallery = Gallery::paginate(10);
        return view('admin.gallery.list',compact('title','gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Gallery";
        return view('admin.gallery.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'file'=>'required'
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->store('/storage/uploads/gallery','public');
            $request['image']="/" . $filename;
            // Now, $filename contains the path or filename of the stored file.
        }
        $document = new Gallery;
        $document->create($request->all());
        return redirect('/admin/gallery')->with('success','Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="View Gallery";
        $gallery=Gallery::find($id);
        return view('admin.gallery.detail',compact('title','gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $title="Edit Gallery";
        $gallery=Gallery::find($id);
        
        return view('admin.gallery.edit',compact('title','gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $document = Gallery::findOrFail($id);
    
    $validated = $request->validate([
        'name' => 'required',
        'file' => 'required' // Allow 'file' to be optional
    ]);

    // Check if a new file has been uploaded
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->store('/storage/uploads/gallery', 'public');
        $document->image = "/" . $filename; // Update the file path
    }

    // Update other fields
    $document->name = $request->input('name');
    
    $document->save();

    return redirect('/admin/gallery')->with('success', 'Operation Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document=Gallery::find($id);
        $document->delete();
        return redirect('/admin/gallery')->with('success','Operation Successfull');
    }
}
