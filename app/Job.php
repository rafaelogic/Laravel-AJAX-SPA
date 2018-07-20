<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\City;
use App\Company;
use App\Source;
use App\Type;

class Job extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function getRouteKeyname()
    {
        return 'slug';
    }
}
