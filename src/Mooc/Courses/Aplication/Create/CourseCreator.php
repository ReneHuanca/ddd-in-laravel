<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Aplication\Create;

use App\Http\Requests\CreateCourseRequest;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;

final class CourseCreator
{
    private $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCourseRequest $request)
    {
        $id       = new CourseId("3");
        $name     = new CourseName($request->name);
        $duration = new CourseDuration($request->duration);

        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
    }
}