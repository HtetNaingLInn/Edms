<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role
        ]);
        return redirect(Route('user.index'))->with('success','Created Successful');
    }




    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {


        $user=User::find($id);

        $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role
        ]);
        return redirect(Route('user.index'))->with('success','Updated Successful');
    }


    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect(Route('user.index'))->with('success','Deleted Successful');
    }
}
