<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function phone():HasOne
    {
        return $this->hasOne(Student::class);
    }
}
