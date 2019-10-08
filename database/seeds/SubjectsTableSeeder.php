<?php

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    protected $subjects = [
        [
            'id'            =>  1,
            'subject_code'  =>  'csc408',
            'subject_name'  =>  'unix and linux programming',
            'credit_hours'  =>  3,

        ],
        [
        'id'            =>  2,
        'subject_code'  =>  'csc404',
        'subject_name'  =>  'software quality theory and management',
        'credit_hours'  =>  3,

        ],
         [
            'id'            =>  3,
            'subject_code'  =>  'bus433',
            'subject_name'  =>  'engineering economics and management',
            'credit_hours'  =>  3,
        ],
         [
            'id'            =>  4,
            'subject_code'  =>  'ece107',
            'subject_name'  =>  'micro processor based system design and embedded systems',
            'credit_hours'  =>  3,
        ],
         [
            'id'            =>  5,
            'subject_code'  =>  'cse406',
            'subject_name'  =>  'TCP/IP Principles and architecture',
            'credit_hours'  =>  3,
        ],
         [
            'id'            =>  6,
            'subject_code'  =>  'mth403',
            'subject_name'  =>  'operations research',
            'credit_hours'  =>  3,
        ],
         [
            'id'            =>  7,
            'subject_code'  =>  'cse410',
            'subject_name'  =>  'web technology',
            'credit_hours'  =>  3,

        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach ($this->subjects as $index => $subject)
        {
            $result = Subject::create($subject);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->subjects). ' records');
    }
}
