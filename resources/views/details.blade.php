@extends('layouts.header')
@section('title', 'Details')
@section('content')
<form action="/update/{{ $card->id }}" method="POST">
    @csrf
    @method('PUT')
<div id="main">
    <div id="firts_content">
        <input type="text" id="title_details" name="title" value="{{ $card->title }}">
        <hr>
        <p id="text-span">Descrição</p>
        <textarea id="textarea" name="description">
            {{ $card->description }}
        </textarea>
    </div>
    <div id="second_content">
        <div id="menu_lateral">
            <select name="status_id">
            <option value="1">Backlog</option>
            <option value="2">Em analise</option>
            <option value="3">Em desenvolvimento</option>
            <option value="4">Em teste</option>
            <option value="5">Finalizado</option>
            </select>
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

                <input type="submit" value="Atualizar" class="btn">
            </form>
        </div>
    </div>
</div>

@endsection


