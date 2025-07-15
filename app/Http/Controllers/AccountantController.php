<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
 use App\Models\User;
 use App\Models\Parish;

class AccountantController extends Controller
{
    

      public function list(){
        
        $parishes=User::where('role', 'parish')->get();;
        return view('admin.parish.list',compact('parishes'));
    }

     public function add(){

        return view('admin.parish.add');
    }




    public function insert(Request $request)
      {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:parishes',
        'password' => 'required|string|min:6',
        'parish_number' => 'required|string|unique:parishes',
        'telephone' => 'required|string|max:20',
    ]);

    $role = 'parish'; // implicitly set based on route/context

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'parish_number' => $request->parish_number,
        'telephone' => $request->telephone,
        'created_by' => auth()->id(),
        'role' => $role,
    ]);

    return redirect('/admin/parish/list')->with('success', 'Parish added successfully!');
}


 public function edit($id)
    {
            $parish=User::findorfail($id);
            return view('admin.parish.edit', compact('parish'));
        
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:parishes,email,' . $id,
        'parish_number' => 'required|string|unique:parishes,parish_number,' . $id,
        'telephone' => 'required|string|max:20',
        'password' => 'nullable|string|min:6',
    ]);

    $parish = User::findOrFail($id);

    $parish->name = $request->name;
    $parish->email = $request->email;
    $parish->parish_number = $request->parish_number;
    $parish->telephone = $request->telephone;

    if ($request->filled('password')) {
        $parish->password = Hash::make($request->password);
    }

    $parish->save();
     
    return redirect('/admin/parish/list')->with('success', 'Parish updated successfully.');
}


public function delete($id){
    $parish=User::findOrFail($id);
    $parish->delete();

    return redirect()->back()->with('success', 'Parish deleted successfully.');
}


}

