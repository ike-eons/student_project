<?php

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    protected $students = [
            [
                'id'                    =>  1,
                'firstname'             =>  'Emmanuel',
                'middlename'            =>  'kwame',
                'lastname'              =>  'Agyapong',
                'index_no'              =>  'ANU16280111',
                'nationality'           =>  0,
                'regular_or_weekend'    =>  1,
                'image'                 =>  null,
                'course_id'             =>  1,
            ],
            [
                'id'                    =>  2,
                'firstname'             =>  'Benjamin',
                'middlename'            =>  'Amoateng',
                'lastname'              =>  'Ofori',
                'index_no'              =>  'ANU16280415',
                'nationality'           =>  0,
                'regular_or_weekend'    =>  1,
                'image'                 =>  null,
                'course_id'             =>  1,
            ],
            [
                'id'                    =>  3,
                'firstname'             =>  'Gloria',
                'middlename'            =>  '',
                'lastname'              =>  'Owusuaa',
                'index_no'              =>  'ANU16280419',
                'nationality'           =>  0,
                'regular_or_weekend'    =>  1,
                'image'                 =>  null,
                'course_id'             =>  2,
            ],
            [
                'id'                    =>  4,
                'firstname'             =>  'Jame',
                'middlename'            =>  'Promise',
                'lastname'              =>  'Uche',
                'index_no'              =>  'ANU16280549',
                'nationality'           =>  1,
                'regular_or_weekend'    =>  1,
                'image'                 =>  null,
                'course_id'             =>  2,
            ],
            [
                'id'                    =>  5,
                'firstname'             =>  'Daniel',
                'middlename'            =>  '',
                'lastname'              =>  'Okafor',
                'index_no'              =>  'ANU17280219',
                'nationality'           =>  1,
                'regular_or_weekend'    =>  1,
                'image'                 =>  null,
                'course_id'             =>  4,
            ],
            [
                'id'                    =>  6,
                'firstname'             =>  'Alberta',
                'middlename'            =>  '',
                'lastname'              =>  'Darko',
                'index_no'              =>  'ANU17281119',
                'nationality'           =>  0,
                'regular_or_weekend'    =>  1,
                'image'                 =>  null,
                'course_id'             =>  3,
            ],
            [
                'id'                    =>  7,
                'firstname'             =>  'Gloria',
                'middlename'            =>  '',
                'lastname'              =>  'kuma',
                'index_no'              =>  'ANU16280409',
                'nationality'           =>  0,
                'regular_or_weekend'    =>  1,
                'image'                 =>  null,
                'course_id'             =>  5,
            ],
            
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach ($this->students as $index => $student)
        {
            $result = Student::create($student);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->students). ' records');
    }
}
