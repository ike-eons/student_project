<?php

    namespace App\Contracts;

    interface RegistrationContract
    {
        public function listRegistrations( string $order = 'id', string $sort = 'desc', array $columns = ['*']);
    
        public function findRegistrationById(int $id);

        public function createRegistration(array $params);

        public function updateRegistration(array $params);

        public function deleteRegistration($id);

    }