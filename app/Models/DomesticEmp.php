<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomesticEmp extends Model
{
    use HasFactory;

    protected $table = 'domestic_emps';

    protected $guarded = [];
}
