<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PopulationSubmission;
use App\Models\FundSubmission;
use App\Models\PopulationCategory;
use App\Models\ContributionCategory;


class ParishSubmissionController extends Controller
{
    public function index()
    {
        $populationCategories=PopulationCategory::all();
        $fundCategories=ContributionCategory::all();
        return view('parish.submission',compact('populationCategories','fundCategories'));
    }

    


    public function store(Request $request)
    {
        
        foreach($request->population as $categoryId => $count)
        {
            PopulationSubmission::create([
                'parish_id'=> auth()->user()->id,
                'population_category_id'=>$categoryId,
                'count'=>$count,

            ]);
        }

        foreach($request->funds as $categoryId=>$amount)
        {
            FundSubmission::create([

                'parish_id' => auth()->user()->id,
                'fund_category_id' => $categoryId,
                'amount' => $amount,
            ]);
        }
        
        return redirect()->back()->with('success', 'Parish data submitted successfully!');

    }


    public function showDataSubmissions()
    {
        $parishId=auth()->user()->id;

        $populationData=PopulationSubmission::with('category')
                       ->where('parish_id', $parishId)
                       ->get();

        $fundData=FundSubmission::with('category')
                       ->where('parish_id', $parishId)
                       ->get();    
                       
        return view('parish.submissionsview', compact('populationData', 'fundData'));
    }
}
