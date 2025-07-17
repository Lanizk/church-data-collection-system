<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class PopulationCategoryController extends Controller
{
    

      public function list(){
        
        $populations=User::where('role', 'admin')->get();;
        return view('admin.populations.list',compact('populations'));
    }

     public function add(){

        return view('admin.populations.add');
    }




    public function insert(Request $request)
      {
    $request->validate([
        'name' => 'required|string|max:255',
        
    ]);

   

    User::create([
        'name' => $request->name,
        'created_by' => auth()->id(),
        
    ]);

    return redirect('/admin/populations/list')->with('success', 'populations added successfully!');
}


 public function edit($id)
    {
            $populations=User::findorfail($id);
            return view('admin.populations.edit', compact('populations'));
        
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        
    ]);

    $populations = User::findOrFail($id);

    $populations->name = $request->name;
   

   
    $populations->save();
     
    return redirect('/admin/populations/list')->with('success', 'populations updated successfully.');
}


public function delete($id){
    $populations=User::findOrFail($id);
    $populations->delete();

    return redirect()->back()->with('success', 'populations deleted successfully.');
}


}


