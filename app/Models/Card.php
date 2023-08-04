<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = "card";
    protected $guarded = [];

    public $identificador = 0;

    public function status(){
        return $this->hasMany('App\Models\Status');
    }

    public function workspace(){
        return $this->hasMany('App\Models\Workspace');
    }

    public function create($request){
        $card = new Card();
        $card->title = $request->title;
        $card->description = $request->description;
        $card->type = $request->type;
        $card->author = $request->author;
        $card->status_id = 1;
        $card->workspace_id = $request->workspace;
        $card->save();
    }

    public function setIdWk($id){
        $this->identificador = $id;
        return $this->identificador;
    }

    public function getIdWk(){
        $rota = '/kanban/' . $this->identificador;
        return $rota;
    }

}
