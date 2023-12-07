<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attributes()
    {
        return $this->hasMany(ProductAttributeLink::class, 'product_id', 'id');
    }

    public function variance()
    {
        return $this->hasMany(ProductVariance::class, 'product_id', 'id');
    }

    public function desiner()
    {
        return $this->hasone(Desiner::class, 'id', 'desiner_id');
    }

    public function product_subcategory($data)
    {
        // dd($data);
        $sub_category = json_decode($data);
        return ProductSubcategory::find($sub_category[0]);
        // return $this->hasone(ProductSubcategory::class, 'id', 'product_subcategories');
    }
}
