<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class role extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    //
    public function permission(){
        return $this->belongsToMany('App\permition','role_permitions','role_id','permition_id');
    }
}
