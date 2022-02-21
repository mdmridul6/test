<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marks extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasOne(students::class, 'id', 'student_id');
    }
    public function course()
    {
        return $this->hasOne(course::class, 'id', 'course_id');
    }
}
