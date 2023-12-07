<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderdetails()
    {
        return $this->hasmany(Orderdetail::class, 'order_id', 'id');
    }

    protected $guarded = [];
}
