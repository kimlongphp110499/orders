@extends('layouts.app')

@section('content')
    <h1>Edit Order</h1>

    <form method="POST" action="{{ route('orders.update', $order->id) }}">
        @csrf
        @method('POST') <!-- Sử dụng phương thức PUT cho việc cập nhật -->

        <!-- Order Number -->
        <div class="form-group">
            <label for="order_number">Order Number:</label>
            <input type="text" class="form-control" id="order_number" name="order_number" value="{{ $order->order_number }}" required>
        </div>

        <!-- Customer Name -->
        <div class="form-group">
            <label for="customer_name">Customer Name:</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $order->customer_name }}" required>
        </div>

        <!-- Recipient Address -->
        <div class="form-group">
            <label for="recipient_address">Recipient Address:</label>
            <input type="text" class="form-control" id="recipient_address" name="recipient_address" value="{{ $order->recipient_address }}" required>
        </div>

        <!-- Shipping Address -->
        <div class="form-group">
            <label for="shipping_address">Shipping Address:</label>
            <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="{{ $order->shipping_address }}" required>
        </div>

        <!-- Shipping Date -->
        <div class="form-group">
            <label for="shipping_date">Shipping Date:</label>
            <input type="date" class="form-control" id="shipping_date" name="shipping_date" value="{{ $order->shipping_date }}" required>
        </div>

        <!-- Expected Delivery Date -->
        <div class="form-group">
            <label for="expected_delivery_date">Expected Delivery Date:</label>
            <input type="date" class="form-control" id="expected_delivery_date" name="expected_delivery_date" value="{{ $order->expected_delivery_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
@endsection
