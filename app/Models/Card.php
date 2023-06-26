<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = "card";
    protected $guarded = [];

    public function status(){
        return $this->hasMany('App\Models\Status');
    }
}
