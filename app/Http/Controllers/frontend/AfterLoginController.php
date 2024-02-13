<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AfterLoginController extends Controller
{
    public function billing_address(Request $request){
        $rules = [
            'billing_address' => 'required',
        ];

        $custommessage = [];

        $this->validate($request, $rules, $custommessage);
        try {
            $user = User::find(auth()->id());
            $user->billing_address = $request->billing_address;
            $user->save();
            return redirect()->back()->with('success','Billing Address Updated Successfully.');
        } catch (\Exception $th) {
            return redirect()
                ->back()
                ->with('error', $th->getMessage());
        }
    }
}
