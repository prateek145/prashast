<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_categories', 'id');
    }

    public function subcategories()
    {
        return $this->hasMany(ProductSubcategory::class, 'parent_id', 'id');
    }
}
