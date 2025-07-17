<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\PopulationCategory;


class PopulationCategoryController extends Controller
{
    public function list(){
        
        $populations=PopulationCategory::with('creator')->orderBy('name')->get();
        return view('admin.population.list',compact('populations'));
    }

    public function add(){

        return view('admin.population.add');
    }

    public function insert(Request $request){

      $request->validate([
        'name' => 'required|string|max:255',
      ]);

      PopulationCategory::create([
        'name' => $request->name,
        'created_by' => auth()->id(),
      ]);

      return redirect('/admin/population/list')->with('success', 'populations added successfully!');
     }


 public function edit($id)
    {
            $populations=PopulationCategory::findorfail($id);
            return view('admin.population.edit', compact('populations'));
        
    }

    public function update(Request $request, $id){
    $request->validate([
        'name' => 'required|string|max:255',
        
    ]);

    $populations = PopulationCategory::findOrFail($id);

    $populations->name = $request->name;
   
    $populations->save();
     
    return redirect('/admin/population/list')->with('success', 'population category updated successfully.');
}


public function delete($id){
    $populations=PopulationCategory::findOrFail($id);
    $populations->delete();

    return redirect()->back()->with('success', 'population category deleted successfully.');
}

}


