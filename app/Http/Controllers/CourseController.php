<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use Illuminate\Http\Request;
use Src\Mooc\Courses\Aplication\Create\CourseCreator;
use Src\Mooc\Courses\Infraestructure\Persistense\Eloquent\CourseEloquentModel;
use Src\Mooc\Courses\Infraestructure\Persistense\EloquentCourseRepository;

class CourseController extends Controller
{



    public function create()
    {
        return view('course.create', [
            'courses' => CourseEloquentModel::all()
        ]);
    }

    public function store(CreateCourseRequest $request)
    {
        $repository = new EloquentCourseRepository();
        $courseCreator = new CourseCreator($repository);
        $courseCreator->__invoke($request);

        return back();
    }
}
