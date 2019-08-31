<?php

    namespace App\Contracts;

    interface StudentContract
    {
        public function listStudents( string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    
        public function findStudentById(int $id);

        public function createStudent(array $params);

        public function updateStudent(array $params);

        public function deleteStudent($id);

    }