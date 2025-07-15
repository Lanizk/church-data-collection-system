<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 use App\Models\User;
 

class AccountantController extends Controller
{
    

    public function list(){
        
        $accounts=User::where('role', 'accountant')->get();;
        return view('admin.accountant.list',compact('accounts'));
    }

     public function add(){

        return view('admin.accountant.add');
    }




    public function insert(Request $request)
      {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        
        'telephone' => 'required|string|max:20',
    ]);

    $role = 'accountant'; 
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
       
        'telephone' => $request->telephone,
        'created_by' => auth()->id(),
        'role' => $role,
    ]);

    return redirect('/admin/accountant/list')->with('success', 'Accountant added successfully!');
}


 public function edit($id)
    {
            $accounts=User::findorfail($id);
            return view('admin.accountant.edit', compact('accounts'));
        
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
       
        'telephone' => 'required|string|max:20',
        'password' => 'nullable|string|min:6',
    ]);

    $accounts = User::findOrFail($id);

    $accounts->name = $request->name;
    $accounts->email = $request->email;
  
    $accounts->telephone = $request->telephone;

    if ($request->filled('password')) {
        $parish->password = Hash::make($request->password);
    }

    $accounts->save();
     
    return redirect('/admin/accountant/list')->with('success', 'Accountant updated successfully.');
}


public function delete($id){
    $accounts=User::findOrFail($id);
    $accounts->delete();

    return redirect()->back()->with('success', 'Accountant deleted successfully.');
}


}

