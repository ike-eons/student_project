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

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        // CategoryContract::class         =>          CategoryRepository::class,
        // AttributeContract::class        =>          AttributeRepository::class,
        // BrandContract::class            =>          BrandRepository::class,
        // ProductContract::class          =>          ProductRepository::class,
        DepartmentContract::class       =>          DepartmentRepository::class,
        SubjectContract::class          =>          SubjectRepository::class,
        CourseContract::class           =>          CourseRepository::class,
        StudentContract::class          =>          StudentRepository::class,

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
