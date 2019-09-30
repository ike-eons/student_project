<?php

    namespace App\Repositories;

    use App\Models\Registration;
    use App\Contracts\RegistrationContract;
    use App\Traits\UploadAble;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Database\QueryException;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Doctrine\Instantiator\Exception\InvalidArgumentException;

    class RegistrationRepository extends BaseRepository implements RegistrationContract
    {
        use UploadAble;

        public function __construct(Registration $model)
        {
            parent::__construct($model);
            $this->model = $model;
        }       

        public function listRegistrations( string $order = 'id', string $sort = 'desc', array $columns = ['*'])
        {
            return $this->all($columns, $order, $sort);
        }
    
        public function findRegistrationById(int $id)
        {
            try {
                return $this->findOneOrFail($id);

                } catch (ModelNotFoundException $e) {

                throw new ModelNotFoundException($e);
            }
        }

       public function createRegistration(array $params)
        {
           try {
           
                $registration = new Registration($params);

                $registration->save();

                return $registration;

            } catch (QueryException $exception) {

                throw new InvalidArgumentException($exception->getMessage());
            
            }
        }

         public function updateRegistration(array $params)
        {
            $registration = $this->findRegistrationById($params['id']);

            $registration->update($params);

            return $Registration;

        }

        public function deleteRegistration($id)
        {
            $registration = $this->findRegistrationById($id);
            
            $registration->delete();

            return $registration;
        }
    }