<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propierty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'price', 'type', 'state','description','area','direction','city','province','cp','created_at','facade','published',
    ];
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    public function photos()
    {
        return $this->hasMany('App\Properties_photos','propiedad_id');
    }


    //Sino se le pone esto se convierte en String
    protected $casts = [
        'price' => 'integer',
    ];


}
