<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Courses\Aplication\Create;

final class CourseCreatorTest extends CourseModuleUnitTestCase
{
    private $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new CourseCreator($this->repository(), $this->domainEventPublisher());
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $request = CreateCourseRequestMother::random();
        
        $course = CourseMother::fromRequest($request);
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->creator->__invoke($request);
    }
}