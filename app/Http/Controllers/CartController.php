<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = auth()->id();
        $cart->product_id = $request->input('productId');
        $cart->quantity = 1;
        $cart->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $user = User::findOrFail($userId);
        if ($user->id != Auth()->id()) {
            return redirect()->route('/');
        }
        $carts = Cart::where('user_id', $userId)->get();
        return view('shop.cart', compact('user', 'carts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        // $cart = Cart::findOrFail($cartId);
        $cart->quantity = $request->input('quantity');
        $cart->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
}
