<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
class Student extends Model implements Authenticatable
{
    use HasFactory;
    use Notifiable;
    use AuthenticatableTrait;

        protected $guard = 'student';


        protected $fillable = [
            'stnumber',
            'email',
            'fullname',
            'dob',
            'gender',
            'district',
            'town',
            'contactnumber',
            'address',
            'course_id',
            'batch_id',
            'password',
        ];
}
