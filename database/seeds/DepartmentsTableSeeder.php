<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    protected $departments = [
            [
                'id'     =>  1,
                'department_name'   =>  'COMPUTER SCIENCE & ENGINEERING',
            ],
            [
                'id'     =>  2,
                'department_name'   =>  'BIOMEDICAL ENGINEERING',
            ],
            [
                'id'     =>  3,
                'department_name'   =>  'ELETRONICS & COMMUNICATION ENGINEERING',
            ],
            [
                'id'     =>  4,
                'department_name'   =>  'OIL & GAS ENGINEERING',
            ],
            [
                'id'     =>  5,
                'department_name'   =>  'SCHOOL OF BUSINESS',
            ],
            [
                'id'     =>  6,
                'department_name'   =>  'NURSING',
            ],
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach ($this->departments as $index => $department)
        {
            $result = Department::create($department);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->departments). ' records');
    }
}
