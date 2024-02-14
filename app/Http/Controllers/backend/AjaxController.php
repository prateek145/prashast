<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use App\Models\wishlist;
use App\Models\backend\ProductCategories;
use App\Models\backend\ProductVariance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    public function variance_ajax(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        unset($data['_token']);
        // dd($data);
        $data = ProductVariance::where(['id' => $request->variance_id])->first();
        $data->regular_price = $request->regular_price;
        $data->sale_price = $request->sales_price;
        $data->sku = $request->sku;
        $data->weight = $request->weight;
        $data->dimension = $request->dimension;
        $data->description = $request->description;
        $data->save();
        return redirect()->back()->with('success', 'Successfully Updated.');
    }

    public function attribute_change(Request $request)
    {
        // dd($request->all(), $request->productId);
        $match_arr = json_encode($request->selection);
        $variance = ProductVariance::where(['product_id' => $request->productId, 'selected_values' => $match_arr])->get();
        return response()->json(array('variance' => $variance));
    }

    public function add_to_cart(Request $request)
    {
        $product = Product::find($request->productId);
        $cart = session()->get('cart');
        // dd($cart);
        if ($cart) {
            # code...
            $found = false;
            foreach ($cart as $key => $value) {
                # code...
                // dd('prateek', in_array($cart[$key]['id'], $request->productId));
                if ($cart[$key]['id'] == $request->productId) {
                    # code...
                    $cart[$key]['quantity']++;
                    $found = true;
                }
            }
            if ($found == false) {
                # code...
                array_push($cart, [
                    "id" => $product->id,
                    "name" => $product->name,
                    "qty" => $request->qty,
                    "price" => $product->sale_price,
                    "image" => 'product/' . $product->image,
                    "sku" => $request->sku
                ]);
            }

        } else {
            # code...
            // dd('prateek');
            $cart = [];
            array_push($cart, [
                "id" => $product->id,
                "name" => $product->name,
                "qty" => $request->qty,
                "price" => $product->sale_price,
                "image" => 'product/' . $product->image,
                "sku" => $request->sku
            ]);
        }

        session()->put('cart', $cart);
        // session()->flush('cart');
        // dd(session()->get('cart'));
        return response()->json(['result' => $cart]);
    }


    public function add_to_wishlist(Request $request)
    {
        if (\Auth::check()) {
            $wishlist = wishlist::where(['product_id' => $request->productId, 'user_id' => auth()->id()])->first();
            // dd($wishlist);
            if (is_null($wishlist)) {
                # code...
                $data = [
                    'product_id' => $request->productId,
                    'user_id' => auth()->id()
                ];
                wishlist::create($data);
                return response()->json(['result' => 'notfound']);
            } else {
                return response()->json(['result' => 'found']);
            }
        } else {
            # code...
            // dd($request->all());
            return response()->json(['result' => 'unauthorized']);
        }
    }

    public function add_qty_cart(Request $request)
    {
        // dd($request->all());
        $cart = session()->get('cart');
        foreach ($cart as $id => $deatils) {
            if ($deatils['id'] == $request->id) {
                # code...
                $val = $deatils['qty'];
                $val++;
                $deatils['qty'] = $val;
            }
            $cart[$id] = $deatils;
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('showcart', 'true');
        // return response()->json(['result' => 'success']);
    }

    public function remove_qty_cart(Request $request)
    {
        $cart = session()->get('cart');
        // dd($request->all());
        if ($request->quantity <= 1) {
            # code...
            $cart = session()->get('cart');
            foreach ($cart as $id => $deatils) {
                if ($deatils['id'] == $request->id) {
                    # code...
                    unset($cart[$id]);
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('showcart', 'true');
        } else {
            # code...
            foreach ($cart as $id => $deatils) {
                if ($deatils['id'] == $request->id) {
                    # code...
                    $val = $deatils['qty'];
                    $val--;
                    $deatils['qty'] = $val;
                }
                $cart[$id] = $deatils;
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('showcart', 'true');

        // return response()->json(['result' => 'success']);
    }

    public function remove_cart(Request $request)
    {
        $cart = session()->get('cart');
        foreach ($cart as $id => $deatils) {
            if ($deatils['id'] == $request->id) {
                # code...
                unset($cart[$id]);
            }
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('showcart', 'true');

        // return response()->json(['result' => 'success']);
    }

    public function remove_wishlist(Request $request)
    {
        // dd($request->all());
        // dd(auth()->id());
        wishlist::where(['user_id' => auth()->id(), 'product_id' => $request->id])->delete();
        return response()->json(['result' => 'success']);
    }

    public function product_subcategory(Request $request)
    {
        $product_category = ProductCategories::find($request->category_id);
        $product_subcategories = $product_category->subcategories()->get();
        if ($product_subcategories->isEmpty()) {
            # code...
            return response()->json(['result' => 'Create sub category first.']);
        } else {
            return response()->json(['result' => $product_subcategories]);
        }
    }

    public function product_search(Request $request)
    {
        // dd($request->all());
        $products = Product::where('name', 'LIKE', '%' . $request->keyword . '%')->where('status', 1)->get();
        return response()->json($products);
    }
}
