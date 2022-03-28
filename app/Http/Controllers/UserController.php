<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $users = User::all();
        return view('users.index', ['users'=>$users]);
    }

    public function store(Request $request)
    {
        // return $request->all();

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = md5($request->password);
        $users->is_admin = $request->is_admin;

        $users->save();
        // $users = User::create($request->all());
        if($users) {
            return redirect()->back()->with('User created successfully');
        }
        if($users) {
            return redirect()->back()->with('User Creation failed');
        }
        // $users->save();
    }


    public function update(Request $request, $id) {
       
        // $users = User::find($id);

        // return $request;
        // exit;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            ]);
            $users = User::find($id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;
            $users->is_admin = $request->is_admin;
            // $users->where('id', $id)->update($users);
            // $users->save();
        if (!$users) {

            return back()->with('Error', 'User not Found');
        }
        $users->update($request->all());
        return back()->with('Success', 'User updated successfully');
    }


    public function destroy($id)
    {
        $users = User::find($id);

        if (!$users) {

            return back()->with('Error', 'User not Found');
        }
        $users->delete();
        return back()->with('Success', 'User Deleted successfully');

    }




}
