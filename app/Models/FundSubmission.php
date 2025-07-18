<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FundSubmission;

class FundSubmission extends Model
{
    protected $fillable = ['parish_id', 'fund_category_id', 'amount'];


    public function category(){

        return $this->belongsTo(ContributionCategory::class, 'fund_category_id');
    }
}
