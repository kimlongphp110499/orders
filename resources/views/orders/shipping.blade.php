@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Shipping</h1>

        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Order Number:</strong> {{ $order->order_number }}</p>
                <p class="card-text"><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                <p class="card-text"><strong>Recipient Address:</strong> {{ $order->recipient_address }}</p>
                <p class="card-text"><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
                <p class="card-text"><strong>Shipping Date:</strong> {{ $order->shipping_date }}</p>
                <p class="card-text"><strong>Expected Delivery Date:</strong> {{ $order->expected_delivery_date }}</p>

                <form method="POST" action="/orders/{{ $order->id }}/update-shipping-status">
                    @csrf
                    <div class="form-group">
                        <label for="status">Shipping Status:</label>
                        <select class="form-control" name="status">
                            @php
                                $statuses = config('const.shipping_status');
                            @endphp
                            @foreach($statuses as $key => $item)
                                <option value="{{$key}}" @if($order->shipping && $order->shipping->status == $key) selected @endif>{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>

                <!-- ... -->

                @if ($order->reviews->count() > 0)
                    <h2>Reviews and Comments:</h2>
                    @foreach ($order->reviews as $review)
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"><strong>Rating:</strong> {{ $review->rating }}</p>
                                <p class="card-text"><strong>Comment:</strong> {{ $review->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
