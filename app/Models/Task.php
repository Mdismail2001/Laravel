<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Table name is optional if it matches the plural form of the model ('tasks')
    // protected $table = 'tasks';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'description',
        'is_deleted',
        'is_completed',
    ];

    // Cast attributes to native types
    protected $casts = [
        'is_deleted' => 'boolean',
        'is_completed' => 'boolean',
    ];

    // Optional: automatically handle timestamps
    public $timestamps = true;
}


