<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Database table Name
     */
    protected $table = 'students';

    protected $guarded = [];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
}
