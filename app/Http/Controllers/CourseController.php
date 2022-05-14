<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use CodelyTv\Mooc\Courses\Aplication\Create\CourseCreator;
use CodelyTv\Mooc\Courses\Infraestructure\Persistense\Eloquent\CourseEloquentModel;
use CodelyTv\Mooc\Courses\Infraestructure\Persistense\EloquentCourseRepository;

class CourseController extends Controller
{
    private $repository;

    public function __construct(EloquentCourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create()
    {
        return view('course.create', [
            'courses' => CourseEloquentModel::all()
        ]);
    }

    public function store(CreateCourseRequest $request)
    {
        $courseCreator = new CourseCreator($this->repository);
        $courseCreator->__invoke($request);

        return back();
    }
}
