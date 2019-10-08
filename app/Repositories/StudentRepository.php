<?php

    namespace App\Repositories;

    use App\Models\Student;
    use App\Contracts\StudentContract;
    use App\Traits\UploadAble;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Database\QueryException;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Doctrine\Instantiator\Exception\InvalidArgumentException;

    class StudentRepository extends BaseRepository implements StudentContract
    {
        use UploadAble;

        public function __construct(Student $model)
        {
            parent::__construct($model);
            $this->model = $model;
        }       

        public function listStudents( string $order = 'id', string $sort = 'desc', array $columns = ['*'])
        {
            return $this->all($columns, $order, $sort);
        }
    
        public function findStudentById(int $id)
        {
            try {
                return $this->findOneOrFail($id);

                } catch (ModelNotFoundException $e) {

                throw new ModelNotFoundException($e);
            }
        }

        public function createStudent(array $params)
        {
            try 
            {
                $collection = collect($params);

                $image = null;

                if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

                    $image = $this->uploadOne($params['image'], 'students');
                }

                $merge = $collection->merge(compact('image'));

                $student = new Student($merge->all());

                $student->save();

                return $student;

            } catch (QueryException $exception) {

                throw new InvalidArgumentException($exception->getMessage());
            }
        }

        public function updateStudent(array $params)
        {
            $student = $this->findStudentById($params['id']);

            $collection = collect($params)->except('_token');

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

                if ($student->image != null) {

                    $this->deleteOne($student->image);
                }

                $image = $this->uploadOne($params['image'], 'students');
            }

            $merge = $collection->merge(compact('image'));

            $student->update($merge->all());

            return $student;

        }

        public function deleteStudent($id)
        {
            $student = $this->findStudentById($id);

            if ($student->image != null) {
                
                $this->deleteOne($student->image);
            }

            $student->delete();

            return $student;
            }
    }