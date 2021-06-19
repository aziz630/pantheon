<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;
    

    /*
     * Database table Name
     */
    protected $table = 'employees';

    protected $guarded = [];

    public function qulification()
    {
        return $this->hasMany(Academic::class);
    }
}
