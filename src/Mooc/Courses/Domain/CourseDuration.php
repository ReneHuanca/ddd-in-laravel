<?php

declare(strict_types = 1);

namespace Src\Mooc\Courses\Domain;

final class CourseDuration
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