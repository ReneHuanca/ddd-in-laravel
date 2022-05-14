<?php

declare(strict_types = 1);

namespace Src\Mooc\Courses\Domain;

use Src\Mooc\Courses\Domain\CourseDuration;
use Src\Mooc\Courses\Domain\CourseId;
use Src\Mooc\Courses\Domain\CourseName;

final class Course
{
    private $id;
    private $name;
    private $duration;

    public function __construct(CourseId $id, CourseName $name, CourseDuration $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
    }

    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): self
    {
        $course = new Self($id, $name, $duration);
        
        return $course;
    }

    public function id(): CourseId
    {
        return $this->id;
    }

    public function name(): CourseName
    {
        return $this->name;
    }

    public function duration(): CourseDuration
    {
        return $this->duration;
    }
}