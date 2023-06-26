<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canban</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/script.js"></script>
</head>
<body>

<div class="menu">
    <div id="title_menu" class="space_menu">
        <span id="title"> Quadro Kanban </span>
    </div>
    <div class="opcoes space_buttons_menu">
        <button id="create_modal" class="btn" onclick="open_modal()">Adicionar</button>      
    </div>
</div>
<div id="second_menu">
    <div id="compact_menu">
        <div id="title1">
            <span>Backlog</span>
        </div>
        <div id="title2">
            <span>Em análise</span>
        </div>
        <div id="title3">
            <span>Em desenvolvimento</span>
        </div>
        <div id="title4">
            <span>Em teste</span>
        </div>
        <div id="title5">
            <span>Finalizado</span>
        </div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div id="column1">
        @foreach($cards as $card)
            @if ($card->status_id == 1)
            <div class="card">
                <div class="cor_lateral"></div>
                <div class="card-body">
                    <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                    <p class="card-text">{{ $card->description }}</p>
                    <p><img src="img/dev_logo2.png" class="logo_card"></p>
                </div>
            </div>
            @endif
        @endforeach
        </div>
        <div id="column2">
        @foreach($cards as $card)
            @if ($card->status_id == 2)
            <div class="card">
                <div class="cor_lateral"></div>
                <div class="card-body">
                    <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                    <p class="card-text">{{ $card->description }}</p>
                    <p><img src="img/dev_logo2.png" class="logo_card"></p>
                </div>
            </div>
            @endif
        @endforeach
        </div>
        <div id="column3">
        @foreach($cards as $card)
            @if ($card->status_id == 3)
            <div class="card">
                <div class="cor_lateral"></div>
                <div class="card-body">
                    <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                    <p class="card-text">{{ $card->description }}</p>
                    <p><img src="img/dev_logo2.png" class="logo_card"></p>
                </div>
            </div>
            @endif
        @endforeach
        </div>
        <div id="column4">
        @foreach($cards as $card)
            @if ($card->status_id == 4)
            <div class="card">
                <div class="cor_lateral"></div>
                <div class="card-body">
                    <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                    <p class="card-text">{{ $card->description }}</p>
                    <p><img src="img/dev_logo2.png" class="logo_card"></p>
                </div>
            </div>
            @endif
        @endforeach
        </div>
        <div id="column5">
        @foreach($cards as $card)
            @if ($card->status_id == 5)
            <div class="card">
                <div class="cor_lateral"></div>
                <div class="card-body">
                    <a href="/details/{{ $card->id }}"><h4 class="card-title">{{ $card->title }}</h4></a>
                    <p class="card-text">{{ $card->description }}</p>
                    <p><img src="img/dev_logo2.png" class="logo_card"></p>
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
</body>
</html>