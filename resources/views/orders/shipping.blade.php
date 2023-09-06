@extends('layouts.app')

@section('content')
    <h1>Shipping</h1>

    <p>Order Number: {{ $order->order_number }}</p>
    <p>Customer Name: {{ $order->customer_name }}</p>
    <p>Recipient Address: {{ $order->recipient_address }}</p>
    <p>Shipping Address: {{ $order->shipping_address }}</p>
    <p>Shipping Date: {{ $order->shipping_date }}</p>
    <p>Expected Delivery Date: {{ $order->expected_delivery_date }}</p>
    <form method="POST" action="/orders/{{ $order->id }}/update-shipping-status">
        @csrf
        <label>Shipping Status: 
            <select name="status">
                @php
                $statuses = array();
                $statuses = config('const.shipping_status');
                @endphp
                @foreach($statuses as $key => $item)
                <option value="{{$key}}"  @if($order->shipping && $order->shipping->status == $key) selected @endif>{{$item}}</option>
                @endforeach
            </select>
        </label>
        <button type="submit">Update Status</button>
    </form>
    <!-- ... -->
    @if ($order->reviews->count() > 0)
        <h2>Reviews and Comments:</h2>
        @foreach ($order->reviews as $review)
            <p>Rating: {{ $review->rating }}</p>
            <p>Comment: {{ $review->comment }}</p>
        @endforeach
    @endif
@endsection
