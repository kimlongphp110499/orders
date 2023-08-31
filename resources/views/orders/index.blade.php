@extends('layouts.app')

@section('content')
    <h1>Shipping Orders</h1>
    
    <form action="/search" method="GET">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <ul>
        @foreach($orders as $order)
            <li>
                <a href="/order/{{ $order->id }}">{{ $order->order_number }}</a> - {{ $order->customer_name }}
                <form method="POST" action="/order/{{ $order->id }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
