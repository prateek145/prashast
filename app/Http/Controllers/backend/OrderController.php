<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = Order::latest()->get();
            // dd($orders);
            return view('backend.orders.index', ['orders' => $orders])->with('no', 1);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error Occured');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $orders = Order::where(['id' => $id])->first();
            return view('backend.orders.show', compact('orders'))->with('no', 1);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $order = Order::where('id', $id)->first();
            $order_details = Json_decode($order->product_details);
            // dd($order, $order_details);
            return view('backend.orders.show', compact('order_details','order'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
            'name' => 'required|max:100',

        ];

        $custommessages = [
            'name.required' => 'Name is required',

        ];

        $this->validate($request, $rules, $custommessages);

        $data = $request->all();


        $orders = Order::where(['id' => $id])->first();


        // if ($request->featured_image) {
        //     # code...
        //     if ($user->featured_image) {
        //         # code...
        //         // unlink(storage_path('app/public/user_profile/'. $user->featured_image));
        //     }

        //     $image = $request->featured_image;
        //     $filename = rand() . $image->getClientOriginalName();
        //     $image_resize = Image::make($image->getRealPath());
        //     $image_resize->resize(400, 400);
        //     $image_resize->save(storage_path('app/public/user_profile/' . $filename));
        //     unset($data['featured_image']);
        //     $data['featured_image'] = $filename;
        // }

        $orders->update($data);
        return redirect()->back()->with('success', 'Succesfully ' . $request->name . ' Updated');
        try {
            //dd($request->all());

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
        try {
            Order::destroy($id);
            return redirect()->back()->with('success', 'Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
