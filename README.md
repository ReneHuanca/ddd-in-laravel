## DDD in Laravel 9

DDD example in laravel.

### Instalation

Clone this repository.

```php
git clone https://github.com/ReneHuanca/ddd-in-laravel.git 
```

Install the dependencies.

```php
cd ddd-in-laravel
composer install
```

Copy the .env.example configure the database and generate a key.

```php
cp .env.example .env
php artisan key:generate
```

Run the migrations

```bash
php artisan migrate
```

Run serve with artisan.

```php
php artisan serve
```

### Project estructure

In this repositoru we can see that the current structure and the changes.

```scala
app
|-- Http
|    `-- Controllers
|        `-- CourseController.php // can be in infraestructure
`-- Providers
    `-- RepositoryServiceProvider.php // bind the CourseRepository.php interface with EloquentCourseRepository 
bootstrap
config
`-- app.php // add it here the RepositoryServiceProvider
database
lang
public
resources
routes
src
`-- Mooc // Bounded Context
    `-- Courses // Module
        |-- Application
        |   |-- Create // Actions
        |   |   `-- CourseCreator.php
        |-- Domain
        |   |-- Course.php // Entitie
        |   |-- CourseDuration.php // Value Object
        |   |-- CourseId.php
        |   |-- CourseName.php
        |   `-- CourseRepository.php // Interface
        `-- Infrastructure
            `-- Persistence
                |-- Eloquent
                |   `-- CourseEloquentModel.php
                `-- EloquentCourseRepository.php
storage
test
```
