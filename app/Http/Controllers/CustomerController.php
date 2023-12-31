<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $clients = Customer::orderBy('id', 'desc')->get();
        return view('admin.client',compact('clients'))->with('no');
    }
}
