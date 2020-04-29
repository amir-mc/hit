<?php

namespace App;

use Dotenv\Store\StoreBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class post extends Model
{
    use SoftDeletes;
    protected $fillable=['title','dis','contents','image','publish_at','category_id'];


    public function deleteimage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
