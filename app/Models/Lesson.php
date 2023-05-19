<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'classtype',
        'paytype',
        'teacher_id',
        'batch_id',
        'course_id',
        'lesson',
        'published_date',
        'status',
    ];
}
