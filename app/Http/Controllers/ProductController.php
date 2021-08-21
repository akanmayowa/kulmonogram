<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Redirect,Response;
use App\Models\Service;



class ProductController extends Controller
{

    public function index(Request $request)
    {
      $service = new Service();
      $service = Service::all();
        $key = trim($request->get('q'));
        $posts = Product::query()
            ->where('name', 'like', "%{$key}%")
            ->orWhere('description', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->latest()
            ->paginate(10);
             return view('products.index', ['posts' => $posts])
            ->with('service', $service);
    }


    public function store(Request $request)
    {

 
       $request->validate([
          'name'       => 'required|max:255',
          'description' => 'required',
          'brand' => 'required',
          'quantity' => 'required',
          'price' => 'required',
        ]);
        

        $post = Product::updateOrCreate(['id' => $request->id], [
                  'name' => $request->name,
                  'description' => $request->description,
                  'brand' => $request->brand,
                  'quantity' => $request->quantity,
                  'price' => $request->price,
                ]);
      return response()->json(['code'=>200, 
      'message'=>'Item Created successfully',
      'data' => $post], 200);

    }

  


    public function show($id)
    {
        $post = Product::find($id);
        return response()->json($post);
    }





    public function destroy($id)
    {
      $post = Product::find($id)->delete();
      return response()->json(['success'=>'Post Deleted successfully']);
    }
}
