@extends('layouts.app')

@section('content')
    <h1>Create New Order</h1>

    <form method="POST" action="/order/store">
        @csrf
        <label>Order Number: <input type="text" name="order_number" required></label><br>
        <label>Customer Name: <input type="text" name="customer_name" required></label><br>
        <label>Recipient Address: <input type="text" name="recipient_address" required></label><br>
        <label>Shipping Address: <input type="text" name="shipping_address" required></label><br>
        <label>Shipping Date: <input type="date" name="shipping_date" required></label><br>
        <label>Expected Delivery Date: <input type="date" name="expected_delivery_date" required></label><br>
        <button type="submit">Create Order</button>
    </form>
@endsection
