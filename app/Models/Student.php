<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
            'firstname','middlename','lastname','index_no','parent_id',
            'regular_or_weekend',
            'course_id',
            'nationality',
            'image'
        ];
    
    protected $cast = [
            'regular_or_weekend'    => 'boolean',
            'course_id'             =>'Integer',
    ];

    protected $attribute = [
            'regular_or_weekend' => 1,
    ];

    public function scopeRegular($query)
    {
        return $query->where('regular_or_weekend',1);
    }

    public function scopeWeekend($query)
    {
        return $query->where('regular_or_weekend',0);
    }

    public function getRegularOrWeekendOptions()
    {
        return [
            1 => 'REGULAR',
            0 => 'WEEKEND',
        ];
    }

    public function getRegularOrWeekendAttribute($attribute)
    {
        return $this->getRegularOrWeekendOptions()[$attribute];
    }

    public function getFirstnameAttribute($attribute)
    {
        return strtoupper($attribute);
    }

    public function getMiddlenameAttribute($attribute)
    {
        return strtoupper($attribute);
    }
    public function getLastnameAttribute($attribute)
    {
        return strtoupper($attribute);
    }

    public function getNationalityAttribute($attribute)
    {
        return strtoupper($attribute);
    }

    public function getName()
    {
        return $this->lastname .'  '. $this->middlename .'  '. $this->firstname;
    }
    public function getIndexNoAttribute($attribute)
    {
        return strtoupper($attribute);
    }

    /************* relationships ***************/
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
