<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technologies extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',        
        'deleted_at',
        'created_at',
        'updated_at'
    ];

}
