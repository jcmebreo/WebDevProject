<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'body',
        'course',
        'division',
        'qpi',
        'year',
        'section',
        'status',
        'user_id'
    ];
}
