@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Order</h1>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="form-group">
                <label for="order_number">Order Number:</label>
                <input type="text" class="form-control" id="order_number" name="order_number" required>
            </div>

            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>

            <div class="form-group">
                <label for="recipient_address">Recipient Address:</label>
                <input type="text" class="form-control" id="recipient_address" name="recipient_address" required>
            </div>

            <div class="form-group">
                <label for="shipping_address">Shipping Address:</label>
                <input type="text" class="form-control" id="shipping_address" name="shipping_address" required>
            </div>

            <div class="form-group">
                <label for="shipping_date">Shipping Date:</label>
                <input type="date" class="form-control" id="shipping_date" name="shipping_date" required>
            </div>

            <div class="form-group">
                <label for="expected_delivery_date">Expected Delivery Date:</label>
                <input type="date" class="form-control" id="expected_delivery_date" name="expected_delivery_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>
    </div>
@endsection
