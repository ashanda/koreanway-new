<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'lesson_id',
        'lecture_title',
        'thumbnail',
        'background_image',
        'teacher_id',
        'batch_id',
        'course_id',
        'video_link',
        'video_title',
        'video_description',
        'live_link',
        'live_title',
        'live_description',
        'mcq_id',
        'paper_id',
        'tute',
        'audio',
        'extra_video',
        'extra_youtube',
    ];
    

    public function lessonDetails()
    {
        return $this->hasMany(LessonDetail::class, 'lesson_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
