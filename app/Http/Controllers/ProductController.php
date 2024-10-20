<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_visible', true)->get();
        return view('store', [
        'products' => $products,
        ]);

    }

    public function toggleVisibility(Request $request, Product $product)
    {
        $product->visibility = !$product->visibility;
        $product->save();

        return redirect()->back()->with('success', 'Product visibility toggled successfully!');
    }

}
