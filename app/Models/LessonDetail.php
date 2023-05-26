<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'lesson_id',
        'teacher_id',
        'batch_id',
        'course_id',
        'published_date',
        'status'

    ];

    public function lessonDetails()
    {
        return $this->hasMany(LessonDetail::class);
    }
}
