<?php

namespace App\Transformers;


use App\Models\Enrollment;
use League\Fractal\TransformerAbstract;

class EnrollmentTransformer extends TransformerAbstract
{

    /**
     * EnrollmentTransformer constructor.
     */
    public function __construct()
    {
    }

    public function transform(Enrollment $enrollment)
    {
        return [
            'id'=> $enrollment->id,
            'course' => $this->formatCourse($enrollment->course),
            'user' => $this->formatUser($enrollment->user)
        ];

    }

    private function formatCourse($course)
    {
        return [
            'id' => $course->id,
            'name' => $course->name,
            'description' => $course->description,
            'start_date' => $course->start_date,
            'end_date' => $course->end_date,
        ];

    }

    private function formatUser($user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];

    }


}
