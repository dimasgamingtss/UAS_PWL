<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'stock'
    ];

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sales_products')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
