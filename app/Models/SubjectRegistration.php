<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectRegistration extends Model
{
    protected $table = 'subject_registrations';

    protected $fillable = ['student_id','subject_id'];

     protected $cast = [
            'student_id'    => 'Integer',
            'subjects'      => 'array',
    ];

    public function student(){
        $this->belongsTo(Student::class);
    }

}
