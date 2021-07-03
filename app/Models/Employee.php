<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    

    public function setFilenamesAttribute($value)
    {
        $this->attributes['empfile'] = json_encode($value);
    }

    /*
     * Database table Name
     */
    protected $table = 'employees';

    protected $guarded = [ ];
   
    // protected $fillable = ['reason_of_resign'];
    

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function qulification()
    {
        return $this->hasMany(Academic::class);
    }

    // public function EmoResigne()
    // {
    //     return $this->hasOne(EmpResigne::class);
    // }
}
