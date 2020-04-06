<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function users()
    {
        return $this->belongsTo('app\Admin\Admin');
    }
}
