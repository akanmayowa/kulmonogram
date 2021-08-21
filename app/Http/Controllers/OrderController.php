<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
use PhpParser\Node\Expr\New_;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Input;



class OrderController extends Controller
{

    public function create()
    {

        $service = new Service();
        $service = Service::all();

        if($service->count() == 0 || $service->count() == 0)
        {
            session()->flash('session', 'create a Service!');
            return redirect()->back();
        }
        
        $states = DB::table("customers")->pluck('phone','address', 'id');  
        $customers = Customer::all();
        $products = Product::all();
        $service = Service::all();
         //session()->forget('cart');
        return view('orders.create',compact('states'))->
        with('products', $products)
        ->with('customers', $customers)
        ->with('service', $service);
    }


    public function cart()
    {
        $service = new Service();
        $service = Service::all();
        if($service->count() == 0 || $service->count() == 0)
        {
            session()->flash('warning', 'create a Service!');
            return redirect()->back();
        }
        $states = DB::table("customers")->pluck('phone','address', 'id');  
        $customers = Customer::all();
        $products = Product::all();
        $service = Service::all();
         //session()->forget('cart');
        return view('orders.cart',compact('states'))
        ->with('products', $products)
        ->with('customers', $customers)
        ->with('service', $service);
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
     
        if(!$product) {
 
            toastr()->warning('Item Not Available');
            abort(404);
 
        }
     
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "id" => $product->id,
                "product_id" => $product->product_id,
            ];
        }
        session()->put('cart', $cart);
        session()->flash('success', 'Item added to cart successfully!');
       return redirect()->back();
    }


    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity && $request->price){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $cart[$request->id]["price"] = $request->price;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully!');
        }
    }


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('danger', 'Item removed successfully');
        }
    }


    public function clearCart()
    {
        session()->forget('cart');
        session()->flash('danger', 'Cart Has been emptied cleared');
        return redirect()->back();
    }
    

   public function storecustomer(Request $request)
   {
       $request->validate([
         'phone'       => 'required|max:255',
         'address' => 'required',
         'name'  =>  'required',
      ]);
               $todayDate = Carbon::now()->format('d-m-y');
               $customer = new Customer();
               $customer->phone = $request->phone;
               $customer->address = $request->address;
               $customer->name = $request->name;
               $customer->dob = $todayDate;
               $customer->user_id = Auth()->user()->id;
               $customer->save();
               session()->flash('success', 'customer has been saved successfully!');
               return redirect()->route('orders.create');
   }

   
   public function storeproduct(Request $request)
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
               session()->flash('success', 'product has been saved successfully!');
               return redirect()->route('orders.create');
            }


   public function index()
    {
        $transaction = Transaction::all();
        $orders = Order::all();
            return view('orders.index')
              ->with('orders', $orders)
              ->with('transaction', $transaction);

    }


 
    public function store(Request $request)
    {
      $this->validate($request,[
         'payment_method' => 'required',
         'invoice_id' => 'required',
         'quantity' => 'required',
         'unitprice' => 'required',
         'trantotal'  => 'required',   
         'total'  => 'required',    
         'product_id'  => 'required',    
         'payment_method' => 'required',
     ]);

     $product = New Product();
     $product = Product::all();
     $order = New Order();
     $transaction =  New Transaction();
     $order_detail = New  Order_Detail();

     DB::transaction(function () use($order,  $order_detail, $transaction,  $request) 
     {
                $order = New Order();
                $order->name = $request->name ? $request->name : 'Null';
                $order->address = $request->address ? $request->address : 'Null';
                $order->phone = $request->phone ? $request->phone : 'Null';
                $order->customer_id = $request->customer_id ? $request->customer_id : 1;
                $order->user_id = Auth()->user()->id;
                $order->save();
                $order_id = $order->id;
                $product_id=$request->product_id;

             for ($product_id = 0; $product_id < count($request->product_id); $product_id++)
               {
                   $order_detail = New  Order_Detail();
                   $order_detail->order_id = $order_id;
                   $order_detail->product_id = $request->product_id[$product_id];
                   $order_detail->product_name = $request->product_name[$product_id];
                   $order_detail->quantity = $request->quantity[$product_id];
                   $order_detail->unitprice = $request->unitprice[$product_id];
                   $order_detail->total  = $request->total[$product_id];    
                   $order_detail->invoice_id = $request->invoice_id;
                   $order_detail->save();
               }
                    $transaction =  New Transaction();
                    $transaction->order_id =  $order_id;
                    $transaction->payment_method = $request->payment_method;
                    $transaction->transac_date = Carbon::now();   
                    $transaction->trantotal = $request->trantotal;
                    $transaction->invoice_id = $request->invoice_id;
                    $transaction->user_id = Auth()->user()->id;
                    $transaction->save();
      });    
   
switch ($request->input('action'))
{
    case 'finish':
        session()->forget('cart');
        session()->flash('success', 'Invoice created successfully');
        return redirect()->route('orders.index');
        break;
    case 'finishprint':
        session()->flash('success', 'Invoice created successfully');
        session()->forget('cart');
        return redirect()->route('orders.indexprint');
        break;
    }
 }


