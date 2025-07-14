<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 use App\Models\Parish;

class ParishController extends Controller
{
    

      public function list(){
        
        $parishes=Parish::all();
        return view('admin.parish.list',compact('parishes'));
    }

     public function add(){

        return view('admin.parish.add');
    }




    public function insert(Request $request)
      {
    $request->validate([
        'parish_name' => 'required|string|max:255',
        'email' => 'required|email|unique:parishes',
        'password' => 'required|string|min:6',
        'parish_number' => 'required|string|unique:parishes',
        'telephone' => 'required|string|max:20',
    ]);

    $role = 'parish'; // implicitly set based on route/context

    Parish::create([
        'parish_name' => $request->parish_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'parish_number' => $request->parish_number,
        'telephone' => $request->telephone,
        'created_by' => auth()->id(),
        'role' => $role,
    ]);

    return redirect()->back()->with('success', 'Parish added successfully!');
}


 public function edit($id , Request $request)
    {
       
            return view('admin.parish.edit');
        
    }


}
