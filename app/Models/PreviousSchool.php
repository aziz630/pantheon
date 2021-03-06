<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousSchool extends Model
{
    use HasFactory;

    /*
     * Database table Name
     */
    protected $table = 'prev_schools';

    //protected $fillable = [];

    protected $guarded = [];

    public function previous_school_remarks()
    {
        return $this->hasOne(PreviousSchoolRemark::class, 'prev_school_id');
    }
}
