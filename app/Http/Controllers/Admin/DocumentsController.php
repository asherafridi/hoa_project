<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Document";
        $document = Document::paginate(10);
        return view('admin.document.list',compact('title','document'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Document";
        return view('admin.document.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'doc'=>'required'
        ]);
        if ($request->hasFile('doc')) {
            $file = $request->file('doc');
            $filename = $file->store('uploads/documents', 'public');
            $request['file']= $filename;

            // Now, $filename contains the path or filename of the stored file.
        }
        $request['adminId']=auth()->guard('admin')->user()->id;
        $document = new Document;
        $document->create($request->all());
        return redirect('/admin/documents')->with('success','Operation Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="View Document";
        $document=Document::find($id);
        return view('admin.document.detail',compact('title','document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $title="Edit Document";
        $document=Document::find($id);
        
        return view('admin.document.edit',compact('title','document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $document = Document::findOrFail($id);
    
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'doc' => 'required' // Allow 'file' to be optional
    ]);

    // Check if a new file has been uploaded
    if ($request->hasFile('doc')) {
        $file = $request->file('doc');
        $filename = $file->store('uploads/documents', 'public');
        $document->file =  $filename; // Update the file path

    }
    // Update other fields
    $document->name = $request->input('name');
    $document->description = $request->input('description');
    
    $document->save();

    return redirect('/admin/documents')->with('success', 'Operation Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document=Document::find($id);
        $document->delete();
        return redirect('/admin/documents')->with('success','Operation Successfull');
    }
}
