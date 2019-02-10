<?php

namespace App\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;

class UsersTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'            => (int) $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'courses'       => $this->formatCourses($user->courses),
            'enrollments'   => $user->enrollents
        ];
    }

    private function formatEnrollments($enrollents)
    {
        $formatted_enrollments = [];

        foreach ($enrollents as $enrollment) {
            $formatted_enrollments[''];
        }

    }

    private function formatCourses($courses)
    {
        $formatted_courses = [];

        foreach ($courses as $course) {
            $formatted_course['name'] = $course->name;
            $formatted_course['description'] = $course->description;
            $formatted_course['start_date'] = $course->start_date;
            $formatted_course['end_date'] = $course->end_date;
            $formatted_course['category_id'] = $course->category;

            array_push($formatted_courses, $formatted_course);
        }

        return $formatted_courses;
    }
}
