<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
        'tasks' => 'array',
        'tasks_en' => 'array',
        'is_active' => 'boolean',
    ];
}
