<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;


    public function marks()
    {
        return $this->belongsTo(marks::class, 'id', 'student_id');
    }
}
