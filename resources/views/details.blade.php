@extends('layouts.header')
@section('title', 'Quadro Kanban')
@section('content')
@if (session('msg'))
    <p class="msg">{{ session('msg') }}</p>
@endif
<form action="/update/{{ $card->id }}" method="POST">
    @csrf
    @method('PUT')
<div id="main">
    <div id="firts_content">
        <input type="text" id="title_details" name="title" value="{{ $card->title }}">
        <hr>
        <p id="text-span"> Descrição</p>
        <textarea id="textarea" name="description">
            {{ $card->description }}
        </textarea>
    </div>
    <div id="second_content">
        <div id="menu_lateral">
            <div id="status">
                <select name="status_id" id="status_id" class="btn3">
                    <option value="1" class="btn_status" {{ $card->status_id == 1 ? "selected='selected'" : "" }}>Backlog</option>
                    <option value="2" class="btn_status"  {{ $card->status_id == 2 ? "selected='selected'" : "" }}>Em analise</option>
                    <option value="3" class="btn_status"  {{ $card->status_id == 3 ? "selected='selected'" : "" }}>Em desenvolvimento</option>
                    <option value="4" class="btn_status"  {{ $card->status_id == 4 ? "selected='selected'" : "" }}>Em teste</option>
                    <option value="5" class="btn_status"  {{ $card->status_id == 5 ? "selected='selected'" : "" }}>Finalizado</option>
                </select>
            </div>    
                <fieldset>
                    <legend>Informações</legend>

                    <div id="option_menu">
                    <span>Responsável: </span>
                    <select id="author" name="author">
                        <option value="Guilherme">Guilherme</option>
                        <option value="Wesley" {{ $card->author == 'Wesley' ? "selected='selected'" : "" }}>Wesley</option>
                    </select>
                </div>

                <div id="option_menu">
                <span>Tipo: </span>
                <select id="type" name="type">
                    <option value="dev" {{ $card->type == 'dev' ? "selected='selected'" : "" }}>Desenvolvimento</option>
                    <option value="correcao" {{ $card->type == 'correcao' ? "selected='selected'" : "" }}>Correção</option>
                    <option value="test" {{ $card->type == 'test' ? "selected='selected'" : "" }}>Teste</option>
                </select>
                </div>

                <div id="option_menu">
                <span>Tamanho: </span>
                <select id="size_task">
                    <option value="p">Pequena</option>
                    <option value="m">Media</option>
                    <option value="g">Grande</option>
                </select>
                </div>

                <div id="option_menu">
                <span>Solicitante: </span>
                <select id="requester">
                    <option value="guilherme">Guilherme</option>
                    <option value="wesley">Wesley</option>
                </select>
                </div>

                <div id="option_menu">
                <span>Prioridade: </span>
                <select id="type">
                    <option value="dev">Alta</option>
                    <option value="correcao">Media</option>
                    <option value="teste">Alta</option>
                </select>
                </div>
                </fieldset>

                <div id="buttons">
                <input type="submit" value="Atualizar" class="btn" id="atualizar">
            </form>
            <form action="/delete/{{ $card->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Deletar" class="btn2" id="deletar">
            </form>
                </div>
        </div>
    </div>
</div>

@endsection


