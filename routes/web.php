<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReportController;

Auth::routes();
Route::group(['middleware' => 'auth'], function() 
{  
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   // Route::get('/', function () {return view('dashboard');});
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    
    Route::get('/orders/history',  [App\Http\Controllers\HistoryController::class, 'index'])->name('orders.history');
    Route::get('/orders/indexprint', 'App\Http\Controllers\OrderController@indexprint')->name('orders.indexprint');
    Route::get('/orders/printpos/{id}', 'App\Http\Controllers\OrderController@showprintpos')->name('orders.printpos');
    Route::get('/orders/restore/one/{id}', [App\Http\Controllers\OrderController::class, 'restore'])->name('orders.restore');
    Route::get('/orders/restoreall', [App\Http\Controllers\OrderController::class, 'restoreAll'])->name('orders.restore.all');
    

    Route::resource('/orders', OrderController::class);
    Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@getPrice');
    Route::post('/orders/storecustomer', 'App\Http\Controllers\OrderController@storecustomer')->name('storecustomer');
    Route::post('/orders/storeproduct', 'App\Http\Controllers\OrderController@storeproduct')->name('storeproduct');
    
    
    Route::view('states-city','livewire.home');
    Route::view('states-cityedit','livewire.home');
    
    Route::resource('products', 'App\Http\Controllers\ProductController');

   
    Route::get('/users/profile', 'App\Http\Controllers\UserController@profile')->name('users.profile');
    Route::resource('/users', UserController::class);

    
    
    Route::get('/users/make_admin/{id}', [App\Http\Controllers\UserController::class, 'make_admin'])->name('users.make_admin');
    Route::get('/users/notmake_admin/{id}', [App\Http\Controllers\UserController::class, 'notmake_admin'])->name('users.notmake_admin');
    
    
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
    Route::PUT('/customers/{id}/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update');
    Route::get('/customers/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit');
    Route::get('/customers/{id}/destroy', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.destroy');
    
    
    
    Route::get('/suppliers/index', [App\Http\Controllers\SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers/store', [App\Http\Controllers\SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/edit/{id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::PUT('/suppliers/{id}/update', [App\Http\Controllers\SupplierController::class, 'update'])->name('suppliers.update');
    Route::get('/suppliers/{id}/destroy', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('suppliers.destroy');
    
    
    Route::get('/settings/index', [App\Http\Controllers\SettingController::class,  'index'])->name('setting.index');
    Route::get('/settings/create', [App\Http\Controllers\SettingController::class, 'create'])->name('settings.create');
    Route::post('/settings/store', [App\Http\Controllers\SettingController::class, 'store'])->name('settings.store');
    Route::delete('/settings/destroy/{id}', [App\Http\Controllers\SettingController::class, 'destroy'])->name('settings.destroy');
    
    
    Route::get('/service/index', [App\Http\Controllers\ServiceController::class,  'index'])->name('services.index');
    Route::post('/service/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('services.store');
    Route::get('/service/destroy/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('services.destroy');
    
    
    Route::post('/purchase/store', [App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('/purchase/destroy/{id}', [App\Http\Controllers\PurchaseController::class, 'destroy'])->name('purchase.destroy');
    
                 
    //Route::get('/', [OrderController::class, 'index']);  
    Route::get('cart', [OrderController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('add.to.cart');
    Route::get('update-to-cart/{id}', [OrderController::class, 'updateToCart'])->name('update.to.cart');

    Route::patch('update-cart', 'App\Http\Controllers\OrderController@updateCart')->name('update.cart');
    
    
    
    
    Route::get('/cart/clear', 'App\Http\Controllers\OrderController@clearCart')->name('checkout.cart.clear');
    Route::get('/search','App\Http\Controllers\OrderController@search');
    Route::delete('removefromcart', 'App\Http\Controllers\OrderController@remove')->name('remove.from.cart');
    


    Route::get('/reports/index', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    Route::post('/reports/index/', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    
    Route::get('/reports/indexexpenses', [App\Http\Controllers\ReportController::class, 'indexexpenses'])->name('reports.indexexpenses');
    Route::post('/reports/indexexpenses/', [App\Http\Controllers\ReportController::class, 'indexexpenses'])->name('reports.indexexpenses'); 

});
