<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\CouponManagement;

class FCouponController extends Controller
{
    //
    public function coupon_apply(Request $request){
        try {
            $coupon = CouponManagement::where('code', $request->code)->first();
            dd($request->all());
            return view('backend.blogs.index', compact('blogs', 'no'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
