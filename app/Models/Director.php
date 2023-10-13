<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    public function getDirector(){
        return $this->hasOne("App\Models\Director","id","director");
    }
}
