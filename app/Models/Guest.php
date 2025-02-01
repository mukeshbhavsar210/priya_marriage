<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public function surname(){
        return $this->belongsTo(Surname::class, 'surname_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
