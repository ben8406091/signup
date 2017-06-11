<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $fillable = [
        'name', 'email', 'tel', 'sex', 'action_id',
    ];

    public function action()
    {
        return $this->belongsTo('App\Action');
    }

}
