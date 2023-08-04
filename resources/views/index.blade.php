<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canban</title>
    <link rel="stylesheet" href="/css/index.css">
    <script src="/js/script.js"></script>
</head>
<body>
@if (session('msg'))
    <p class="msg">{{ session('msg') }}</p>
@endif
<div class="menu">
    <div id="title_menu" class="space_menu">
        <a href="/workspace"><span id="title"> Quadro Kanban </span></a>
    </div>
    <div class="opcoes space_buttons_menu">
        <button id="create_modal" class="btn" onclick="open_modal()">Criar</button>     
        <button id="create_workspace" class="btn" onclick="open_modal2()">Novo Workspace</button> 
    </div>
</div>
<div id="second_menu">
    <div id="compact_menu">
        <div id="title1">
            <span>Backlog ({{ $qtd_card1 }})</span>
        </div>
        <div id="title2">
            <span>Em análise ({{ $qtd_card2 }})</span>
        </div>
        <div id="title3">
            <span>Em desenvolvimento ({{ $qtd_card3 }})</span>
        </div>
        <div id="title4">
            <span>Em teste ({{ $qtd_card4 }})</span>
        </div>
        <div id="title5">
            <span>Finalizado ({{ $qtd_card5 }})</span>
        </div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div id="column1">
        @foreach($cards as $card)
                @if ($card->status_id == 1 AND $card->workspace_id == $id_workspace)
                <div class="card">
                    <div id="cor_lateral1"></div>
                    <div class="card-body">
                        <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                        <p class="card-text">{{ $card->description }}</p>
                        <p><img src='/img/{{$card->type}}.png' class="logo_card"></p>
                    </div>
                </div>
                @endif
        @endforeach
        </div>

        <div id="column2">
        @foreach($cards as $card)
                @if ($card->status_id == 2 AND $card->workspace_id == $id_workspace)
                <div class="card">
                    <div id="cor_lateral2"></div>
                    <div class="card-body">
                        <div><a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a></div>
                        <div><p class="card-text">{{ $card->description }}</p></div>
                        <div><p><img src='/img/{{$card->type}}.png' class="logo_card"></p></div>
                    </div>
                </div>
                @endif
        @endforeach
        </div>

        <div id="column3">
        @foreach($cards as $card)
                @if ($card->status_id == 3 AND $card->workspace_id == $id_workspace)
                <div class="card">
                    <div id="cor_lateral3"></div>
                    <div class="card-body">
                        <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                        <p class="card-text">{{ $card->description }}</p>
                        <p><img src='/img/{{$card->type}}.png' class="logo_card"></p>
                    </div>
                </div>
                @endif
        @endforeach
        </div>

        <div id="column4">
        @foreach($cards as $card)
                @if ($card->status_id == 4 AND $card->workspace_id == $id_workspace)
                <div class="card">
                    <div id="cor_lateral4"></div>
                    <div class="card-body">
                        <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                        <p class="card-text">{{ $card->description }}</p>
                        <p><img src='/img/{{$card->type}}.png' class="logo_card"></p>
                    </div>
                </div>
                @endif
        @endforeach
        </div>

        <div id="column5">
        @foreach($cards as $card)
                @if ($card->status_id == 5 AND $card->workspace_id == $id_workspace)
                <div class="card">
                    <div id="cor_lateral5"></div>
                    <div class="card-body">
                        <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                        <p class="card-text">{{ $card->description }}</p>
                        <p><img src='/img/{{$card->type}}.png' class="logo_card"></p>
                    </div>
                </div>
                @endif
        @endforeach
        </div>

    </div>
</div>

<!-- Card of create -->
<form action="/create" method="POST">
{{ csrf_field() }}
<dialog id="modal">
    <div id="header_modal">
        <h3 id="title_card">Criar card</h3>
    </div>
    <div id="content_modal">
        <label class="espace_label">Resumo</label>
        <input type="name" id="title_modal" name="title" required>
        <label class="espace_label">Descrição</label>
        <textarea id="description_modal" name="description" required></textarea>
        <div id="all_selects">
            <div class="selects">
                <label class="espace_label">Tipo de card</label>
                <select class="select_modal" class='selectModal' name="type">
                    <option value="dev">Desenvolvimento</option>
                    <option value="correction">Correção</option>
                    <option value="test">Testar</option>
                </select>
            </div>
            <div class="selects">
                <label class="espace_label">Responsável</label>
                <select class="select_modal" class='selectModal' name="author">
                    <option value="guilherme">Guilherme</option>
                    <option value="wesley">Wesley</option>
                </select>
            </div>
            <div class="selects">
            <label class="espace_label">Workspace</label>
            <select class="select_modal" class='selectModal' name="workspace">
                
                @foreach($workspace_acess as $workspace)
                    <option value="{{$workspace->workspace_id}}">{{$workspace->name_workspace}}</option>
                @endforeach
            </select>
            </div>
        </div>
    </div>
    <input type="submit" value="Criar" class="btn" id="create_card">
    <button class="btn" onclick="close_modal()">Cancelar</button>
</dialog>
</form>

<!-- Card of create Workspace -->
<form action="/create/workspace" method="POST">
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
    </div>
    <input type="submit" value="Criar" class="btn_modal" id="create_card">
    <button class="btn_modal" onclick="close_modal()">Cancelar</button>
</dialog>
</form>

</body>
</html>