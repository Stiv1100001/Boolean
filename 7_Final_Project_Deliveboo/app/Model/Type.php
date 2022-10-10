<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Type extends Model
{
    protected $fillable=[
        "name_type"
    ];

    public function user(){
        return $this->belongsToMany("App\User");
    }

}
