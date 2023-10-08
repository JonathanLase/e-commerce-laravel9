<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addToCart(Product $product, Request $request)
    {
        $user_id = Auth::id();
        $product_id = $product->id;

        $existingData = Cart::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($existingData == null) {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . $product->stock
            ]);

            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'amount' => $request->amount
            ]);
        } else {
            $request->validate([
                'amount' => 'required|gte:1|lte:' . ($product->stock - $existingData->amount)
            ]);

            $existingData->update([
                'amount' => $existingData->amount + $request->amount
            ]);
        }
        return Redirect::route('show_cart');
    }

    public function showCart()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', compact('carts'));
    }

    public function updateCart(Cart $cart, Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('show_cart');
    }

    public function deleteCart(Cart $cart)
    {
        $cart->delete();
        return Redirect::back();
    }
}
