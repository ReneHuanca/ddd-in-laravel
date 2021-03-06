<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Infraestructure\Persistense;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseName;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Courses\Infraestructure\Persistense\Eloquent\CourseEloquentModel;

final class EloquentCourseRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $model = new CourseEloquentModel();
        $model->name     = $course->name()->value();
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