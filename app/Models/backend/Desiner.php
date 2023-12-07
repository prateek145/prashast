<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desiner extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function desiner_products()
    {
        return $this->hasmany(Product::class, 'desiner_id', 'id');
    }
}
