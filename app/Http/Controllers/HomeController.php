<?php

namespace App\Http\Controllers;

use App\Models\backend\Order;
use App\Models\backend\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd('dashboard');
        $total_users = User::where('role', '!=', 'admin')->count();
        $total_products = Product::latest()->count();
        $total_orders = Order::latest()->count();
        return view('home', compact('total_users', 'total_products','total_orders'));
    }
}
