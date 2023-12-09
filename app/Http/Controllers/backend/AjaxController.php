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
        // dd($request->all());
        $product = Product::find($request->productId);
        $variance = ProductVariance::where(['product_id' => $request->productId, 'sku' => $request->sku])->first();
        // dd($variance, $product);
        $cart = session()->get('cart', []);

        // dd($cart);
        $images = json_decode($product->featured_image);
        if ($variance != null) {
            # code...
            if (isset($cart['variable' . $variance->id])) {
                $cart['variable' . $variance->id]['quantity']++;
            } else {
                if ($variance->sale_price != null) {
                    # code...
                    $cart['variable' . $variance->id] = [
                        "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => $request->qty,
                        "price" => $variance->sale_price,
                        "image" => 'product/' . $images[0],
                        "sku" => $request->sku
                    ];
                } else {
                    $cart['variable' . $variance->id] = [
                        "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => $request->qty,
                        "price" => $variance->sale_price,
                        "image" => 'product/' . $images[0],
                        "sku" => $request->sku
                    ];
                }
            }

            // dd($cart);
            // session()->flush('cart');
            // dd($cart);

            session()->put('cart', $cart);
            return response()->json(['result' => $cart, 'var_id' => 'variable' . $variance->id, 'qty' => $request->qty]);
        } else {
            if (isset($cart['simple' . $product->id])) {
                // dd($request->sku);
                $cart['simple' . $product->id]['quantity']++;
                // dd($cart);
            } else {
                // dd($request->sku);
                $images = json_decode($product->featured_image);
                if ($product->sale_price != null) {
                    # code...
                    $cart['simple' . $product->id] = [
                        "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => $request->qty,
                        "price" => $product->sale_price,
                        "image" => 'product/' . $images[0],
                        "sku" => $request->sku
                    ];
                } else {
                    $cart['simple' . $product->id] = [
                        "id" => $product->id,
                        "name" => $product->name,
                        "quantity" => $request->qty,
                        "price" => $product->regular_price,
                        "image" => 'product/' . $images[0],
                        "sku" => $request->sku
                    ];
                }
            }
            session()->put('cart', $cart);
            // session()->flush('cart');
            return response()->json(['result' => $cart, 'product_id' => 'simple' . $product->id, 'qty' => $request->qty]);
        }
    }


    public function add_to_wishlist(Request $request)
    {
        // dd($request->all());

        if (\Auth::check()) {

            $wishlistItems = wishlist::all();
            // dd($wishlistItems);

            $variable = '';

            for ($i = 0; $i < count($wishlistItems); $i++) {
                # code...
                if ($wishlistItems[$i]->sku == $request->sku) {
                    # code...
                    $variable = 'found';
                }
            }

            if ($variable == '') {
                # code...
                # code...
                // dd($request->all());
                $product = Product::find($request->productId);
                $variance = ProductVariance::where(['product_id' => $request->productId, 'sku' => $request->sku])->first();
                // dd($variance, $product);
                $cart = session()->get('wishlist', []);

                // dd($cart);
                $images = json_decode($product->featured_image);
                if ($variance != null) {
                    # code...
                    if (isset($cart['variable' . $variance->id])) {
                        $cart['variable' . $variance->id]['quantity']++;
                    } else {
                        if ($variance->sale_price != null) {
                            # code...
                            $cart = [
                                "name" => $product->name,
                                "quantity" => $request->qty,
                                "price" => $variance->sale_price,
                                "image" => 'product/' . $images[0],
                                "sku" => $request->sku,
                                "product_id" => $product->id,
                                "product_type" => 'variable' . $variance->id
                            ];
                        } else {
                            $cart = [
                                "name" => $product->name,
                                "quantity" => $request->qty,
                                "price" => $variance->sale_price,
                                "image" => 'product/' . $images[0],
                                "sku" => $request->sku,
                                "product_id" => $product->id,
                                "product_type" => 'variable' . $variance->id
                            ];
                        }
                    }

                    // dd($cart);
                    // session()->flush('cart');
                    $cart['user_id'] = auth()->id();
                    // dd($cart);

                    wishlist::create($cart);
                    return response()->json(['result' => $cart, 'var_id' => 'variable' . $variance->id, 'qty' => $request->qty]);
                } else {
                    if (isset($cart['simple' . $product->id])) {
                        // dd($request->sku);
                        $cart['simple' . $product->id]['quantity']++;
                        // dd($cart);
                    } else {
                        // dd($request->sku);
                        $images = json_decode($product->featured_image);
                        if ($product->sale_price != null) {
                            # code...
                            $cart = [
                                "name" => $product->name,
                                "quantity" => $request->qty,
                                "price" => $product->sale_price,
                                "image" => 'product/' . $images[0],
                                "sku" => $request->sku,
                                "product_id" => $product->id,
                                "product_type" => 'simple' . $product->id
                            ];
                        } else {
                            $cart = [
                                "name" => $product->name,
                                "quantity" => $request->qty,
                                "price" => $product->regular_price,
                                "image" => 'product/' . $images[0],
                                "sku" => $request->sku,
                                "product_id" => $product->id,
                                "product_type" => 'simple' . $product->id
                            ];
                        }
                    }
                    $cart['user_id'] = auth()->id();
                    // dd($cart);
                    wishlist::create($cart);
                    // session()->flush('cart');
                    return response()->json(['result' => $cart, 'product_id' => 'simple' . $product->id, 'qty' => $request->qty]);
                }
            } else {
                return response()->json(['result' => 'found']);
            }
        } else {
            # code...
            return response()->json(['result' => 'unauthorized']);
        }
    }

    public function add_qty_cart(Request $request)
    {
        // dd($request->all());
        $cart = session()->get('cart');
        foreach ($cart as $id => $deatils) {
            if ($deatils['sku'] == $request->sku) {
                # code...
                $val = $deatils['quantity'];
                $val++;
                $deatils['quantity'] = $val;
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
                if ($deatils['sku'] == $request->sku) {
                    # code...
                    unset($cart[$id]);
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('showcart', 'true');
        } else {
            # code...
            foreach ($cart as $id => $deatils) {
                if ($deatils['sku'] == $request->sku) {
                    # code...
                    $val = $deatils['quantity'];
                    $val--;
                    $deatils['quantity'] = $val;
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
            if ($deatils['sku'] == $request->sku) {
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
        wishlist::where(['user_id' => auth()->id(), 'sku' => $request->sku])->delete();
        return response()->json(['result' =>'success']);
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
        $products = Product::where('name', 'LIKE', '%' . $request->keyword . '%')->where('status', 1)->get();
        return response()->json($products);
    }
}
