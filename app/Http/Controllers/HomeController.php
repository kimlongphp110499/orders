<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Order;
 
class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        // if($request->input('search')){
        //     $searchTerm = $request->input('search');
        //     $orders = Order::where('order_number', 'like', "%$searchTerm%")
        //                 ->orWhere('customer_name', 'like', "%$searchTerm%")
        //                 ->orWhere('shipping_date', 'like', "%$searchTerm%")
        //                 ->get();
        // }
      
        return view('home.index', compact('orders'));
    }
}