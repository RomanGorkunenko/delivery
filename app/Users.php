<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='users';
    public function users() {
    return $this->belongsTo('App\Users', 'userId');
}
}
