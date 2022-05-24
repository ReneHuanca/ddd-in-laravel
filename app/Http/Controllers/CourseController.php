<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use CodelyTv\Mooc\Courses\Aplication\Create\CourseCreator;
use CodelyTv\Mooc\Courses\Infraestructure\Persistense\Eloquent\CourseEloquentModel;

class CourseController extends Controller
{
    private $creator;

    public function __construct(CourseCreator $creator)
    {
        $this->creator = $creator;
    }

    public function create()
    {
        return view('course.create', [
            'courses' => CourseEloquentModel::all()
        ]);
    }

    public function store(CreateCourseRequest $request)
    {
        $this->creator->__invoke($request);

        return back();
    }
}
