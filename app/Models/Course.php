<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\Student;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['course_code','course_name','department_id'];

    protected $cast = [
                'department_id'     => 'Integer',
    ];

    public function getCourseCodeAttribute($attribute)
    {
        return strtoupper($attribute);
    }

    public function getCourseNameAttribute($attribute)
    {
        return strtoupper($attribute);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
