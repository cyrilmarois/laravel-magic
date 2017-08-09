<?php

namespace App\Modules\Block\Models;

use App\Components\XModel;

class BlockContent extends XModel
{
    public $table = 'block_content';

    public $fillable = [
    	'name',
        'content',
    	'block_id',
    ];

    public $guarded = [
    	'id',
    	'created_at',
    	'updated_at',
    ];

    protected $casts = [
        'block_id' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'create' => [
            'name' => 'nullable|string|max:100',
            'content' => 'nullable|string',
            'block_id' => 'required|numeric',
        ],
        'update' => [
            'name' => 'nullable|string|max:100',
            'content' => 'nullable|string',
            'block_id' => 'required|numeric',
        ],
    ];
}
