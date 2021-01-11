<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Database table Name
     */
    protected $table = 'sections';

    //protected $fillable = [];

    protected $guarded = [];

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'class_section')->withTimestamps();
    }
}
