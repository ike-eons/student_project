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
            'regular_or_weekend'   =>   'boolean',
            'course_id'            =>   'Integer',
            'nationality'           =>  'Integer',
    ];

    protected $attribute = [
            'regular_or_weekend' => 1,
            'nationality' => 0,
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

    public function scopeGhanaian($query)
    {
        return $query->where('nationality',1);
    }
    public function scopeNigerian($query)
    {
        return $query->where('nationality',2);
    }
    public function scopeOtherCountries($query)
    {
        return $query->where('nationality',3);
    }

    public function getNationalityOptions()
    {
        return[
            0 => 'GHANAIAN',
            1 => 'NIGERIAN',
            2 => 'OTHERS',
        ];
    }
   
    public function getNationalityAttribute($attribute)
    {
        return $this->getNationalityOptions()[$attribute];
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
    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
