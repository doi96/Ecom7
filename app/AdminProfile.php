<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}
