<?php

namespace App\Http\Controllers;

use App\Models\PhotoBackground;
use Illuminate\Http\Request;

class PhotoBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photobackgrounds = PhotoBackground::orderBy('id', 'desc')->get();
        return view('photobackgrounds.index',compact('photobackgrounds'))->with('no');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photobackgrounds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .'-'. $request->name .'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/photobackgrounds'), $imageName);
            // You can also store the image path in the database if needed
        }
  
        PhotoBackground::create($request->except('image') + ['image' => $imageName ?? null]);
   
        return redirect()->route('photobackgrounds.index')->with('success','PhotoBackground created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoBackground $photobackground)
    {
        return view('photobackgrounds.show',compact('photobackground'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoBackground $photobackground)
    {
        return view('photobackgrounds.edit',compact('photobackground'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoBackground $photobackground)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .'-'. $request->name .'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/photobackgrounds'), $imageName);
            // You can also update the image path in the database if needed
            $photobackground->image = $imageName;
        }

        $photobackground->update($request->except('image'));
  
        return redirect()->route('photobackgrounds.index')->with('success','PhotoBackground updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoBackground $photobackground)
    {
        $photobackground->delete();
  
        return redirect()->route('photobackgrounds.index')->with('success','PhotoBackground deleted successfully');
    }
}