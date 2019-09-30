<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
        protected $table = 'subjects';

        protected $fillable = ['subject_code','subject_name','credit_hours'];

        protected $cast =[
            'credit_hours' => 'Integer',
        ];

        public function getSubjectNameAttribute($attribute)
        {
            return strtoupper($attribute);
        }
        public function getSubjectCodeAttribute($attribute)
        {
            return strtoupper($attribute);
        }
        public function registration()
        {
            return $this->belongsTo(Registration::class);
        }
}
