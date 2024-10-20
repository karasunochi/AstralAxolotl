<head>
    <link rel="stylesheet" href="{{ asset('css/Cart.css') }}">
    <title>Astral Cart</title>
</head>
@extends('layouts.master')
@section('title', 'Cart')
@section('content')
    <div class="container-cart">
        <div class="cart-list">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <table class="table-cart">
                @foreach($cartItems as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $item->attributes->photo) }}" alt="{{ $item->name }}" width="200px">
                        <h4>{{ $item->name }}</h4>
                    </td>
                    <td>
                        <p>{{ $item->price }}&#8381;</p>
                    </td>
                    <td>
                        <p>{{ $item->quantity }}</p>
                    </td>
                    <td>
                        <button class="remove_btn" onclick="removeFromCart('{{ $item->id }}')">
                            <img src="{{ asset('images/style/delete_cart.png') }}" alt="Remove">
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="order-form">
            <p>Full Price: {{ $cartItems->sum(fn($item) => $item->price * $item->quantity) }}&#8381;</p>
            <form id="order-form" action="{{ route('order.submit') }}" method="POST" onsubmit="return checkCart()">
                @csrf
                <table>
                    <tr>
                        <td>
                           <label for="name">Name</label>
                        </td>
                        <td> 
                            <input type="text" id="name" name="name" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email</label>
                        </td>
                        <td>
                            <input type="email" id="email" name="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="details">Details</label>
                        </td>
                        <td> 
                            <textarea id="details" name="details" placeholder="Please provide your delivery address and preferred method of communication to clarify order details and payment."></textarea>
                        </td>
                    </tr>
                </table>
                <button type="submit">Place an Order</button>
            </form>
        </div>
        
        

    </div>

    <script>
        function checkCart() {
         @if($cartItems->isEmpty())
            alert('Your cart is empty. Please add items to your cart before placing an order.');
            return false; 
        @else
            return true; 
            @endif 
        }

        function removeFromCart(itemId) {
            fetch(`/cart/remove/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message);
                }
            });
        }
    </script>
    
@endsection
