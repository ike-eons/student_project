<?php

    namespace App\Contracts;

    interface DepartmentContract
    {
        public function listDepartments( string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    
        public function findDepartmentById(int $id);

        public function createDepartment(array $params);

        public function updateDepartment(array $params);

        public function deleteDepartment($id);

    }