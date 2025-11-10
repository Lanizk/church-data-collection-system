<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ContributionCategory;


class ContributionCategoryController extends Controller
{
    

     public function list() {
    $contributions = ContributionCategory::with('creator')->orderBy('name')->paginate(10); // 10 items per page
    return view('admin.contribution.list', compact('contributions'));
}


     public function add(){

        return view('admin.contribution.add');
    }




    public function insert(Request $request)
      {
    $request->validate([
        'name' => 'required|string|max:255',
        
    ]);

   

    ContributionCategory::create([
        'name' => $request->name,
        'created_by' => auth()->id(),
        
    ]);

    return redirect('/admin/contribution/list')->with('success', 'Contribution added successfully!');
}


 public function edit($id)
    {
            $contributions=ContributionCategory::findorfail($id);
            return view('admin.contribution.edit', compact('contributions'));
        
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        
    ]);

    $contributions = ContributionCategory::findOrFail($id);

    $contributions->name = $request->name;
   

   
    $contributions->save();
     
    return redirect('/admin/contribution/list')->with('success', 'Contribution updated successfully.');
}


public function delete($id){
    $contributions=ContributionCategory::findOrFail($id);
    $contributions->delete();

    return redirect()->back()->with('success', 'Contribution deleted successfully.');
}


}