public function showprintorder()
{
    return view('orders.printorder');
}


public function showprintpos($id)
{
    $order = Order::findOrFail($id);
    $transaction = DB::table('transactions')->select('*')->where('order_id',  $order)->get();
    $orderdetails = DB::table('order__details')->select('*')->where('order_id',  $order)->get();
    return view('orders.printpos')
    ->with('transaction', $transaction)->with('orderdetails', $orderdetails)->with('order', $order);
}


public function search(Request $request)
{
if($request->ajax())
{
$output="";
$products=DB::table('products')->where('name','LIKE','%'.$request->search."%")->get();
if($products)
{
foreach ($products as $key => $product) {
$output.='<tr>'.
'<td>'.$product->name.'</td>'.
'<td>'.$product->quantity.'</td>'.
'<td>'.$product->price.'</td>'.
'<td>'.$product->brand.'</td>'.
'<td><a  href="/add-to-cart/'.$product->id.'" class="btn btn-warning btn-md ">Add to cart</a></td>'.
'</tr>';
}
return Response($output);
   }
   }
}



public function show($id)
{
    $order = Order::findOrFail($id);
    $transaction = Transaction::all();
    $orderdetail = Order_Detail::all();
    $customer = Customer::all();
    $product = Product::all();
    return view('orders.show', compact('order'))
               ->with('$customer', $customer)
               ->with('$transaction', $transaction)
               ->with('$orderdetail', $orderdetail);
}



public function edit($id)
{
    $order = Order::findOrFail($id);
    $states = DB::table("customers")->pluck('phone','address', 'id');  
    return view('orders.edit', compact('states'))
               ->with('order', $order);
}


public function update(Request $request, $id)
{
    
    $this->validate($request,[
        'quantity' => 'required',
        'unitprice' => 'required',
        'trantotal'  => 'required',   
        'total'  => 'required',    
        'product_id'  => 'required',    
        'product_name'  => 'required',   
    ]);


     $order = Order::findorfail($id);
     $product = Product::all();

    DB::transaction(function () use($order,  $request) 
    {               
 

       
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++)
              { 
                  
      
                foreach($order->orderdetail as $ordern)  $ordern->order_id = $request->order_id[$product_id];
                foreach($order->orderdetail as $ordern) $ordern->product_id = $request->product_id[$product_id];
                foreach($order->orderdetail as $ordern) $ordern->product_name = $request->product_name[$product_id];
                foreach($order->orderdetail as $ordern) $ordern->quantity = $request->quantity[$product_id];
                foreach($order->orderdetail as $ordern) $ordern->unitprice = $request->unitprice[$product_id];
                foreach($order->orderdetail as $ordern) $ordern->total  = $request->total[$product_id];  
                foreach($order->orderdetail as $ordern) $ordern->update();
           

              
            }
            
            foreach($order->transaction as $ordernn)
                   $ordernn->trantotal = $request->trantotal;
                   $ordernn->save();
     });    
  
switch ($request->input('action'))
{
   case 'finish':
       session()->forget('cart');
       session()->flash('success', 'Invoice Edit successfully');
       return redirect()->route('orders.index');
       break;
   case 'finishprint':
    session()->flash('success','Invoice Edit successfully');
       session()->forget('cart');
       return redirect()->route('orders.indexprint');
       break;
   }

}


public function destroy($id)
{
    
    $this->authorize('is_admin');
    $order = Order::findOrFail($id);
    $order->delete();
    $order->orderdetail()->delete();
    $order->transaction()->delete();
    session()->flash('warning', 'Orders and transaction Deleted!');
    return redirect()->route('orders.index');

}


public function indexprint()
{
 $products = Product::all();
 $orders = DB::table('orders')->latest()->first();
 $transactions = DB::table('transactions')->latest()->first();
 $lastid = Order_Detail::max('order_id');
 $orderdetails =  Order_Detail::where('order_id', $lastid)->get();
                              return view('orders.printorder')
                             ->with('orderdetails', $orderdetails)
                             ->with('products', $products)
                             ->with('orders', $orders)
                             ->with('transactions', $transactions);
}
    
}
