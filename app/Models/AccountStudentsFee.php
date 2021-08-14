<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountStudentsFee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
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
        return $this->belongsTo(Session::class, 'year_id', 'id');
    }
    
    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'id');
    }
    
    public function feeCotegory()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    public function DuesFee()
    {
        return $this->belongsTo(DuesAccount::class, 'dues_id', 'id');
    }
   
}
