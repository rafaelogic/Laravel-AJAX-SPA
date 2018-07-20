<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;

class Source extends Model
{
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
