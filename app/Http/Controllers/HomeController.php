<?php

namespace App\Http\Controllers;
use App\Models\PhotoModel;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $models = PhotoModel::all();
        return view('pages.home',compact('models'));
    }
}
