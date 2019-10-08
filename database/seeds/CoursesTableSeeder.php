<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    protected $courses = [
        [
            'id'            =>  1,
            'course_code'   =>  'CSE',
            'course_name'   =>  'B.E. COMPUTER ENGINEERING',
            'department_id' =>  1, 
        ],
        [
        'id'            =>  2,
        'course_code'   =>  'CSC',
        'course_name'   =>  'B.Sc. COMPUTER SCIENCE',
        'department_id' =>  1, 
        ],
        [
            'id'            =>  3,
            'course_code'   =>  'BME',
            'course_name'   =>  'B.E. BIOMEDICAL ENGINEERING',
            'department_id' =>  2, 
        ],
        [
            'id'            =>  4,
            'course_code'   =>  'ECE',
            'course_name'   =>  'B.E. ELECTRONICS AND COMMUNICATIONS ENGINEERING',
            'department_id' =>  3, 
        ],
        [
            'id'            =>  5,
            'course_code'   =>  'OLG',
            'course_name'   =>  'OIL AND GAS ENGINEERING',
            'department_id' =>  4, 
        ]

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach ($this->courses as $index => $course)
        {
            $result = Course::create($course);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->courses). ' records');
    }
}
