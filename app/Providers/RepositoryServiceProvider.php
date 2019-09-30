<?php

namespace App\Providers;



use Illuminate\Support\ServiceProvider;

use App\Contracts\DepartmentContract;
use App\Repositories\DepartmentRepository;
use App\Contracts\SubjectContract;
use App\Repositories\SubjectRepository;
use App\Contracts\CourseContract;
use App\Repositories\CourseRepository;
use App\Contracts\StudentContract;
use App\Repositories\StudentRepository;
use App\Contracts\RegistrationContract;
use App\Repositories\RegistrationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        
        DepartmentContract::class       =>          DepartmentRepository::class,
        SubjectContract::class          =>          SubjectRepository::class,
        CourseContract::class           =>          CourseRepository::class,
        StudentContract::class          =>          StudentRepository::class,
        RegistrationContract::class          =>     RegistrationRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
