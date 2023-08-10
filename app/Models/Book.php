<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function getWriter(){
        return $this->hasOne("App\Models\Writer","id","writer");
    }
}