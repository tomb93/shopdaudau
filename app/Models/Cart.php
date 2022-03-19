<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'customer_id', 'product_id', 'price', 'qty'
    ];
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
