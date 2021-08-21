<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
  
    public function index()
    {
        $this->authorize('is_admin');
        $settings = Setting::all();
        return view('settings.index')->with('settings', $settings);
    }

    public function create()
    {
        return view('settings.create');
    }


    public function store(Request $request)
    {

    $request->validate([
    'setting_name'  => 'required',
    'setting_address'  => 'required',
    'setting_phone'  => 'required',
    'setting_email'   => 'required',
        ]);
        $setting = new Setting();
        $setting->setting_name = $request->setting_name;   			
        $setting->setting_address = $request->setting_address;
        $setting->setting_phone = $request->setting_phone;
        $setting->setting_email = $request->setting_email;
        $setting->save();
        session()->flash('success', 'suppliers created successfully');
        return redirect()->route('suppliers.index');
    }


    public function show(Setting $setting)
    {
        
    }

  
    public function edit(Setting $setting, $id)
    {
        $setting = new Setting();
        $setting = Setting::findOrFail($id);
        return view('settings.edit')->with('$setting', $setting);
    }

 
    public function update(Request $request, Setting $setting)
    {
    $request->validate([
        'setting_name'  => 'required',
        'setting_address'  => 'required',
        'setting_phone'  => 'required',
        'setting_email'   => 'required',
            ]);
            $setting = new Setting();
            $setting->setting_name = $request->setting_name;   			
            $setting->setting_address = $request->setting_address;
            $setting->setting_phone = $request->setting_phone;
            $setting->setting_email = $request->setting_email;
            $setting->save();
            session()->flash('success', 'settings Updated successfully');
            return redirect()->route('suppliers.index');
    }

    public function destroy(Setting $setting, $id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        session()->flash('success', 'settings successfully Deleted');
        return redirect()->route('suppliers.index');
    }
}
