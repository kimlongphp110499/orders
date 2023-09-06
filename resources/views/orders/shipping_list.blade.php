<h1>Shipping Orders</h1>
    
<form action="{{ route('orders.index') }}" class="form-inline my-2 my-lg-0" method="GET">
    <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search...">
    <button type="submit" class="btn btn-primary my-2 my-sm-0">Search</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>Order Number</th>
            <th>Customer Name</th>
            <th>Recipient Address</th>
            <th>Shipping Address</th>
            <th>Shipping Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td><a href="/shipping/detail/{{ $order->id }}">{{ $order->order_number }}</a></td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->recipient_address }}</td>
            <td>{{ $order->shipping_address }}</td>
            <td>{{ $order->shipping_date }}</td>
          
        </tr>
        @endforeach
    </tbody>
</table>
