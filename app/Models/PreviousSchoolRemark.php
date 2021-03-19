<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousSchoolRemark extends Model
{
    use HasFactory;

    /*
     * Database table Name
     */
    protected $table = 'prev_school_remarks';

    //protected $fillable = [];

    protected $guarded = [];

    public function previous_school()
    {
        return $this->belongsTo(PreviousSchool::class, 'prev_school_id');
    }
}
