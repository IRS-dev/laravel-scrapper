<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;
    protected $table = "movie";

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function website()
    {
        return $this->belongsTo('App\Models\Website','website_id');
    }
}