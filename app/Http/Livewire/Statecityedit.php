<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use App\Models\Customers;

class Statecityedit extends Component
{
    
    
    public function render()
    {
        return view('livewire.statecityedit')->extends('orders.edit');
    }

    public $states;
    public $address;
    public $phones;
    public $custid;
    
    public $selectedState = NULL;

    public function mount()
    {
        $this->states = Customer::select('id', 'name', 'phone', 'address')->get();
        $this->custid = collect();
        $this->address = collect();
        $this->phones = collect();
    }


    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->custid = Customer::where('id', $state)->select('id')->get();
            $this->address = Customer::where('id', $state)->select('address')->get();
            $this->phones = Customer::where('id', $state)->select('phone')->get();
        }
    }
}
