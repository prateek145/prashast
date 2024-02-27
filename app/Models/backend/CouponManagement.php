<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponManagement extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function categoryName(){
        return $this->hasOne(ProductSubcategory::class, 'id', 'category');
    }
}
