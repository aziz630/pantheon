<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyTransaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
     * Database table Name
     */
    protected $table = 'family_account_transactions';

    //protected $fillable = [];

    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Guardian::class);
    }
}
