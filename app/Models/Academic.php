<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $table = 'academics';

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class); 
    }
}
