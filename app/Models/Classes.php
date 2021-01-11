<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Database table Name
     */
    protected $table = 'classes';

    //protected $fillable = [];

    protected $guarded = [];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'class_section')->withTimestamps();
    }

    /**
     * 
     * 
     * In the classes controller we will use this method to sync sections to the newly created or 
     * existing class.
     * 
     * $class->sections()->sync([1, 2, 3]);
     */
}
