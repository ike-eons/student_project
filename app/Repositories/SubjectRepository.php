<?php

    namespace App\Repositories;

    use App\Models\Subject;
    use App\Contracts\SubjectContract;
    use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
    use Illuminate\Database\QueryException;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Doctrine\Instantiator\Exception\InvalidArgumentException;

    class SubjectRepository extends BaseRepository implements SubjectContract
    {
        
        public function __construct(Subject $model)
        {
            parent::__construct($model);
            $this->model = $model;
        }       

        public function listSubjects( string $order = 'id', string $sort = 'desc', array $columns = ['*'])
         {
            return $this->all($columns, $order, $sort);
         }
    
        public function findSubjectById(int $id)
        {
            try {
                return $this->findOneOrFail($id);

            } catch (ModelNotFoundException $e) {

                throw new ModelNotFoundException($e);
            }
        }

        public function createSubject(array $params)
        {
           try {
           
                $subject = new Subject($params);

                $subject->save();

                return $subject;

            } catch (QueryException $exception) {

                throw new InvalidArgumentException($exception->getMessage());
            
            }
        }

        public function updateSubject(array $params)
        {
            $subject = $this->findSubjectById($params['id']);

            $subject->update($params);

            return $subject;

        }

        public function deleteSubject($id)
        {
            $subject = $this->findSubjectById($id);
            
            $subject->delete();

            return $subject;
        }
    }