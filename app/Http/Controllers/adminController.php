<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 use App\Models\User;


class adminController extends Controller
{
    

      public function list(){
        
        $admins=User::where('role', 'admin')->get();;
        return view('admin.admin.list',compact('admins'));
    }

     public function add(){

        return view('admin.admin.add');
    }




    public function insert(Request $request)
      {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        
        'telephone' => 'required|string|max:20',
    ]);

    $role = 'admin'; // implicitly set based on route/context

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'admin_number' => $request->admin_number,
        'telephone' => $request->telephone,
        'created_by' => auth()->id(),
        'role' => $role,
    ]);

    return redirect('/admin/admin/list')->with('success', 'Admin added successfully!');
}


 public function edit($id)
    {
            $admin=User::findorfail($id);
            return view('admin.admin.edit', compact('admin'));
        
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        
        'telephone' => 'required|string|max:20',
        'password' => 'nullable|string|min:6',
    ]);

    $admins = User::findOrFail($id);

    $admins->name = $request->name;
    $admins->email = $request->email;
    $admins->parish_number = $request->parish_number;
    $admins->telephone = $request->telephone;

    if ($request->filled('password')) {
        $admins->password = Hash::make($request->password);
    }

    $admins->save();
     
    return redirect('/admin/admin/list')->with('success', 'Admin updated successfully.');
}


public function delete($id){
    $admins=User::findOrFail($id);
    $admins->delete();

    return redirect()->back()->with('success', 'Admin deleted successfully.');
}


}
