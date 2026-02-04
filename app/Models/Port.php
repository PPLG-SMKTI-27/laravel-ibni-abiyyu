<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'title',
        'description',
        'image',
        'name',
        'level'
    ];

    protected $primaryKey = 'id';

    public $timestamps = true;


}
