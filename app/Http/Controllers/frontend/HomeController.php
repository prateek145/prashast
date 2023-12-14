<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Desiner;
use App\Models\backend\Product;
use App\Models\backend\Order;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Contact;
use App\Models\Schedule_a_purchase;
use App\Models\wishlist;
use App\Models\BulkOrder;
use App\Models\backend\ProductCategories;
use App\Models\backend\ProductSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function home()
    {
        $categories = ProductCategories::where('status', 1)->get()->take(4);
        $products = Product::where(['status' => 1, 'show_in_featuredproduct' => 1])->get();
        $sub_categories = ProductSubcategory::where('parent_id', 1)->get();
        // dd($sub_categories);
        $desiners = Desiner::all()->take(4);
        return view('frontend.welcome', compact('categories', 'products', 'desiners', 'sub_categories'));
    }

    public function contact_us()
    {
        $sub_categories = ProductSubcategory::where('parent_id', 4)->get();
        return view('frontend.contactus', compact('sub_categories'));
    }

    public function dynamic_categories($slug)
    {
        $cat = ProductCategories::where('slug', $slug)->first();
        $products = $cat->products()->get();
        $subcategories = $cat->subcategories()->get();
        // dd($cat, $products, $subcategories);
        return view('frontend.dynamic_cat', compact('cat', 'products', 'subcategories'));
    }

    public function dynamic_subcategories($slug)
    {
        if ($slug == 'shop') {
            # code...
            $categroy = ProductCategories::find(1);
            $products1 = Product::where('status', 1)->get();
            $productids = [];
            for ($i=0; $i <count($products1) ; $i++) { 
                # code...
                $product = Json_decode($products1[$i]->product_categories);
                if (in_array($categroy->id, $product)) {
                    # code...
                    array_push($productids, $products1[$i]->id);
                }
            }    
            $sub_categories = ProductSubcategory::where('parent_id', 1)->get();
            $products = Product::whereIn('id', $productids)->get();
            return view('frontend.dynamic_subcat', compact('products', 'sub_categories'));

        } else {
            # code...
            $subcategory = ProductSubcategory::where('slug', $slug)->first();
            $products1 = Product::where('status', 1)->get();
            $productids = [];
            for ($i=0; $i <count($products1) ; $i++) { 
                # code...
                $product = Json_decode($products1[$i]->product_subcategories);
                if (in_array($subcategory->id, $product)) {
                    # code...
                    array_push($productids, $products1[$i]->id);
                }
            }
            $sub_categories = ProductSubcategory::where('parent_id', 1)->get();
            $products = Product::whereIn('id', $productids)->get();
            return view('frontend.dynamic_subcat', compact('products', 'subcategory', 'sub_categories'));
        }
        
    }

    public function product_detail($slug)
    {
        $session = session()->get('cart');
        $product = Product::where('slug', $slug)->first();
        if ($product->desiner_id != 0) {
            # code...
            $desiner = Desiner::find($product->desiner_id);
            $desiner_name = $desiner->name;
        } else {
            $desiner_name = 'Not Registered';
        }

        if ($product->product_type == 'simple_product') {
            # code...
            $latestproduct = Product::orderBy('id', 'ASC')->where('status', 1)->get()->take(3);
            // dd($product);
            return view('frontend.product-detail1', compact('product', 'latestproduct', 'desiner_name'));
        }

        if ($product->product_type == 'variable_product') {
            # code...
            $attr = $product->attributes()->get();
            $variance = $product->variance()->get();
            $latestproduct = Product::orderBy('id', 'DESC')->where('status', 1)->get()->take(3);
            // dd($latestproduct);
            // dd($product, $attr, $variance, $latestproduct);
            return view('frontend.product-detail1', compact('product', 'attr', 'variance', 'latestproduct', 'desiner_name'));
        }
    }

    public function get_product_attr(Request $request)
    {
        dd($request->all());
    }

    public function cart()
    {
        $products = session()->get('cart');
        // dd($products);
        return view('frontend.cart', compact('products' ));
    }

    public function paytm_payment(Request $request){

        // $rules = [
        // 'name' => 'required',
        // 'email' => 'required|email',
        // // 'phone' => 'required|integer|min:10',
        // 'address' => 'required',
        // 'country' => 'required',
        // 'state' => 'required',
        // // 'pincode' => 'required|integer',

        //  ];

        //  $custommessages = [
        //      'name.required' => 'Name is required *',
        //      'phone.required' => 'Phone is required *',
        //     //  'phone.integer' => 'Phone should be number *',
        //      'email.required' => 'Email is required *',
        //      'address.required' => 'Address is required *',
        //      'country.required' => 'Country is required *',
        //      'state.required' => 'State is required *',
        //     //  'pincode.required' => 'Pincode is required *',
        //     //  'pincode.integer' => 'Phone should be number *',

        //  ];
     
        //  $this->validate($request, $rules, $custommessages);
        try {
            //code...
          
            // dd($request->all());
            session()->put('userdetails', $request->all());
            $currentTime = time();
    
            $environment    = "TEST";
            $mid="BZktXB05180965204710";
            $order_id="ORDER_".time();
            $PAYTM_MERCHANT_KEY="VM60ziBspua&p%lk";
            $WEBSITE="WEBSTAGING";
            $amount = 1;
           
          
            // $chbody= '{"requestType":"Payment","mid":"'.$mid.'","orderId":"'.$order_id.'","websiteName":"'.$WEBSITE.'","txnAmount":{"amount":"1.00","currency":"INR"},"userInfo":{"custId":"CUST23645"},"callbackUrl":"https://eprashast.co.in/paytm-done"}}';
            $chbody= '{"requestType":"Payment","mid":"'.$mid.'","orderId":"'.$order_id.'","websiteName":"'.$WEBSITE.'","txnAmount":{"value":"'. $amount .'","currency":"INR"},"userInfo":{"custId":"CUST23645"},"callbackUrl":"https://eprashast.co.in/paytm-done"}}';
            
    
            $Checksumhash = self::generateSignature($chbody,$PAYTM_MERCHANT_KEY);
            
            $Checksumhash = '"'.$Checksumhash.'"';
            
            
            $body = '{
            "head":{
               "clientId":"C11",
               "signature":'.$Checksumhash.'
            },
            "body":'.$chbody.'
            }';
            
            
            
            $header = array('Content-Type:application/json');
            
            if($environment == "TEST")
            $url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=$order_id";
            if($environment == "PROD") {
            $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=$mid&orderId=$order_id";
            }
            
            
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the output in string format
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);     
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);   
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $output = curl_exec ($ch); // execute
                $info = curl_getinfo($ch);
            
                $data = json_decode($output, true);
                // dd($data);
                // echo "<pre/>";
                // echo "URL:  ";
                // //echo "<pre/>";
                // echo $url;
                // echo "<pre/>";
                // echo "HEADER:  ";
                // echo "<pre/>";
                // print_r($header);
                // echo "<pre/>";
                // echo "REQUEST:";  
                // //echo $data_string;
                // echo "<pre/>";
                // echo wordwrap($body,150, "\n",true);
                // echo "<pre/>";
                // echo "RESPONSE:";
                // echo "<pre/>";
                // echo $output;
                // echo "<pre/>";
                // print_r($data);
                // echo "<pre/>";
    
                $txn_token = $data['body']['txnToken'];
                // dd('working Testing Credentials', $data);
                $userdetails = $request->all();
                // dd('prateek');
                // dd($txn_token, $order_id, $userdetails, $amount);
                return view('frontend/paytm', ['token'=>'done', 'txn_token'=>$txn_token, 'userdetails'=>$userdetails, 'order_id'=>$order_id, 'amount'=>$amount]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back($th->getMessage());
        }
    }

    public function paytm_done(Request $request){
        // dd($request->all(), session()->get('userdetails'));
        
        if ($request->STATUS == 'TXN_SUCCESS') {
            # code...
            if (auth()->user()) {
                # code...
                $transaction_detials = json_encode($request->all());
                // dd($transaction_detials);
                $order_id = $request->ORDERID;
                $data = session()->get('userdetails');
                $pdetails = $data['productdetail'];
                $amount = $data['subtotal'];
                unset($data['productdetail']);
                unset($data['subtotal']);

                $data['amount'] = $amount;
                $data['product_details'] = $pdetails;
                $data['transaction_details'] = $transaction_detials;
                $data['order_id'] = $order_id;
                $data['user_id'] = auth()->id();
                $orders1 = Order::create($data);
                Mail::send('mail.customer', ['order' => $orders1 ], function ($message) use ($data) {
                    $message->sender(env('MAILFROM'), 'Donatofy');
                    $message->subject('Purchase');
                    $message->to($data['email']);
                });
        
                Mail::send('mail.admin', ['cdetails' => $data, 'pdetails' => json_decode($pdetails, true)], function ($message) {
                    $message->sender(env('MAILFROM'), 'Donatofy');
                    $message->subject('Purchase');
                    $message->to(env('ADMINMAIL'));
                });
        
                session()->flush('cart');
                session()->flush('userdetails');
                return redirect('user-orders')->with('success', 'Payment Done');
            } else {
                # code...
                $transaction_detials = json_encode($request->all());
                // dd($transaction_detials);
                $order_id = $request->ORDERID;
                $data = session()->get('userdetails');
                $pdetails = $data['productdetail'];
                $amount = $data['subtotal'];
                unset($data['productdetail']);
                unset($data['subtotal']);
                $data['product_details'] = $pdetails;
                $data['amount'] = $amount;
                $data['transaction_details'] = $transaction_detials;
                $data['order_id'] = $order_id;
                // dd($data);
                $orders1 = Order::create($data);
                Mail::send('mail.customer', ['order' => $orders1 ], function ($message) use ($data) {
                    $message->sender(env('MAILFROM'), 'Donatofy');
                    $message->subject('Purchase');
                    $message->to($data['email']);
                });
        
                Mail::send('mail.admin', ['cdetails' => $data, 'pdetails' => json_decode($pdetails, true)], function ($message) {
                    $message->sender(env('MAILFROM'), 'Donatofy');
                    $message->subject('Purchase');
                    $message->to(env('ADMINMAIL'));
                });
        
                session()->flush('cart');
                session()->flush('userdetails');
                return redirect('cart')->with('success', 'Payment done Please Check Your Email');
            }
            


        }else {
            return redirect()->back()->with('error', 'Payment Failed.');
        }
    }

    public function wishlist()
    {

        $products_id = wishlist::where(['user_id' => auth()->id()])->pluck('product_id');
        $products = Product::whereIn('id', $products_id)->get();
        $sub_categories = ProductSubcategory::where('parent_id', 1)->get();

        // dd($products);
        return view('frontend.wishlist', compact('products', 'sub_categories'));
    }

    public function productpage()
    {
        $products = Product::orderBy('id', 'ASC')->get()->take(8);
        return view('frontend.shoppage', compact('products'));
    }

    public function searchproduct(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->where('status', 1)->get();
        // dd($products);
        return view('frontend.shoppage', compact('products'));
    }

    public function become_a_vendor()
    {
        // dd('prateek');
        return view('frontend.become_a_vendor');
    }

    public function place_a_bulk_order()
    {
        return view('frontend.place_a_bulk_order');
    }

    public function vendor_save(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        unset($data['_token']);
        Vendor::create($data);
        return redirect()->back()->with('success', 'Your message was sent successfully! We will be in touch as soon as We can !');
    }

    public function bulk_order_save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        BulkOrder::create($data);
        return redirect()->back()->with('success', 'Your message was sent successfully! We will be in touch as soon as We can !');
    }

    public function contact_us_save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        Contact::create($data);
        return redirect()->back()->with('success', 'Your message was sent successfully! We will be in touch as soon as We can !');
    }

    public function payment_done(Request $request)
    {
        $data = $request->all();
        unset($data['product_details']);
        $data['product_details'] = json_encode($request->product_details);
        // dd($data);
        $orders1 = Order::create($data);
        Mail::send('mail.customer', ['order' => $orders1 ], function ($message) use ($data) {
            $message->sender(env('MAILFROM'), 'Donatofy');
            $message->subject('Purchase');
            $message->to($data['email']);
        });

        Mail::send('mail.admin', ['cdetails' => $data, 'pdetails' => $request->product_details], function ($message) {
            $message->sender(env('MAILFROM'), 'Donatofy');
            $message->subject('Purchase');
            $message->to(env('ADMINMAIL'));
        });

        session()->flush('cart');
        return response()->json(['payment' => 'done']);
    }

    public function user_orders()
    {
        $sub_categories = ProductSubcategory::where('parent_id', 4)->get();
        $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('frontend/orders', compact('orders', 'sub_categories'));
    }

    public function schedule_purchase(){
        return view('frontend.scheduleapurchase');
    }

    public function schedule_a_purchase(Request $request){
        $data = $request->all();
        unset($data['_token']);
        // dd($data);
        Schedule_a_purchase::create($data);
        return redirect()->back()->with('success', 'Your message was sent successfully! We will be in touch as soon as We can !');
    }

    public function categories(){
        $categories = ProductCategories::all();
        // dd($categories);
        return view('frontend.categories', compact('categories'));
    }

    public function password_change(Request $request){
        // dd($request->all());
        $user = User::where('email', $request->email)->first();
        if ($user) {
            # code...
            return response()->json(['user'=>'found']);
        } else {
            # code...
            return response()->json(['user'=>'notfound']);

        }
        
    }

    public function password_change1(Request $request){
        // dd($request->all());

        if ($request->password != '') {
            # code...
            $user = User::where('email', $request->email)->first();
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            return response()->json(['result'=>'done']);
        } else {
            # code...
            return response()->json(['result'=>'empty']);

        }
        
        
    }




    //for paytm checksome

    private static $iv = "@@@@&&&&####$$$$";

	static public function encrypt($input, $key) {
		$key = html_entity_decode($key);

		if(function_exists('openssl_encrypt')){
			$data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, self::$iv );
		} else {
			$size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
			$input = self::pkcs5Pad($input, $size);
			$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
			mcrypt_generic_init($td, $key, self::$iv);
			$data = mcrypt_generic($td, $input);
			mcrypt_generic_deinit($td);
			mcrypt_module_close($td);
			$data = base64_encode($data);
		}
		return $data;
	}

	static public function decrypt($encrypted, $key) {
		$key = html_entity_decode($key);
		
		if(function_exists('openssl_decrypt')){
			$data = openssl_decrypt ( $encrypted , "AES-128-CBC" , $key, 0, self::$iv );
		} else {
			$encrypted = base64_decode($encrypted);
			$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
			mcrypt_generic_init($td, $key, self::$iv);
			$data = mdecrypt_generic($td, $encrypted);
			mcrypt_generic_deinit($td);
			mcrypt_module_close($td);
			$data = self::pkcs5Unpad($data);
			$data = rtrim($data);
		}
		return $data;
	}

	static public function generateSignature($params, $key) {
		if(!is_array($params) && !is_string($params)){
			throw new \Exception("string or array expected, ".gettype($params)." given");			
		}
		if(is_array($params)){
			$params = self::getStringByParams($params);			
		}
		return self::generateSignatureByString($params, $key);
	}

	static public function verifySignature($params, $key, $checksum){
		if(!is_array($params) && !is_string($params)){
			throw new \Exception("string or array expected, ".gettype($params)." given");
		}
		if(isset($params['CHECKSUMHASH'])){
			unset($params['CHECKSUMHASH']);
		}
		if(is_array($params)){
			$params = self::getStringByParams($params);
		}		
		return self::verifySignatureByString($params, $key, $checksum);
	}

	static private function generateSignatureByString($params, $key){
		$salt = self::generateRandomString(4);
		return self::calculateChecksum($params, $key, $salt);
	}

	static private function verifySignatureByString($params, $key, $checksum){
		$paytm_hash = self::decrypt($checksum, $key);
		$salt = substr($paytm_hash, -4);
		return $paytm_hash == self::calculateHash($params, $salt) ? true : false;
	}

	static private function generateRandomString($length) {
		$random = "";
		srand((double) microtime() * 1000000);

		$data = "9876543210ZYXWVUTSRQPONMLKJIHGFEDCBAabcdefghijklmnopqrstuvwxyz!@#$&_";	

		for ($i = 0; $i < $length; $i++) {
			$random .= substr($data, (rand() % (strlen($data))), 1);
		}

		return $random;
	}

	static private function getStringByParams($params) {
		ksort($params);	
        // dd($params);	
		$params = array_map(function ($value){
            // dd($value);
			return ($value !== null && strtolower($value) !== "null") ? $value : "";
	  	}, $params);
		return implode("|", $params);
	}

	static private function calculateHash($params, $salt){
		$finalString = $params . "|" . $salt;
		$hash = hash("sha256", $finalString);
		return $hash . $salt;
	}

	static private function calculateChecksum($params, $key, $salt){
		$hashString = self::calculateHash($params, $salt);
		return self::encrypt($hashString, $key);
	}

	static private function pkcs5Pad($text, $blocksize) {
		$pad = $blocksize - (strlen($text) % $blocksize);
		return $text . str_repeat(chr($pad), $pad);
	}

	static private function pkcs5Unpad($text) {
		$pad = ord($text[strlen($text) - 1]);
		if ($pad > strlen($text))
			return false;
		return substr($text, 0, -1 * $pad);
	}
}
