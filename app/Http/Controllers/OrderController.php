<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Review;
use DB;
use App\Models\ShippingStatus;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::all();
        if($request->input('search')){
            $searchTerm = $request->input('search');
            $orders = Order::where('order_number', 'like', "%$searchTerm%")
                        ->orWhere('customer_name', 'like', "%$searchTerm%")
                        ->orWhere('shipping_address', 'like', "%$searchTerm%")
                        ->orWhere('shipping_date', 'like', "%$searchTerm%")
                        ->get();
        }
      
        return view('orders.index', compact('orders'));
    }

    public function shippingId(Request $request, $id)
    {
        $orders = Order::where('shipping_id', $id)->get();
      
        return view('orders.shipping_list', compact('orders'));
    }
    public function shippingView()
    {
        $orders =  DB::table('shippings')->get();
      
        return view('orders.shipping_view', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['shipping','reviews'])->find($id);
        return view('orders.show', compact('order'));
    }
    public function shipping($id)
    {
        $order = Order::with(['shipping','reviews'])->find($id);
        return view('orders.shipping', compact('order'));
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
        $data['shipping_id'] = 1;
        Order::create($data);

        return redirect('/orders');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        
        return redirect('/orders');
    }

    public function updateShippingStatus(Request $request, $id)
    {
        $order = Order::with('shipping')->find($id);
        $shipping = $order->shipping;

        if ($shipping) {
            // If shipping exists, update the status
            $shipping->status = $request->input('status');
            $shipping->update_time = now();
            $shipping->save();
        } else {
            // If shipping doesn't exist, create a new one
            $shippingStatus = new ShippingStatus([
                'order_id' => $order->id,
                'status' => $request->input('status'),
                'update_time' => now(),
            ]);
            $shippingStatus->save();
        }
    
        return back();
    }


    public function review($id)
    {
        $order = Order::with(['reviews'])->find($id);
        return view('orders.reviews.create', compact('order'));
    }

    public function reviewStore(Request $request, $id)
    {
        $order = Order::find($id);

        $review = new Review([
            'order_id' => $order->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);
        $review->save();
    
        return redirect('/home');
    }
    // Trong tệp OrderController.php
public function edit($id)
{
    $order = Order::find($id); // Lấy đối tượng Order cần cập nhật
    return view('orders.edit', ['order' => $order]);
}

public function update(Request $request, $id)
{
    $data = $request->validate([
        'order_number' => 'required',
        'customer_name' => 'required',
        'recipient_address' => 'required',
        'shipping_address' => 'required',
        'shipping_date' => 'required|date',
        'expected_delivery_date' => 'required|date',
    ]);
    $data['shipping_id'] = 1;

    $order = Order::with('shipping')->find($id);
    $shipping = $order->shipping;

    if ($order) {
        // If shipping exists, update the status
        // $shipping->status = $request->input('status');
        // $shipping->update_time = now();
        // $shipping->save();
        $order->fill($data)->save();
    }
    return redirect('/orders');
}

    
}
