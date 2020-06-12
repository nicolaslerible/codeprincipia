<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $fillable = [
        'codUsu', 'codLvl', 'points'
    ];

    public function getId(){
        return $this->id;
    }

    public function user(){
        //return 'increible';
        return $this->belongsTo('App\User', 'codUsu');
    }
    public function level(){
        return $this->belongsTo('App\Level', 'codLvl');
    }
}
