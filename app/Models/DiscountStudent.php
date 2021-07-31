<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountStudent extends Model
{
    use HasFactory;

    protected $table = 'discount_students';

    //protected $fillable = [];

    protected $guarded = [];
}
