<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoImage extends Model
{
    protected $guarded = [];

    //关联
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

}
