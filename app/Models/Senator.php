<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Senator extends Model
{
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
