@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Review Shipping</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('orders.review.store', $order->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="rating">Shipping Status:</label>
                        <select class="form-control" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <input type="text" class="form-control" name="comment" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Review</button>
                </form>
            </div>
        </div>
    </div>
@endsection
