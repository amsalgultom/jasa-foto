<?php

namespace App\Http\Controllers;

use App\Models\PhotoModel;
use Illuminate\Http\Request;

class PhotoModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = PhotoModel::orderBy('id', 'desc')->get();
        return view('models.index',compact('models'))->with('no');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'available_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .'-'. $request->name .'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/models'), $imageName);
            // You can also store the image path in the database if needed
        }
  
        PhotoModel::create($request->except('image') + ['image' => $imageName ?? null]);
   
        return redirect()->route('models.index')->with('success','PhotoModel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoModel $model)
    {
        return view('models.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoModel $model)
    {
        return view('models.edit',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoModel $model)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'available_date' => 'required'
        ]);
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() .'-'. $request->name .'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/models'), $imageName);
            // You can also update the image path in the database if needed
            $model->image = $imageName;
        }

        $model->update($request->except('image'));
  
        return redirect()->route('models.index')->with('success','PhotoModel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoModel $model)
    {
        $model->delete();
  
        return redirect()->route('models.index')->with('success','PhotoModel deleted successfully');
    }
}