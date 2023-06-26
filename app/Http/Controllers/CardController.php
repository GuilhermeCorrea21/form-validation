<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Card;

class CardController extends Controller
{
    public function create(Request $request)
    {
        $card = new Card();
        $card->title = $request->title;
        $card->description = $request->description;
        $card->type = $request->type;
        $card->author = $request->author;
        $card->status_id = 1;
        $card->save();
        return redirect('/');
    }

    public function show(){
        $cards = Card::all();
        return view('index', ['cards' => $cards]);
    }

    public function details($id){
        $card = Card::findOrFail($id);
        return view('details', ['card' => $card]);
    }

    public function update(Request $request){
        Card::findOrFail($request->id)->update($request->all());
        return redirect('/');
    }
}
