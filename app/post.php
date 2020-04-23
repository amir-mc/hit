<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
       use SoftDeletes;
    protected $fillable=['title','dis','contents','image','publish_at'];
}
