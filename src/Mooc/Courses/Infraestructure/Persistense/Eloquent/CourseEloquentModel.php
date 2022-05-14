<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Infraestructure\Persistense\Eloquent;

use Illuminate\Database\Eloquent\Model;

final class CourseEloquentModel extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'name',
        'duration'
    ];

    protected $primaryKey = 'id';
}