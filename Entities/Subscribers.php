<?php

namespace Modules\Inewsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{

    protected $table = 'inewsletter__subscribers';
    protected $fillable = ['email','name'];


}
