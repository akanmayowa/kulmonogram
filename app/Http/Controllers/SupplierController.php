<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Stock;

use function GuzzleHttp\Promise\all;

class SupplierController extends Controller
{
    
        public function index()
        {   
            $suppliers = Supplier::all();
           $stocks = Stock::all();
        //   $stocks = Supplier::join('stocks', 'stocks.supplier_id', '=', 'suppliers.id')
           //->get();
            return view('suppliers.index')->with('suppliers', $suppliers)
                                           ->with('stocks', $stocks);
        }

        public function create()
        {
            return view('suppliers.create');
        }


        public function edit($id)
        {
            $suppliers = new Supplier();
            $suppliers = Supplier::findOrFail($id);
            return view('suppliers.edit', compact('suppliers'));
        }

        public function update(Request $request, $id)
        {
            $request->validate([
                'supplier_name' => 'required',
                'supplier_email' => 'required',
                'supplier_phone' => 'required',
                'supplier_id' => 'required',
                ]);
            $suppliers = new Supplier();
            $suppliers = Supplier::Find($id);
            $suppliers->supplier_name = $request->supplier_name;   			
            $suppliers->supplier_email = $request->supplier_email;
            $suppliers->supplier_phone = $request->supplier_phone;
            $suppliers->supplier_id = $request->supplier_id;
            $suppliers->save();
            session()->flash('success', 'suppliers created successfully');
            return redirect()->route('suppliers.index');
        }

        public function destroy($id)
        {
    $this->authorize('is_admin');
            $suppliers = new Supplier();
            $suppliers = Supplier::find($id);
            $suppliers->delete();
            session()->flash('success', 'suppliers successfully Deleted');
            return redirect()->route('suppliers.index');
        }


        public function store(Request $request)
        {
            $request->validate([
                'supplier_name' => 'required',
                'supplier_email' => 'required',
                'supplier_phone' => 'required',
                'supplier_id' => 'required',
                ]);
            $suppliers = new Supplier();
            $suppliers->supplier_name = $request->supplier_name;   			
            $suppliers->supplier_email = $request->supplier_email;
            $suppliers->supplier_phone = $request->supplier_phone;
            $suppliers->supplier_id = $request->supplier_id;
            $suppliers->save();
            session()->flash('success','suppliers created successfully');
            return redirect()->route('suppliers.index');

        }
}
