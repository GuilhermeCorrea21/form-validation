@extends('layouts.header')
@section('title', 'Quadro Kanban')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guira</title>
    <link rel="stylesheet" href="../css/workspace.css">
    <script src="../js/script.js"></script>
</head>
<body>
@if (session('msg'))
    <p class="msg">{{ session('msg') }}</p>
@endif
    <div class="main">
        <div id="second_menu">
            <h2>Meus projetos</h2>
            <div id="items_menu">
                <div id="share">
                <!--<button type="submit" name="btn_delete" value="deletar" id="delete_workspace" class="btn3">Deletar</button>-->
                    <details>
                        <summary>
                            <img src="img/compartilhar.png" class="icon">
                        </summary>
                        <form method="POST" action="/invite" id="invite_wk">
                            @csrf
                            <p>Convidar para Workspace</p>
                            <input type="email" placeholder="Email do convidado" name="guest" id="guest">
                            <br>
                            <select id="guest" name="workspace">
                            @foreach($workspaces as $workspace)
                                @foreach($workspace_acess as $wk_acess)
                                    @if($workspace->id == $wk_acess->workspace_id)
                                        <option value="{{ $workspace->id }}">{{ $workspace->title }}</option>
                                    @endif
                                @endforeach
                            @endforeach
                            </select>
                            <br>
                            <button type="submit" name="btn_invite" value="enviar" id="invite_guest" class="btn">Convidar</button>
                        </form>
                    </details>
                </div>
            </div>
        </div>
        <div class="projects">
        @php $i = 0; @endphp
        @foreach($workspaces as $workspace)
            @foreach($workspace_acess as $wk_acess)
                @if($workspace->id == $wk_acess->workspace_id)
                @php $i++; @endphp
                <div class="cards">
                    <div class="card_box">
                        <div class="init_card">
                            <img src="img/img_workspaces/{{ $workspace->image }}" class="img">
                            <a href="/kanban/{{$workspace->id}}"><p class="title_workspace">{{ $workspace->title }}</p></a>
                        </div>
                        <div class="middle_card">
                            <div class="text_card">FILAS RECENTES</div>
                            <div class="text_card2">Tudo aberto: ({{ $qtd_workspace[$i-1] }})</div>
                        </div>
                        <hr>
                        <div id="participants">
                            <p id="participant">Participantes: (2)</p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endforeach
        </div>
        <div id="more_info">
            <p>Atribuidos a você:</p>
            <hr>
            <div class="card_list">
            @foreach($myCards as $myCard)
                <div class="card_row">
                    <img src="img/logo_workspace2.png" class="img2">
                    <div class="content">
                            <a href="/details/{{ $myCard->id }}"><p>{{ $myCard->title }}</p></a>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    <!-- Card of create Workspace -->
    <form action="/create/workspace" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <dialog id="modal_workspace">
        <div id="header_modal">
            <h3 id="title_card">Criar Workspace</h3>
        </div>
        <div id="content_modal">
            <label class="espace_label">Nome</label>
            <input type="name" id="title_modal" name="title" required>
            <label class="espace_label">Descrição</label>
            <textarea id="description_modal" name="description" required></textarea>
            <input type="file" name="image">
        </div>
        <input type="submit" value="Criar" class="btn_modal" id="create_card">
        <button class="btn_modal" onclick="close_modal()">Cancelar</button>
    </dialog>
    </form>
</body>
</html>
@endsection