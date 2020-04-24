<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userphoto extends Model
{
//    protected $table = 'kbiuser';

    protected $fillable = [
        'user_id',
        'photo_id',
    ];
}
