<?php

namespace App\Http\Controllers\backend;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Models\backend\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function orders_export(){
        try {
            if (request()->input('start_date') && request()->input('end_date')) {
                # code...
                // dd(request()->input('start_date'), request()->input('end_date'));
                $orders = Order::whereBetween('created_at', [request()->input('start_date'), request()->input('end_date')])->get();
                $file_name = 'orders.xls';
                $count = 1;
                foreach ($orders as $key => $value) {
                    # code...
                    $value->count = $count;
                    $count++;
                }

                foreach ($orders as $key => $value) {
                    foreach (json_decode($value->product_details, true) as $key1 => $value1) {
                        $value->product_name  .= 'product name = ' . $value1['name'] . ' ';
                        $value->product_sku .= 'product sku = ' . $value1['sku'] . ' ';
                        $value->product_price .= 'product price = ' . $value1['price'] . ' ';
                        $value->product_qty .= 'product qty = ' . $value1['qty'] . ' ';
                    }
                }

                $export = Excel::store(new OrdersExport($orders), $file_name, 'local');
                $file = storage_path() . '/app/orders.xls';
                return \Response::download($file, 'orders.xls');
    
            }else{
                $orders = Order::latest()->get();
                $file_name = 'orders.xls';
                $count = 1;
                foreach ($orders as $key => $value) {
                    # code...
                    $value->count = $count;
                    $count++;
                }

                foreach ($orders as $key => $value) {
                    foreach (json_decode($value->product_details, true) as $key1 => $value1) {
                        $value->product_name  .= 'product name = ' . $value1['name'] . ' ';
                        $value->product_sku .= 'product sku = ' . $value1['sku'] . ' ';
                        $value->product_price .= 'product price = ' . $value1['price'] . ' ';
                        $value->product_qty .= 'product qty = ' . $value1['qty'] . ' ';
                    }
                }
                $export = Excel::store(new OrdersExport($orders), $file_name, 'local');
                $file = storage_path() . '/app/orders.xls';
                return \Response::download($file, 'orders.xls');
    
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
