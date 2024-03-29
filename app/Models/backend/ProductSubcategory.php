<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Product;
use App\Models\User;

class ProductSubcategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function subproducts()
    // {
    //     return $this->hasmany(Product::class, 'product_subcategories', 'id');
    // }

    public function subproducts($id){
        // dd($id);
        $products = Product::where(['status'=>1])->latest()->get();
        $productids = [];
        // dd($products);
        for ($i=0; $i <count($products) ; $i++) { 
            # code...
            $product = Json_decode($products[$i]->product_subcategories);
            // dd($subcategories->id, $product,  $products[$i]->id);
            if (in_array($id, $product)) {
                # code...
                array_push($productids, $products[$i]->id);
            }
        }
        $find_products = Product::whereIn('id', $productids)->get();
        // dd($find_products);
        return $find_products;
    }

    public function subcategory_created_by(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function top_seller_name(){
        return $this->hasOne(Product::class, 'id', 'top_seller');
    }
}
