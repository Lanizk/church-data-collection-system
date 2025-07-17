<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PopulationCategory extends Model
{
     use SoftDeletes;
     protected $fillable = ['name','created_by'];

     public function creator()
    {
    return $this->belongsTo(User::class, 'created_by');
    }
}
