@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>

    <p>Order Number: {{ $order->order_number }}</p>
    <p>Customer Name: {{ $order->customer_name }}</p>
    <p>Recipient Address: {{ $order->recipient_address }}</p>
    <p>Shipping Address: {{ $order->shipping_address }}</p>
    <p>Shipping Date: {{ $order->shipping_date }}</p>
    <p>Expected Delivery Date: {{ $order->expected_delivery_date }}</p>
@endsection
