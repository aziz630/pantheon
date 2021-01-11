<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Database table Name
     */
    protected $table = 'fee_categories';

    //protected $fillable = [];

    protected $guarded = [];
}
