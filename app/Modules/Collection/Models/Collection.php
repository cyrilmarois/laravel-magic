<?php

namespace App\Modules\Collection\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public $table = 'collection';
    public $fillable = [
    	'name',
    	'slug',
    ];

    public $guarded = [
    	'id',
    	'created_at',
    	'updated_at',
    ];
}
