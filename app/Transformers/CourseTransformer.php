<?php

namespace App\Transformers;


use App\Models\Course;
use League\Fractal\TransformerAbstract;

class CourseTransformer extends TransformerAbstract
{
    public function transform(Course $course)
    {
        return [
            'id' => (int)$course->id,
            'name' => $course->name,
            'description' => $course->description,
            'category' => $this->formatCategory($course->category),
            'instructor' => $this->formatInstructor($course->instructor),
            'start_date' => $course->start_date,
            'end_date' => $course->end_date,

        ];

    }

    private function formatCategory($category)
    {
        return [
            'name' => $category->name,
            'description' => $category->description
        ];

    }

    private function formatInstructor($instructor)
    {
        return [
            'id'    => $instructor->id,
            'name' => $instructor->name,
            'email' => $instructor->email
        ];

    }
}
