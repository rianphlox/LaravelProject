<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    public $timestamps = false;
    const UPDATED_AT = false;

    public function courses() {
        return $this->hasMany('App\Models\Courses');
    }
}
