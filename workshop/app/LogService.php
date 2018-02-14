<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogService extends Model
{
    public function log()
    {
        return $this->belongsTo('App\Log', 'log_id');
    }
}
