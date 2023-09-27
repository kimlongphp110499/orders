@extends('layouts.app')

@section('content')
<h1>Shippings</h1>
    
<form action="{{ route('orders.index') }}" class="form-inline my-2 my-lg-0" method="GET">
    <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search...">
    <button type="submit" class="btn btn-primary my-2 my-sm-0">Search</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Shipping Number</th>
            <th>Shipping Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td><a href="/orders/shipping/{{ $order->id }}">{{ $order->id }}</a></td>
            <td>{{ $order->name }}</td>
            <td>
                <form method="POST" action="{{ route('orders.destroy', [$order->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection