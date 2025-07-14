<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    use SOftDeletes;

    protected $fillable = [
    'parish_name', 'email', 'password', 'parish_number',
    'telephone', 'created_by', 'role'
     ];

     protected $hidden = [
    'password',
    ];







}
