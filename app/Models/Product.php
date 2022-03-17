<?php

namespace App\Models;

use App\Models\menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
