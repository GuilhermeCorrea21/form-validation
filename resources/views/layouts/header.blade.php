<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/script.js"></script>
</head>
<body>
    <!-- Menu -->
    <div class="menu">
        <div id="title_menu" class="space_menu">
            <span id="title"> Quadro Kanban </span>
        </div>
        <div class="opcoes space_buttons_menu">
            <button id="create_modal" class="btn" onclick="open_modal()">Adicionar</button>      
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
                <label class="espace_label">Tipo de card</label>
                <select id="select_modal" name="type">
                    <option value="dev">Desenvolvimento</option>
                    <option value="correction">Correção</option>
                    <option value="test">Testar</option>
                </select>
                <label class="espace_label">Responsável</label>
                <select id="user_selected" name="author">
                    <option value="guilherme">Guilherme</option>
                    <option value="wesley">Wesley</option>
                </select>
            </div>
            <input type="submit" value="Criar" class="btn" id="create_card">
            <button class="btn" onclick="close_modal()">Cancelar</button>
            
        </dialog>
    </form>
    
    @yield('content')
