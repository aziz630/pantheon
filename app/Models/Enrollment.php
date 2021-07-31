<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Database table Name
     */
    protected $table = 'enrollments';

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function discount(){
    	return $this->belongsTo(DiscountStudent::class,'id','inrollment_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'academic_session_id', 'id');
    }
    
    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'id');
    }
}
