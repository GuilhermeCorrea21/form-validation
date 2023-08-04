<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;
    
    public function card(){
        return $this->belongTo('App\Models\Card');
    }

    public function create($request){
        $workspace = new Workspace();
        $workspace->title = $request->title;
        $workspace->description = $request->description;
        $workspace->save();
    }

    public function getIdWorkspace($request){
       $id = $request;
       return $id;
    }

}
