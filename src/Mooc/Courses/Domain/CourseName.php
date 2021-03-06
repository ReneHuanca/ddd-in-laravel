<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Domain;

final class CourseName
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}