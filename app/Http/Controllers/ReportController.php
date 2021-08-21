<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\PDF as PDF;
use App\Http\Requests;
use App\Models\Stock;
use App\Models\Supplier;

class ReportController extends Controller
{
    public function index(Request $req)
    {
        $transaction = Transaction::all();
        $transaction = new Transaction();
        $method = $req->method();
       
       
        if ($req->isMethod('post'))
        {
            $user = User::all();
            $from = $req->input('from');
            $to   = $req->input('to');
            if ($req->has('search'))
            {
                $search = DB::select("SELECT * FROM transactions WHERE transac_date BETWEEN '$from' AND '$to'");
                return view('reports.index',['transaction' => $search])
                ->with('user', $user);
            }
        }
        else
        {
            $user = User::all();
            $transaction = Transaction::all();
            $transaction = DB::select('SELECT * FROM transactions');
            return view('reports.index',['transaction' => $transaction])
            ->with('user', $user);        
        }   

    }

    public function indexexpenses(Request $req)
    {
        $stock = Stock::all();
        $stock = new Stock();
        $method = $req->method();
       
       
        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if ($req->has('search'))
            {
                $search = DB::select("SELECT * FROM stocks WHERE created_at BETWEEN '$from' AND '$to'");
                return view('reports.indexexpenses',['stock' => $search]);
            }
        }
        

        else
        {
            $stock = Stock::all();
            $stock = DB::select('SELECT * FROM stocks');
            return view('reports.indexexpenses',['stock' => $stock]);
        }   

    }



   

    


}
