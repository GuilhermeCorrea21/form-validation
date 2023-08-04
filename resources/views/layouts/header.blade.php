<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/index.css">
    <script src="../js/script.js"></script>
</head>
<body>
    <!-- Menu -->
    <div class="menu">
        <div id="title_menu" class="space_menu">
            <a href="/workspace"><span id="title">@yield('title')</span></a>
        </div>
        <div class="opcoes">
            <button id="create_modal" class="btn" onclick="open_modal()">Criar</button>
            <button id="create_workspace" class="btn" onclick="open_modal2()">Novo Workspace</button>
            
                <a href="/delete/session" class="btn2" id="sair">Sair</a>
            
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
                @foreach($workspaces as $workspace)
                <option value="{{$workspace->id}}">{{$workspace->title}}</option>
                @endforeach
            </select>
            </div>
        </div>
    </div>
    <input type="submit" value="Criar" class="btn" id="create_card">
    <button class="btn" onclick="close_modal()">Cancelar</button>
</dialog>
</form>

    @yield('content')