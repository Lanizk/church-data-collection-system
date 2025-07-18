<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PopulationCategory;

class PopulationSubmission extends Model
{
    protected $fillable = ['parish_id', 'population_category_id', 'count'];

    public function category()
{
    return $this->belongsTo(PopulationCategory::class, 'population_category_id');
}

}
