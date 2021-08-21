<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;


class ServiceController extends Controller
{

    public function index()
    {
        $service = Service::all();
        return view('products.index')->with('service', $service);
    }


    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        session()->flash('success', 'Services successfully Deleted');
        return redirect()->route('products.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            ]);
            $service = new Service();
            $service->service_name = $request->service_name;
            $service->save();
            session()->flash('success', 'Services successfully Added');
            return redirect()->route('products.index');

    }

}
