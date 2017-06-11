<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //若符合慣例可以不用設定這些
    protected $table      = 'actions';
    protected $primaryKey = 'id';
    protected $fillable   = [
        'title', 'content', 'user_id', 'enable',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
