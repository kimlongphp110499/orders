@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Details</h1>

        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Order Number:</strong> {{ $order->order_number }}</p>
                <p class="card-text"><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                <p class="card-text"><strong>Recipient Address:</strong> {{ $order->recipient_address }}</p>
                <p class="card-text"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
                <p class="card-text"><strong>Shipping Date:</strong> {{ $order->shipping_date }}</p>
                <p class="card-text"><strong>Expected Delivery Date:</strong> {{ $order->expected_delivery_date }}</p>
            </div>
        </div>
    </div>
@endsection
