<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Technologies;
use Carbon\Carbon;

class Employees extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'date_of_birth',
        'mobile',
        'technology_id',
        'is_experienced',
        'summary',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function technologies()
    {
        return $this->belongsTo(Technologies::class,'technology_id','id');
    }

    public function getDateOfBirthAttribute()
    {
        return  isset($this->attributes['date_of_birth']) ? Carbon::parse($this->attributes['date_of_birth'])->format('Y-m-d g:i A') : null;
    }
}
