<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order_Detail;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
{
        $customers = Customer::all();
        $user = User::all();
        $transaction = User::all();
        $orderdetails =  Order_Detail::all();
        $userid = Auth()->user()->id;

        $orders = DB::table('orders')
        ->join('order__details', 'orders.id', '=', 'order__details.order_id')
        ->join('transactions', 'orders.id', '=', 'transactions.order_id')
        ->select('order__details.*','transactions.*','orders.*')
        ->where('transactions.user_id', $userid)
        ->get();


        $transaction = Transaction::all();
        $orderss = Order::where('user_id', '=', $userid)->get();

        return view('orders.history')
        ->with('orderss', $orderss)
        ->with('orders', $orders)
        ->with('transaction', $transaction)
        ->with('user', $user)
        ->with('customers', $customers)
        ->with('orderdetails', $orderdetails);     
    }



}
