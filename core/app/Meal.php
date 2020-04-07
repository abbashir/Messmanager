<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function users()
    {
        return $this->belongsTo('app\Admin\Admin');
    }
    public function ledger()
    {
        return $this->belongsTo('app\Ledger','ledger_id','id');
    }
}
