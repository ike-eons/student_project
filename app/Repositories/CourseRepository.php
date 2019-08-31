<?php

    namespace App\Repositories;

    
    use App\Models\Course;
    use App\Contracts\CourseContract;
    use Illuminate\Database\QueryException;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Doctrine\Instantiator\Exception\InvalidArgumentException;

    class CourseRepository extends BaseRepository implements CourseContract
    {
        public function __construct(Course $model)
        {
            parent::__construct($model);
            $this->model = $model;
        }       

        public function listCourses( string $order = 'id', string $sort = 'desc', array $columns = ['*'])
         {
            return $this->all($columns, $order, $sort);
         }
    
        public function findCourseById(int $id)
        {
            try {
                return $this->findOneOrFail($id);

            } catch (ModelNotFoundException $e) {

                throw new ModelNotFoundException($e);
            }
        }

        public function createCourse(array $params)
        {
           try {
           
                $course = new Course($params);

                $course->save();

                return $course;

            } catch (QueryException $exception) {

                throw new InvalidArgumentException($exception->getMessage());
            
            }
        }

        public function updateCourse(array $params)
        {
            $course = $this->findCourseById($params['id']);

            $course->update($params);

            return $course;

        }

        public function deleteCourse($id)
        {
            $course = $this->findCourseById($id);
            
            $course->delete();

            return $course;
        }
    }