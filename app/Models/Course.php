<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['user_id'];

    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
