@extends('layouts.base')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="post" action="{{ action('SnippetController@store') }}">
    @csrf
    <div class="form-group form-inline">
        <input type="text" name="title" id="title" class="form-control" placeholder="Название &laquo;пасты&raquo;" />

        <div class="dropdown">
            <div class="btn-group">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Время жизни
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">10 мин.</a>
                    <a class="dropdown-item" href="#">1 час</a>
                    <a class="dropdown-item" href="#">3 часа</a>
                    <a class="dropdown-item" href="#">1 день</a>
                    <a class="dropdown-item" href="#">1 неделя</a>
                    <a class="dropdown-item" href="#">1 месяц</a>
                    <a class="dropdown-item" href="#">Не ограничено</a>
                </div>
            </div>
            <div class="btn-group">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Доступ
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <a class="dropdown-item" href="#">Публичный</a>
                    <a class="dropdown-item" href="#">Только по ссылке</a>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Сохранить &laquo;пасту&raquo;</button>
        </div>
    </div>

    <textarea required name="content" class="form-control" id="pastaArea" rows="3"></textarea>
</form>


@endsection
