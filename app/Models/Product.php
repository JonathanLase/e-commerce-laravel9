<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image', 'stock'];

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
