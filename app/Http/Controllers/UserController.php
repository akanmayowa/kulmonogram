<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Validator, Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use PhpParser\Node\Expr\New_;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('is_admin');
        $key = trim($request->get('q'));
        $users = User::query()
            ->where('name', 'like', "%{$key}%")
            ->orWhere('email', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->latest()
            ->paginate(5);
        return view('users.index', compact('users'));
    }
   

    public function profile()
    {
        $users = User::all();
        return view('users.profile', compact('users'));
    }
   

    public function create()
    {


    }

    public function store(StoreUserRequest $request)
    {
                
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->is_admin = $request->is_admin;
                $user->password = Hash::make($request->get('password'));
                $user->save();
                session()->flash('success','Data has been saved successfully!');
                return redirect()->route('users.index');
                //return response()->json($user);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user',$user );
    }

 
    public function update(Request $request, $id)
    {          
           $user = New User();
           $user = User::find($id);
           $request->validate([
            'email' => 'required|email|unique:users,email,'.Auth()->user()->id,
            'name'       => 'required|max:255',
         ]);


            $user = User::findorfail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            //$user->password = Hash::make($request->get('password'));
            $user->password  =  $request->password ? $request->password: $user->password;
            $user->save();
            session()->flash('success', 'Update successfully!');
            return redirect()->route('users.index');
    }


    public function destroy($id)
    {   $this->authorize('is_admin');
        $user =  User::where("id", $id)->delete();
        if($user == 1) {
            return response()->json(["status" => "success", "message" => "Success! post deleted"]);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Alert! post not deleted"]);
        }
    }



    public function make_admin($id){

        $this->authorize('is_admin');
        $user = User::find($id);
        $user->is_admin = 1;
        $user->save();
        session()->flash('success','admin user created');
        return redirect()->back();
      }


      public function notmake_admin($id){
        $this->authorize('is_admin');
        $user = User::find($id);
        $user->is_admin = 2;
        $user->save();
        session()->flash('success', 'non admin user created');
        return redirect()->back();
      }




}
