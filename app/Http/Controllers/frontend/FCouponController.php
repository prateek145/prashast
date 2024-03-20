<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\CouponManagement;
use App\Models\backend\Product;

class FCouponController extends Controller
{
    //
    public function coupon_apply(Request $request)
    {
        try {
            $coupon = CouponManagement::where('code', $request->code)->first();
            $priceChange = false;
            $total_price = 0;
            if ($coupon) {
                # code...
                $products = json_decode($request->products);

                if ($request->type == 'single') {
                    # code...
                    // dd($products->id);
                    // dd($coupon->expiry_date > date('Y-m-d'));
                    if ($coupon->count == 1 && $coupon->used == 1) {
                        # code...
                        throw new \Exception("Coupon is already used.");
                    } elseif ($coupon->count == 1 && $coupon->used == 0 && $coupon->expiry_date >= date('Y-m-d') || $coupon->count == 2 && $coupon->expiry_date >= date('Y-m-d')) {
                        # code...
                        if ($coupon->category) {
                            # code...
                            if (in_array($coupon->category, json_decode($products->product_subcategories))) {
                                # code...
                                if ($coupon->type == 'percent') {
                                    # code...
                                    $total_price = $products->sale_price;
                                    $price = $products->sale_price;
                                    $discountPercentage = $coupon->value;
                                    $discount = ($discountPercentage / 100) * $price;
                                    $discountedPrice = intval(round($price - $discount));
                                    // dd($discountedPrice);

                                } elseif ($coupon->type == 'fixed') {
                                    # code...
                                    $total_price = $products->sale_price;
                                    $discountedPrice = $products->sale_price - $coupon->value;
                                }
                                // dd($discountedPrice);

                            } else {
                                throw new \Exception("Coupon Does Not Apply On This Product Category");
                            }
                        } elseif (in_array($products->id, json_decode($coupon->products))) {
                            # code...
                            if ($coupon->type == 'percent') {
                                # code...
                                $total_price = $products->sale_price;
                                $price = $products->sale_price;
                                $discountPercentage = $coupon->value;
                                $discount = ($discountPercentage / 100) * $price;
                                $discountedPrice = intval(round($price - $discount));
                                // dd($discountedPrice);

                            } elseif ($coupon->type == 'fixed') {
                                # code...
                                $total_price = $products->sale_price;
                                $discountedPrice = $products->sale_price - $coupon->value;
                            }
                        } else {
                            throw new \Exception("Coupon Does Not Apply");
                        }
                    } else {
                        throw new \Exception("Coupon Expired.");
                    }
                } else {
                    $productIds = [];
                    $discountedPrice = 0;
                    foreach ($products as $key => $value) {
                        # code...

                        $product = Product::find($value->id);
                        if ($coupon->count == 1 && $coupon->used == 1) {
                            # code...
                            throw new \Exception("Coupon is already used.");
                        } elseif ($coupon->count == 1 && $coupon->used == 0 && $coupon->expiry_date >= date('Y-m-d') || $coupon->count == 2 && $coupon->expiry_date >= date('Y-m-d')) {
                            # code...
                            if ($coupon->category) {
                                # code...
                                if (in_array($coupon->category, json_decode($product->product_subcategories))) {
                                    # code...
                                    if ($coupon->type == 'percent') {
                                        # code...
                                        $total_price += $product->sale_price;
                                        $price = $product->sale_price;
                                        $discountPercentage = $coupon->value;
                                        $discount = ($discountPercentage / 100) * $price;
                                        $discountedPrice += intval(round($price - $discount));
                                        // dd($discountedPrice);

                                    } elseif ($coupon->type == 'fixed') {
                                        # code...
                                        $total_price += $product->sale_price;
                                        $discountedPrice += $product->sale_price - $coupon->value;
                                    }
                                    // dd($discountedPrice);

                                }
                            } elseif (in_array($product->id, json_decode($coupon->products))) {
                                # code...
                                if ($coupon->type == 'percent') {
                                    # code...
                                    $total_price += $product->sale_price;
                                    $price = $product->sale_price;
                                    $discountPercentage = $coupon->value;
                                    $discount = ($discountPercentage / 100) * $price;
                                    $discountedPrice += intval(round($price - $discount));
                                } elseif ($coupon->type == 'fixed') {
                                    # code...
                                    $total_price += $product->sale_price;
                                    $discountedPrice += $products->sale_price - $coupon->value;
                                }
                            }else{
                                $total_price += $product->sale_price;
                                $discountedPrice += $products->sale_price - $coupon->value;
                            }
                        }
                    }
                }
            } else {
                # code...
                throw new \Exception("Enter Correct Value");
            }
            if ($discountedPrice != $total_price) {
                # code...
                $priceChange = true;
            } else {
                # code...
            }
            // dd($discountedPrice, $total_price);
            
            return redirect()->back()->with(['success' => 'Coupon Applied.', 'discountedPrice' => $discountedPrice, 'priceChange' => $priceChange, 'couponName' => $coupon->code]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
