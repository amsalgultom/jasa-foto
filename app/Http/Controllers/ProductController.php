<?php

namespace App\Http\Controllers;

use App\Models\PhotoBackground;
use App\Models\PhotoModel;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::join('models', 'products.model_id','=','models.id')
                            ->leftjoin('photobackgrounds', 'products.photobackground_id','=','photobackgrounds.id')
                            ->select('models.*','products.*','products.*', 'models.name as mondelname', 'models.available_date as model_available_date', 'products.name as prodname', 'products.image as prodimage','photobackgrounds.name as background')
                            ->orderBy('products.id', 'desc')
                            ->get();

        return view('products.index', compact('products'))->with('no');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $models = PhotoModel::orderBy('id', 'desc')->get();
        $photobackgrounds = PhotoBackground::orderBy('id', 'desc')->get();
        return view('products.create', compact('models','photobackgrounds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'model_id' => 'required',
            'photobackground_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/products'), $imageName);
            // You can also store the image path in the database if needed
        }

        Product::create($request->except('image') + ['image' => $imageName ?? null]);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $models = PhotoModel::orderBy('id', 'desc')->get();
        $photobackgrounds = PhotoBackground::orderBy('id', 'desc')->get();
        return view('products.edit',compact('product', 'models','photobackgrounds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'model_id' => 'required',
            'photobackground_id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads-images/products'), $imageName);
            // You can also update the image path in the database if needed
            $product->image = $imageName;
        }

        $product->update($request->except('image'));

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function getDataProduct(Request $request){
        
        $model_ids = $request->input('model_id');
        $photobackground = $request->input('photobackground');
        $get_product = Product::join('models', 'products.model_id','=','models.id')
            ->select('products.*', 'models.name as mondelname')
            ->where('products.type', 'Product Foto')
            ->whereIn('models.id', explode(',', $model_ids))
            ->where('products.photobackground_id', $photobackground)
            ->orderBy('products.id', 'desc')
            ->get();
        return response()->json($get_product);
    }

    public function getDataProductOptional(Request $request){
        $model_ids = $request->input('model_id');
        $photobackground = $request->input('photobackground');
        $get_product = Product::join('models', 'products.model_id','=','models.id')
                    ->select('products.*', 'models.name as mondelname')
                    ->where('products.type', 'Our Service')
                    ->whereIn('models.id', explode(',', $model_ids))
                    ->where('products.photobackground_id', $photobackground)
                    ->orderBy('products.id', 'desc')
                    ->get();
        return response()->json($get_product);
    }
}
