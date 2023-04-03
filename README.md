"# employee_demo" 


------------------------------------------------------------------------
Databse Migrations
------------------------------------------------------------------------
php artisan make:migration create_employees_table
php artisan make:migration create_technologies_table
------------------------------------------------------------------------
Use following library in the Model for implementing softdelete
------------------------------------------------------------------------
Following should be the content of a model
------------------------------------------------------------------------
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


-----------------------------------------------------------------------
use Illuminate\Database\Eloquent\SoftDeletes;
------------------------------------------------------------------------
Commands Used to Create Models
------------------------------------------------------------------------
php artisan make:model Models\Employees
php artisan make:model Models\Technologies
------------------------------------------------------------------------
Commands Used to Create Controllers (WEB)
------------------------------------------------------------------------
php artisan make:controller EmployeeController --resource
------------------------------------------------------------------------
Run Migration
------------------------------------------------------------------------
php artisan migrate
------------------------------------------------------------------------
Run following SQL query
------------------------------------------------------------------------
INSERT INTO `technologies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP', NULL, NULL),
(2, 'Laravel', NULL, NULL),
(3, 'Java', NULL, NULL),
(4, 'Andriod', NULL, NULL),
(5, 'Python', NULL, NULL);
------------------------------------------------------------------------
To Start Laravel Server
------------------------------------------------------------------------
php artisan cache:clear && php artisan view:cache && php artisan config:cache && php artisan route:cache && php artisan serve --port=8000
------------------------------------------------------------------------


