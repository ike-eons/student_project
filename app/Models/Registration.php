<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';

    protected $fillable = ['student_id','subjects'];

     protected $cast = [
            'student_id'    => 'Integer',
            'subjects'      => 'array',
    ];

    public function student(){
        $this->belongsTo(Student::class);
    }

    public function subjects()
    {
        $this->hasMany(Subject::class);
    }

}
