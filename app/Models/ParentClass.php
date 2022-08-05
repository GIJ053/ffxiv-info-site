<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentClass extends Model
{
    use HasFactory;

    public function Actions()
    {
        return $this->hasMany(Action::class);
    }

    public function Jobs()
    {
        return $this->hasMany(Job::class);
    }
}
