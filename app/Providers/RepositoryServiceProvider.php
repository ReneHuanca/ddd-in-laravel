<?php

namespace App\Providers;

use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Infraestructure\Persistense\EloquentCourseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(
            CourseRepository::class,
            EloquentCourseRepository::class,
            // OR if you need instance
            // function () {
            //     return new EloquentCourseRepository();
            // }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
