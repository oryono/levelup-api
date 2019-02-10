<?php

namespace App\Http\Controllers;

use App\Transformers\CourseTransformer;
use App\Transformers\EnrollmentTransformer;
use App\Transformers\UsersTransformer;
use App\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use Helpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return $this->response->paginator($users, new UsersTransformer());
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Dingo\Api\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->response->item($user, new UsersTransformer());
    }


    public function getEnrollments($id)
    {
        $enrollments = User::findOrFail($id)->enrollments()->paginate(10);
        return $this->response->paginator($enrollments, new EnrollmentTransformer);

    }

    public function getCourses($id)
    {
        $courses = User::findOrFail($id)->courses()->paginate();
        return $this->response->paginator($courses, new CourseTransformer());
    }


}
