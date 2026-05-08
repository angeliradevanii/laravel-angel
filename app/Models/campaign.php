<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'target_donation',
        'collected_donation',
        'deadline',
    ];
}
