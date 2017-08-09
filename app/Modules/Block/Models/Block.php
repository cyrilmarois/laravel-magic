<?php

namespace App\Modules\Block\Models;

use App\Components\XModel;

class Block extends XModel
{
    public $table = 'block';
    public $fillable = [
    	'slug',
        'count',        
    ];

    public $guarded = [
    	'id',
    	'created_at',
    	'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'create' => [
            'slug' => 'required|string|max:255',
            'count' => 'required|numeric',
        ],
        'update' => [
            'slug' => 'nullable|string|max:255',
            'count' => 'nullable|numeric',
        ],
    ];
}
