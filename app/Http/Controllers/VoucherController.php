<?php

namespace App\Http\Controllers;

use App\Models\PhotoModel;
use Illuminate\Http\Request;
use App\Models\Voucher;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return view('vouchers.index', compact('vouchers'))->with('no');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $models = PhotoModel::get();
        return view('vouchers.create', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_voucher' => 'required',
            'type' => 'required',
            'value_discount' => 'required',
            'min_price_order' => 'required',
            'max_value_price_discount' => 'required',
            'min_product_order' => 'required',
            'status' => 'required',
        ]);

        Voucher::create($request->all());
        return redirect()->route('vouchers.index')->with('success', 'Voucher created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        return view('vouchers.show', compact('voucher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        $models = PhotoModel::get();
        return view('vouchers.edit', compact('voucher', 'models'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'code_voucher' => 'required',
            'type' => 'required',
            'value_discount' => 'required',
            'max_value_price_discount' => 'required',
            'min_price_order' => 'required',
            'min_product_order' => 'required',
            'status' => 'required',
        ]);

        $voucher->update($request->all());

        return redirect()->route('vouchers.index')->with('success', 'Voucher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect()->route('vouchers.index')->with('success', 'Voucher deleted successfully');
    }

    public function validateVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher_code');
        $minOrderAmount = $request->input('total_price_order');
        $minProductAmount = $request->input('total_price_product');
        $include_model = $request->input('include_model');

        // Query the database to check if the voucher code exists
        $query = Voucher::where('code_voucher', $voucherCode)
            ->where('status', 'Aktif')
            ->where('min_price_order', '<=', $minOrderAmount)
            ->where('min_product_order', '<=', $minProductAmount);
            $query->where(function ($subquery) use ($include_model) {
                foreach ($include_model as $modelId) {
                    $subquery->orWhere('include_model', '=', $modelId);
                }
            });

            $isValidVoucher = $query->exists();

        return response()->json(['valid' => $isValidVoucher]);
    }
}
