<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class PurchaseController extends Controller
{
    

    public function store(Request $request, Stock $stock)
    {
        $request->validate([
            'stock_name'  => 'required',
            'stock_price'  => 'required',
            'stock_quantity'   => 'required',
            'stock_id'  => 'required',
            'supplier_name'   => 'required',
                ]);
                $stock = new stock();
                $stock->stock_name = $request->stock_name;   			
                $stock->stock_price = $request->stock_price;
                $stock->stock_quantity = $request->stock_quantity;   			
                $stock->stock_id = $request->stock_id;
                $stock->supplier_name = $request->supplier_name;
                $stock->user_id = Auth()->user()->id;
                $stock->save();
                session()->flash('success', 'Purchase Entry created successfully');
                return redirect()->route('suppliers.index');
    }

    public function destroy($id)
    {
        $this->authorize('is_admin');
        $stock = Stock::find($id);
        $stock->delete();
        session()->flash('success', 'suppliers successfully Deleted');
        return redirect()->route('suppliers.index');
    }




}
