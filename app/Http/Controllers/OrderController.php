<?php 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;


class OrderController extends Controller
{
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'details' => 'nullable|string',
        ]);

        $cartItems = Cart::getContent();
        $totalPrice = $cartItems->sum(fn($item) => $item->price * $item->quantity);
        $products = $cartItems->map(function($item) {
            return "{$item->name}, {$item->quantity}, {$item->price}";
        })->implode('; ');

        $order = Order::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'details' => $validatedData['details'],
            'total_price' => $totalPrice,
            'products' => json_encode($products),
        ]);

        Cart::clear();

        return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
    }


}
