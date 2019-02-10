<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['course_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
