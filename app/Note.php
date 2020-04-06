<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'user',
        'text',
        'completed',
        'created_at',
        'updated_at'
    ];
}
