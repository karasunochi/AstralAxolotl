<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'photo' => $product->photo,
            ),
        ));

        return response()->json(['success' => true]);
    }

    public function remove(Request $request, $id)
    {
        Cart::remove($id);
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');

        if ($quantity < 1 || $quantity > 10) {
            return response()->json(['success' => false, 'message' => 'Invalid quantity']);
        }

        Cart::update($id, [
            'quantity' => $quantity,
        ]);

        $cartItems = Cart::getContent();
        $totalPrice = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        return response()->json(['success' => true, 'totalPrice' => $totalPrice]);
    }

}
