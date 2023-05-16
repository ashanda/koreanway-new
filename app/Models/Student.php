<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory;
    use Notifiable;

        protected $table = 'lmsregister';
        protected $guard = 'student';


        protected $fillable = [

            'contactnumber', 'password',

        ];
}
