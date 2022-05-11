<?php

declare(strict_types=1);

namespace Src\Mooc\Courses\Create;

final class CourseCreator
{
    private $repository;
    private $publisher;

    public function __construct(CourseRepository $repository, DomainEventPublish $publisher)
    {
        $this->repository = $repository;
        $this->publisher = $publisher;
    }

    public function __invoke(CreateCourseRequest $request)
    {
        // Descomponemos en valueObjects
        $id = new CourseId($request->id());
        $name = new CourseName($request->name());
        $duration = new CourseDuration($request->duration());

        $course = Course::create($id, $name, $duration); // named constructor

        $this->repository->save($course);
        $this->publisher->publish(...$course)
    }
}