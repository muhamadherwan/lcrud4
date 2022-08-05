<?php

namespace App\Models;

use App\Models\Religion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // fill all row
    protected $guarded = [];

    protected $dates = ['create_at', 'tarikh_lahir'];

    // one to many relationship whith religions table
    public function religions()
    {
	    return $this->belongsTo(Religion::class, 'id_religions', 'id');
    }
}
