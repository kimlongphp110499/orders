@extends('layouts.app')

@section('content')
    <h1>Create New Order</h1>

    <form method="POST" action="{{ route('orders.review.store', $order->id) }}">
        @csrf
        <label>Shipping Status: 
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </label>
        <label>Comment: <input type="text" name="comment" required></label><br>
        <button type="submit">Create Review</button>
    </form>
@endsection
