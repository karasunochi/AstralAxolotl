<head>
    <link rel="stylesheet" href="{{ asset('css/Store.css') }}">
    <title>Astral Store</title>
</head>

@extends('layouts.master')
@section('title', 'Store')

@section('content')
    <div class="container-store">
        <div class="row">
            @isset($products)
            @foreach($products as $product)
                <div class="product">
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->price }}&#8381;</p>
                    <button class="add-to-cart-btn" data-product-id="{{ $product->id }}" >
                        <img src="{{ asset('images/style/add_cart.png') }}" alt="Add to Cart">
                    </button>                  
                </div>
            @endforeach @endisset
        </div>
    </div>

    <div class="move_to_cart">
        <a href="/cart"><img src="{{ asset('images/style/cart.png') }}" alt="cart"></a>
    </div>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cartItems = {};

            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', () => {
                    const productId = button.getAttribute('data-product-id');
                    const action = cartItems[productId] ? 'remove' : 'add';

                    fetch(`/cart/${action}/${productId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            if (action === 'add') {
                                cartItems[productId] = true;
                            } else {
                                delete cartItems[productId];
                            }
                            updateCartButton(button, productId);
                        }
                    });
                });
            });

            function updateCartButton(button, productId) {
                const isInCart = cartItems[productId];
                button.classList.toggle('in-cart', isInCart);
                button.querySelector('img').src = isInCart 
                    ? "{{ asset('images/style/delete_cart.png') }}" 
                    : "{{ asset('images/style/add_cart.png') }}";
            }

        });
    </script>
    
    
    
@endsection
