<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Mooc\Courses\Domain\CourseDuration;
use CodelyTv\Mooc\Courses\Domain\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseName;

final class Course
{
    private $id;
    private $name;
    private $duration;

    public function __construct(?CourseId $id, CourseName $name, CourseDuration $duration)
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

    public static function register(CourseName $name, CourseDuration $duration): self
    {
        $course = new Self(null, $name, $duration);
        
        return $course;
    }

    public function id(): ?CourseId
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