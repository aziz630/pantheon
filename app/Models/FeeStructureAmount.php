<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructureAmount extends Model
{
    use HasFactory;

    /*
     * Database table Name
     */
    protected $table = 'fee_structure_amounts';

    //protected $fillable = [];

    protected $guarded = [];
}
