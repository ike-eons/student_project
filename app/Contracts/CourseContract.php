<?php

    namespace App\Contracts;

    interface CourseContract
    {
        public function listCourses(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
        public function findCourseById(int $id);
        public function createCourse(array $params);
        public function updateCourse(array $params);
        public function deleteCourse($id);
    }