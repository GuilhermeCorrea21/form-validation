<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Card;
use \App\Models\Workspace;
use \App\Models\workspace_acess;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function create(Request $request)
    {
        $card = new Card();
        $card->create($request);
        $rota = '/kanban/' . $request->workspace;
        
        return redirect($rota);
    }

    public function show($id){

        if(Workspace::find($id) == NULL){
            return redirect('/workspace');
        }

        $cards = Card::all();
        $workspaces = Workspace::all();
        $workspace_acess = workspace_acess::all()->where('email', Auth::user()->email);

        $id_workspace = $id;

        $qtd_card1 = Card::where('status_id', 1)->where('workspace_id', '=', $id_workspace)->count();
        $qtd_card2 = Card::where('status_id', 2)->where('workspace_id', '=', $id_workspace)->count();
        $qtd_card3 = Card::where('status_id', 3)->where('workspace_id', '=', $id_workspace)->count();
        $qtd_card4 = Card::where('status_id', 4)->where('workspace_id', '=', $id_workspace)->count();
        $qtd_card5 = Card::where('status_id', 5)->where('workspace_id', '=', $id_workspace)->count();

        return view('index', ['cards' => $cards, 'qtd_card1' => $qtd_card1, 'qtd_card2' => $qtd_card2, 'qtd_card3' => $qtd_card3, 'qtd_card4' => $qtd_card4, 'qtd_card5' => $qtd_card5, 'id_workspace' => $id_workspace, 'workspaces' => $workspaces, 'workspace_acess' => $workspace_acess]);
    }

    public function details($id){
        if(Card::find($id) == NULL){
            return redirect('/workspace');
        }
        $card = Card::findOrFail($id);
        $workspaces = Workspace::all();
        return view('details', ['card' => $card, 'workspaces' => $workspaces]);
    }

    public function update(Request $request){        
        Card::findOrFail($request->id)->update($request->all());
        $workspace = Card::find($request->id);
        $rota = '/kanban/' . $workspace->workspace_id;
        return redirect($rota)->with('msg', 'Card atualizado com sucesso');
    }

    public function destroy($id){
        $card = Card::find($id);
        Card::findOrFail($id)->delete();
        $rota = '/kanban/' . $card->workspace_id;

        return redirect($rota)->with('msg', 'Card deletado com sucesso');
    }

}
