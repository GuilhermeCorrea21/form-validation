<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Workspace;
use \App\Models\Card;
use \App\Models\User;
use \App\Models\workspace_acess;
use Illuminate\Support\Facades\Auth;

class WorkspaceController extends Controller
{
    public function create(Request $request){
        $workspace = new Workspace();
        $workspace_acess = new workspace_acess();

        $workspace->title = $request->title;
        $workspace->description = $request->description;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/img_workspaces'), $imageName);

            $workspace->image = $imageName;

        }

        $workspace->save();

        $id = Workspace::where('title', $request->title)->orderBy('created_at', 'desc')->first();


        $workspace_acess->insert(
            ['created_at' => now(), 'updated_at' => now(), 'email' => Auth::user()->email, 'user_id' => Auth::user()->id, 'workspace_id' => $id->id, 'name_workspace' => $request->title]);
        
        return redirect('/workspace');
    }

    public function show(){
        $email = Auth::user()->email;
        $workspaces = Workspace::all();
        $myWorkspaces = workspace_acess::all()->where('email', $email);
        $qtd_workspaces = workspace_acess::all()->where('email', $email)->count();
        $qtd_workspace = [];
        $myCards = Card::all()->where('author', 'Guilherme');
        $workspace_acess = workspace_acess::all()->where('email', $email);

        for($i = 0; $i < $qtd_workspaces; $i++){
            $qtd_cards = Card::all()->where('workspace_id', $myWorkspaces[$i]->workspace_id)->count();
            array_push($qtd_workspace, $qtd_cards);
        }

        return view('workspace', ['workspaces' => $workspaces, 'qtd_cards' => $qtd_cards, 'myCards' => $myCards, 'qtd_workspace' => $qtd_workspace, 'workspace_acess' => $workspace_acess]);
    }

    public function invite(Request $request){
        $email = $request->guest;
        $workspace = $request->workspace;

        $workspace_acess = new workspace_acess();
        $CheckIfPermissionExist = workspace_acess::all()->where('workspace_id', $workspace)->where('email', $email);
        
        if(count($CheckIfPermissionExist) == 0){
            $workspace_acess->insert(
                ['created_at' => now(), 'updated_at' => now(), 'email' => $email, 'user_id' => Auth::user()->id, 'workspace_id' => $workspace]
            );

            return redirect('/workspace')->with('msg', 'Acesso ao workspace liberado para ' . $email);
        }
        else{
            return redirect('/workspace')->with('msg', 'O usuário ja esta no Workspace');
        }

    }

}