<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function users()
    {
        return $this->belongsTo('app\Admin\Admin','manager_id','id');
    }
}
