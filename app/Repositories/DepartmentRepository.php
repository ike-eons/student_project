<?php

    namespace App\Repositories;

    use App\Models\Department;
    use App\Contracts\DepartmentContract;
    use Illuminate\Database\QueryException;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Doctrine\Instantiator\Exception\InvalidArgumentException;

    class DepartmentRepository extends BaseRepository implements DepartmentContract
    {
        
        public function __construct(Department $model)
        {
            parent::__construct($model);
            $this->model = $model;
        }       

        public function listDepartments( string $order = 'id', string $sort = 'desc', array $columns = ['*'])
         {
            return $this->all($columns, $order, $sort);
         }
    
        public function findDepartmentById(int $id)
        {
            try {
                return $this->findOneOrFail($id);

            } catch (ModelNotFoundException $e) {

                throw new ModelNotFoundException($e);
            }
        }

        public function createDepartment(array $params)
        {
           try {
           
                $department = new Department($params);

                $department->save();

                return $department;

            } catch (QueryException $exception) {

                throw new InvalidArgumentException($exception->getMessage());
            
            }
        }

        public function updateDepartment(array $params)
        {
            $department = $this->findDepartmentById($params['id']);

            $department->update($params);

            return $department;

        }

        public function deleteDepartment($id)
        {
            $department = $this->findDepartmentById($id);
            
            $department->delete();

            return $department;
        }
    }