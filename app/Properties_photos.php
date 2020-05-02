<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class properties_photos extends Model
{

    protected $fillable = [
        'propiedad_id', 'photo'
    ];

    public function propierty(){
        return $this->belongsTo('App\Propierty','id');
    }
}
