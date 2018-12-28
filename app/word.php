<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class word extends Model
{
    protected $fillable = [
        'title','second_title', 'status'
    ];
}
