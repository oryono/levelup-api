<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Transformers\EnrollmentTransformer;
use App\User;
use Illuminate\Http\Request;
use App\Transformers\CourseTransformer;

class CourseController extends Controller
{
    const MAXIMUM_PAGINATION = 50;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = request('limit');
        if ($limit > self::MAXIMUM_PAGINATION) {
            $limit = self::MAXIMUM_PAGINATION;
        }

        $courses = Course::paginate($limit);
        return $this->response->paginator($courses, new CourseTransformer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }
        return $this->response->item($course, new CourseTransformer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enroll(EnrollmentRequest $request, $course_id, $user_id)
    {
        $enrollments = User::findOrFail($user_id)->enrollments->pluck('course_id')->toArray();
        if (in_array($course_id, $enrollments)) {
            $this->response->errorBadRequest('You enrolled already');
        }
        $enrollment = new Enrollment(['course_id' => $course_id, 'user_id' => $user_id]);

        if (!$enrollment->save()) {
            $this->response->errorBadRequest('Something went wrong');
        }

        return $this->response->item($enrollment, new EnrollmentTransformer());

    }
}
