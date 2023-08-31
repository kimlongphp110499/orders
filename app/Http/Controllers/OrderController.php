<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $orders = Order::where('order_number', 'like', "%$searchTerm%")
                    ->orWhere('customer_name', 'like', "%$searchTerm%")
                    ->orWhere('shipping_date', 'like', "%$searchTerm%")
                    ->get();
        return view('orders.index', compact('orders'));
    }
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_number' => 'required',
            'customer_name' => 'required',
            'recipient_address' => 'required',
            'shipping_address' => 'required',
            'shipping_date' => 'required|date',
            'expected_delivery_date' => 'required|date',
        ]);

        Order::create($data);

        return redirect('/');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        
        return redirect('/');
    }


    
}
