<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'content',
        'action',
        'acc_CustomerID'
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
}
