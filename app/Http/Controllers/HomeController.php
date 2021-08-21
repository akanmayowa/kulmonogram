<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\Order_Detail;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
use App\Charts\SampleChart;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $stocks = Stock::all();
        $transactions = Transaction::all();
        $orderdetails = Order_Detail::all();

        $users = Stock::select(DB::raw("SUM('stock_price') as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->get()
        ->pluck('count');
            
       
        $orderdetails = Order_Detail::select(DB::raw("COUNT(total) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $chart = new SampleChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('Orders Chart', 'bar', $orderdetails)->options([
            'fill' => 'true',
            'borderColor' => 'blue'])
            ->backgroundcolor('blue');


            $borderColors = [
                "rgba(255, 99, 132, 1.0)",
                "rgba(22,160,133, 1.0)",
                "rgba(255, 205, 86, 1.0)",
                "rgba(51,105,232, 1.0)",
                "rgba(244,67,54, 1.0)",
                "rgba(34,198,246, 1.0)",
                "rgba(153, 102, 255, 1.0)",
                "rgba(255, 159, 64, 1.0)",
                "rgba(233,30,99, 1.0)",
                "rgba(205,220,57, 1.0)"
            ];
            $fillColors = [
                "rgba(255, 99, 132, 0.2)",
                "rgba(22,160,133, 0.2)",
                "rgba(255, 205, 86, 0.2)",
                "rgba(51,105,232, 0.2)",
                "rgba(244,67,54, 0.2)",
                "rgba(34,198,246, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
                "rgba(233,30,99, 0.2)",
                "rgba(205,220,57, 0.2)"
    
            ];
        $expensespie = Stock::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $chartpie = new SampleChart;
        $chartpie->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chartpie->dataset('Expenses', 'pie', $expensespie)->options([
            'fill' => 'true',
            'borderColor' => ''
        ])
        ->color($borderColors)
        ->backgroundcolor($fillColors);



        

        $salesexpenseline = Transaction::select(DB::raw("SUM(trantotal) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $salesline = new SampleChart;
        $salesline->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $salesline->dataset('Expenses', 'line', $salesexpenseline)->options([
            'fill' => 'true',
            'borderColor' => 'blue'
        ]);



        $expenseline = Stock::select(DB::raw("SUM(stock_price) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $expensesline = new SampleChart;
        $expensesline->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $expensesline->dataset('Expenses', 'line', $expenseline)->options([
            'fill' => 'true',
            'borderColor' => ''
        ])
        ->color("red")
        ->backgroundcolor("red")
        ->linetension(0.1)
        ->dashed([5]);


            return view('dashboard')
            ->with('users', $users)
            ->with('stocks', $stocks)
            ->with('transactions', $transactions)
            ->with('orderdetails', $orderdetails)
            ->with('chart', $chart)
            ->with('chartpie', $chartpie)
            ->with('salesline', $salesline)
            ->with('expensesline', $expensesline);


    }


}
