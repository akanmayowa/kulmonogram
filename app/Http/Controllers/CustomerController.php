<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Session;

class CustomerController extends Controller
{
 
    public function index(Request $request)
    {
        $key = trim($request->get('q'));
        $customers = Customer::query()
        ->where('name', 'like', "%{$key}%")
        ->orWhere('phone', 'like', "%{$key}%")
        ->orderBy('created_at', 'desc')
        ->latest()
        ->paginate(10);
        return view('customers.index')->with('customers', $customers);
    }


    public function create()
    {
        return view('customers.create');

    }

  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'address' => 'required',
          'phone' => 'required',
          'dob' => 'required',
          ]);
      $customer = new Customer();
      $customer->name = $request->name;
      $customer->address = $request->address;
      $customer->phone = $request->phone;
      $customer->dob = $request->dob;
      $customer->user_id = Auth()->user()->id;
      $customer->save();
      session()->flash('success','Customer created successfully');
      return redirect()->route('customers.index');

  }


    public function show($id)
    {
        //
    }


    public function edit($id)
{        $customers = new Customer();
        $customers = Customer::findOrFail($id);
        return view('customers.edit')->with('customers', $customers);
    }    

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            ]);
            $customer = new Customer();
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->dob = $request->dob;
        $customer->user_id = Auth()->user()->id;
        $customer->update();
        session()->flash('success', 'Customer Updated successfully');
        return redirect()->route('customers.index');
    }


    public function destroy($id)
    { $this->authorize('is_admin');
        $customer = new Customer();
        $customer = Customer::findOrFail($id);
        $customer->delete();
        session()->flash('success', 'Customer successfully Deleted');
        return redirect()->route('customers.index');
    }
}
