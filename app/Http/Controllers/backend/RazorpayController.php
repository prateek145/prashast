<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Order;
use App\Models\backend\Orderdetail;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;


class RazorpayController extends Controller
{
    public function razor_payment(Request $request)
    {

        $data = $request->all();
        unset($data['_token']);
        if (auth()->id()) {
            # code...
            $data['user_id'] = auth()->id();
        } else {
            $data['user_id'] = 'not found';
        }
        session()->put('user_payment', $data);
        // dd(session()->get('user_payment'));
        return redirect()->route('razorpay.payment');
    }

    public function razorpayProduct()
    {
        return view('frontend.payment.razorpay');
    }

    public function razorPaySuccess(Request $request)
    {
        $userdetails = session()->get('user_payment');
        // dd($userdetails);

        if ($userdetails['user_id'] == 'not found') {
            # code...
            $password = rand();
            $user = new User();
            $user->name = $userdetails['name'];
            $user->password = bcrypt($password);
            $user->role = 'user';
            $user->email = $userdetails['email'];
            $new_user = $user->save();
            // dd($new_user);
            $userdetails['user_id'] = $user->id;

            Mail::send('frontend.emails.userregister', ['new_user' => $new_user, 'password' => $password], function ($message) use ($new_user, $password) {
                $message->to('prateekk898@gmail.com');
                $message->subject('payment notification');
                // $message->to($emails, $requestData['mail_subject'])->subject($requestData['mail_subject']);
                $message->from('dev@omegawebdemo.com.au');
            });
        }

        $order = new Order();
        $order->customer_id = $userdetails['user_id'];
        $order->order_date = Carbon::now();
        $order->order_status = 'success';
        $order->customer_name = $userdetails['name'];
        $order->customer_phone = $userdetails['phone'];
        $order->customer_email = $userdetails['email'];
        $order->customer_address = $userdetails['address'];
        $order->customer_country = $userdetails['country'];
        $order->customer_state = $userdetails['state'];
        $order->customer_zipcode = $userdetails['pincode'];
        $order->save();


        $productdetails = json_decode($userdetails['productdetail']);
        for ($i = 0; $i < count($productdetails); $i++) {
            # code...
            $orderdetails = new Orderdetail();
            $orderdetails->order_sku = $productdetails[$i]->sku;
            $orderdetails->order_id = $order->id;
            $orderdetails->order_quantity = $productdetails[$i]->quantity;
            $orderdetails->order_price = $productdetails[$i]->price;
            $orderdetails->save();
        }

        $message_in = 'payment is done';
        $id = 1;
        Mail::send('frontend.emails.paymentdone', ['id' => $id], function ($message) use ($message_in) {
            $message->to('prateekk898@gmail.com');
            $message->subject('payment notification');
            // $message->to($emails, $requestData['mail_subject'])->subject($requestData['mail_subject']);
            $message->from('dev@omegawebdemo.com.au');
        });

        session()->flush('cart');
        session()->flush('user_payment');

        return redirect()->route('razorpay.thank.you');
    }

    public function RazorThankYou()
    {
        return view('frontend.payment.thankyou');
    }
}
