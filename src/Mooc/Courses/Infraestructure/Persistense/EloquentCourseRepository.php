<?php

declare(strict_types = 1);

namespace Src\Mooc\Courses\Infraestructure\Persistense;

use Src\Mooc\Courses\Domain\CourseRepository;
use Src\Mooc\Courses\Infraestructure\Persistense\Eloquent\CourseEloquentModel;

final class EloquentCourseRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $model = new CourseEloquentModel();
        $model->id = $course->id()->value();
        $model->name = $course->name()->value();
        $model->duration = $course->duration()->value();

        $model->save();
    }

    public function search(CourseId $id): ?Course
    {
        $model = CourseEloquentModel::find($id);

        if (null === $model) {
            return null;
        }

        return new Course(new CourseId($model->id), new CourseName($model->name), new CourseDuration($model->duration));
    }
}