<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'decription',
        'content',
        'menu_id',
        'price',
        'price_sale',
        'active',
        'slug',
        'thumb'
    ];

    public function menu()
    {
        return $this->hasOne(menu::class, 'id', 'menu_id');
    }
}
