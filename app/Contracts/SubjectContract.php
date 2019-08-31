<?php

    namespace App\Contracts;

    interface SubjectContract
    {
        public function listSubjects( string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    
        public function findSubjectById(int $id);

        public function createSubject(array $params);

        public function updateSubject(array $params);

        public function deleteSubject($id);

    }