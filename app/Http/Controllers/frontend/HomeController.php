<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\backend\PageImages;
use App\Http\Controllers\Controller;
use App\Models\backend\Desiner;
use App\Models\backend\FooterImages;
use App\Models\backend\FsideBar;
use App\Models\backend\HomePageSlider;
use App\Models\backend\Product;
use App\Models\backend\Order;
use App\Models\backend\PageImages as BackendPageImages;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Contact;
use App\Models\Schedule_a_purchase;
use App\Models\wishlist;
use App\Models\BulkOrder;
use App\Models\backend\ProductCategories;
use App\Models\backend\ProductSubcategory;
use App\Models\backend\ShopPageSlider;
use App\Models\backend\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function home()
    {
        $categories = ProductSubcategory::where('status', 1)->latest()->take(5)->get();
        $new_products = Product::latest()->take(4)->get();
        $top_products = Product::latest()->take(4)->get();
        $footer_image = FooterImages::latest()->first();
        $home_slider = HomePageSlider::latest()->first();
        // dd($home_slider);
        return view('frontend.welcome', compact('categories','home_slider', 'new_products', 'top_products', 'footer_image'));
    }

    public function contact_us()
    {
        $sub_categories = ProductSubcategory::latest()->get();
        $footer_image = FooterImages::latest()->first();
        $page_image = BackendPageImages::where('name', 'shop')->first();
        $categories = ProductSubcategory::where('status', 1)->latest()->get();


        return view('frontend.contactus', compact('sub_categories', 'footer_image', 'page_image', 'categories'));
    }

    public function dynamic_categories($slug)
    {
        # code...
        $subcategory = ProductSubcategory::where('slug', $slug)->first();
        $products1 = Product::where('status', 1)->get();
        $productids = [];

        for ($i = 0; $i < count($products1); $i++) {
            # code...
            $product = Json_decode($products1[$i]->product_subcategories);
            if (in_array($subcategory->id, $product)) {
                # code...
                array_push($productids, $products1[$i]->id);
            }
        }
        // dd($key, $slug, $subcategory, $products1);
        $sub_categories = ProductSubcategory::where('parent_id', 1)->get();
        $products = Product::whereIn('id', $productids)->paginate(9);
        $categories = ProductSubcategory::where('status', 1)->latest()->get();
        $tags = Tags::where('status', 1)->latest()->get();
        $fsidebar = FsideBar::latest()->first();
        $page_image = BackendPageImages::where('name', 'shop')->first();
        $shop_page_slider = ShopPageSlider::latest()->first();
        $price_array = array_map('intval', Product::latest()->pluck('sale_price')->toArray());
        $min_price = (floor(min($price_array) / 100) * 100);
        $max_price = (ceil(max($price_array) / 100) * 100);
        // $quatre_price = (ceil(max($price_array) / 100) * 100)/2.5;
        $medium_price = (ceil(max($price_array) / 100) * 100) / 2;
        $footer_image = FooterImages::latest()->first();


        // dd($products);
        return view('frontend.dynamic_subcat', compact('max_price','footer_image','shop_page_slider', 'medium_price', 'min_price', 'page_image', 'products', 'fsidebar', 'categories', 'tags', 'subcategory', 'sub_categories'));
    }

    public function dynamic_tags($slug)
    {
        $subcategory = Tags::where('name', $slug)->first();
        $products1 = Product::where('status', 1)->get();
        // dd($products1);
        $productids = [];
        for ($i = 0; $i < count($products1); $i++) {
            # code...
            $product = Json_decode($products1[$i]->tag_selection);
            if (in_array($subcategory->id, $product)) {
                # code...
                array_push($productids, $products1[$i]->id);
            }
        }
        $sub_categories = ProductSubcategory::where('parent_id', 1)->get();
        $products = Product::whereIn('id', $productids)->paginate(9);
        // dd($products);
        $categories = ProductSubcategory::where('status', 1)->latest()->get();
        $tags = Tags::where('status', 1)->latest()->get();
        $fsidebar = FsideBar::latest()->first();
        $page_image = BackendPageImages::where('name', 'shop')->first();
        $price_array = array_map('intval', Product::latest()->pluck('sale_price')->toArray());
        $min_price = (floor(min($price_array) / 100) * 100);
        $max_price = (ceil(max($price_array) / 100) * 100);
        // $quatre_price = (ceil(max($price_array) / 100) * 100)/2.5;
        $medium_price = (ceil(max($price_array) / 100) * 100) / 2;
        $footer_image = FooterImages::latest()->first();


        return view('frontend.dynamic_subcat', compact('max_price','footer_image', 'medium_price', 'min_price', 'page_image', 'products', 'fsidebar', 'categories', 'tags', 'subcategory', 'sub_categories'));
    }

    public function dynamic_filter($key, $slug)
    {
        $price_array = array_map('intval', Product::latest()->pluck('sale_price')->toArray());
        $min_price = (floor(min($price_array) / 100) * 100);
        $max_price = (ceil(max($price_array) / 100) * 100);
        // $quatre_price = (ceil(max($price_array) / 100) * 100)/2.5;
        $medium_price = (ceil(max($price_array) / 100) * 100) / 2;
        $footer_image = FooterImages::latest()->first();

        if ($key == 'greater') {
            # code...
            $products = Product::where('status', 1)->where('sale_price', '>=', $min_price)->where('sale_price', '<', $medium_price)->paginate(9);
            $categories = ProductSubcategory::where('status', 1)->latest()->get();
            $fsidebar = FsideBar::latest()->first();
            $page_image = BackendPageImages::where('name', 'shop')->first();
            return view('frontend.dynamic_subcat', compact('max_price', 'medium_price', 'min_price', 'page_image', 'products', 'fsidebar', 'categories'));
        }

        if ($key == 'equal') {
            # code...
            $products = Product::where('status', 1)->where('sale_price', '<=', $medium_price)->where('sale_price', '<=', $max_price)->paginate(9);
            $categories = ProductSubcategory::where('status', 1)->latest()->get();
            $fsidebar = FsideBar::latest()->first();
            $page_image = BackendPageImages::where('name', 'shop')->first();

            return view('frontend.dynamic_subcat', compact('max_price','footer_image', 'medium_price', 'min_price', 'page_image', 'products', 'fsidebar', 'categories'));
        }

        if ($key == 'greaterthen') {
            # code...
            $products = Product::where('status', 1)->where('sale_price', '=<', $slug)->paginate(9);
            // dd($products, $slug, $max_price);
            $categories = ProductSubcategory::where('status', 1)->latest()->get();
            $fsidebar = FsideBar::latest()->first();
            $page_image = BackendPageImages::where('name', 'shop')->first();
            return view('frontend.dynamic_subcat', compact('max_price', 'medium_price', 'min_price', 'page_image', 'products', 'fsidebar', 'categories'));
        }
    }

    public function shop_page()
    {
        $sub_categories = ProductSubcategory::where('status', 1)->latest()->get();
        $products = Product::where('status', 1)->paginate(9);
        $categories = ProductSubcategory::where('status', 1)->latest()->get();
        $tags = Tags::where('status', 1)->latest()->get();
        $fsidebar = FsideBar::latest()->first();
        $page_image = BackendPageImages::where('name', 'shop')->first();
        $price_array = array_map('intval', Product::latest()->pluck('sale_price')->toArray());
        $min_price = (floor(min($price_array) / 100) * 100);
        $max_price = (ceil(max($price_array) / 100) * 100);
        // $quatre_price = (ceil(max($price_array) / 100) * 100)/2.5;
        $medium_price = (ceil(max($price_array) / 100) * 100) / 2;
        // dd($min_price, $quatre_price, $medium_price, $max_price);
        $footer_image = FooterImages::latest()->first();
        $shop_page_slider = ShopPageSlider::latest()->first();
        // dd($footer_image);
        // dd($shop_page_slider);
        return view('frontend.dynamic_subcat', compact('footer_image','shop_page_slider', 'max_price', 'medium_price', 'min_price', 'products', 'page_image', 'fsidebar', 'sub_categories', 'categories', 'tags'));
    }

    public function product_detail($slug)
    {
        $session = session()->get('cart');
        $product = Product::where('slug', $slug)->first();

        if ($product->product_type == 'simple_product') {
            # code...
            $latestproduct = Product::orderBy('id', 'ASC')->where('status', 1)->get()->take(4);
            $footer_image = FooterImages::latest()->first();
            $sub_categories = ProductSubcategory::latest()->get();

            return view('frontend.product-detail1', compact('product', 'footer_image', 'latestproduct', 'sub_categories'));
        }

        // if ($product->product_type == 'variable_product') {
        //     # code...
        //     $attr = $product->attributes()->get();
        //     $variance = $product->variance()->get();
        //     $latestproduct = Product::orderBy('id', 'DESC')->where('status', 1)->get()->take(3);
        //     // dd($latestproduct);
        //     // dd($product, $attr, $variance, $latestproduct);
        //     return view('frontend.product-detail1', compact('product', 'attr', 'variance', 'latestproduct', 'desiner_name'));
        // }
    }

    public function get_product_attr(Request $request)
    {
        dd($request->all());
    }

    public function cart()
    {
        $products = session()->get('cart');
        if ($products) {
            // dd($products);
            $cart = true;
            return view('frontend.cart', compact('products', 'cart'));
        } else {
            # code...
            return redirect()->back()->with('error', 'Add Product In Cart');
        }
    }

    public function buy_now($id, $qty)
    {
        // dd($id, $qty);
        $product = Product::find($id);
        $qty = $qty;
        $cart = false;
        $productdetails = [];
        $array = [
            'id' => $product->id,
            'name' => $product->name,
            'sku' => $product->sku,
            'qty' => $qty,
            'price' => $product->sale_price,
            'image' => 'product/' . $product->image
        ];
        array_push($productdetails, $array);

        return view('frontend.cart', compact('product', 'qty', 'cart', 'productdetails'));
    }

    public function wishlist()
    {

        $products_id = wishlist::where(['user_id' => auth()->id()])->pluck('product_id');
        $products = Product::whereIn('id', $products_id)->get();
        $sub_categories = ProductSubcategory::latest()->take(5)->get();
        $page_image = BackendPageImages::where('name', 'wishlist')->first();
        // dd($products);
        return view('frontend.wishlist', compact('products', 'sub_categories', 'page_image'));
    }

    public function productpage()
    {
        $products = Product::orderBy('id', 'ASC')->get()->take(8);
        return view('frontend.shoppage', compact('products'));
    }

    public function searchproduct(Request $request)
    {

        dd($request->all());
        $product = Product::find($request->id);
        $latestproduct = Product::orderBy('id', 'ASC')->where('status', 1)->get()->take(3);
        // dd($product);
        return view('frontend.product-detail1', compact('product', 'latestproduct'));
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
        Mail::send('mail.customer', ['order' => $orders1], function ($message) use ($data) {
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
        $sub_categories = ProductSubcategory::where('status', 1)->get();
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        $count = 1;
        $page_image = BackendPageImages::where('name', 'user-orders')->first();
        // $product_details = json_decode($orders['product_details']);
        // dd($orders, auth()->id());
        return view('frontend/orders', compact('orders', 'sub_categories', 'count', 'page_image'));
    }

    public function schedule_purchase()
    {
        return view('frontend.scheduleapurchase');
    }

    public function schedule_a_purchase(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        // dd($data);
        Schedule_a_purchase::create($data);
        return redirect()->back()->with('success', 'Your message was sent successfully! We will be in touch as soon as We can !');
    }

    // public function categories()
    // {
    //     $categories = ProductCategories::all();
    //     // dd($categories);
    //     return view('frontend.categories', compact('categories'));
    // }

    // public function password_change(Request $request)
    // {
    //     // dd($request->all());
    //     $user = User::where('email', $request->email)->first();
    //     if ($user) {
    //         # code...
    //         return response()->json(['user' => 'found']);
    //     } else {
    //         # code...
    //         return response()->json(['user' => 'notfound']);
    //     }
    // }

    // public function password_change1(Request $request)
    // {
    //     // dd($request->all());

    //     if ($request->password != '') {
    //         # code...
    //         $user = User::where('email', $request->email)->first();
    //         $password = Hash::make($request->password);
    //         $user->password = $password;
    //         $user->save();
    //         return response()->json(['result' => 'done']);
    //     } else {
    //         # code...
    //         return response()->json(['result' => 'empty']);
    //     }
    // }



}
