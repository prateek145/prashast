<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\CouponManagement;
use App\Models\backend\Product;
use App\Models\backend\ProductSubcategory;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupons = CouponManagement::latest()->get();
        $categories = ProductSubcategory::latest()->get();
        $products = Product::where('status', 1)->latest()->get();
        $no = 1;
        return view('backend/coupon/create', compact('coupons', 'categories', 'no', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'code' => 'required',
            'type' => 'required',
            'count' => 'required',
            'value' => 'required',
            // 'category' => 'required'

        ];

        $custommessages = [

        ];

        $this->validate($request, $rules, $custommessages);
        try {
            $data = $request->all();
            // dd($data);
            unset($data['_token']);
            if ($request->products) {
                # code...
                $data['products']=json_encode($request->products);
            }
            // dd($data);
            CouponManagement::create($data);

            return redirect()->back()->with('success', 'Successfully created.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = CouponManagement::find($id);
        $categories = ProductSubcategory::latest()->get();
        $products = Product::where('status', 1)->latest()->get();
        return view('backend/coupon/edit', compact('coupon', 'categories', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'code' => 'required',
            'type' => 'required',
            'count' => 'required',
            'value' => 'required',
            // 'category' => 'required'

        ];

        $custommessages = [

        ];

        $this->validate($request, $rules, $custommessages);
        try {
            $data = $request->all();
            unset($data['_token']);

            $coupon = CouponManagement::find($id);
            if ($request->products) {
                # code...
                $data['products']=json_encode($request->products);
            }
            $coupon->update($data);
            return redirect()->back()->with('success', 'Successfully Updated Successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
