<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function Actions()
    {
        return $this->hasMany(Action::class);
    }

    public function ParentClass()
    {
        return $this->belongsTo(ParentClass::class);
    }

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
}
