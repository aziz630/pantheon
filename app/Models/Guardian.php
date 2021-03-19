<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Database table Name
     */
    protected $table = 'guardians';

    //protected $fillable = [];

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function account_transaction()
    {
        return $this->hasMany(FamilyTransaction::class);
    }
}
