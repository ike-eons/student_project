<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = ['department_name'];

    public function getDepartmentNameAttribute($attribute)
    {
        return strtoupper($attribute);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    
}

