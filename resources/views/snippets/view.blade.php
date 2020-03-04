@extends('layouts.base')

@section('content')

         

<form method="post" action="{{ action('SnippetController@store') }}">
                @csrf
                <div class="form-group form-inline">
                    <input value="{{ $snippet->title }}" type="text" name="title" id="title" class="form-control" placeholder="Название &laquo;пасты&raquo;" />

                    <div class="dropdown">
                        <div class="btn-group">
                            <button class="btn dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <button class="btn dropdown-toggle disabled" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Доступ
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">Публичный</a>
                                <a class="dropdown-item" href="#">Только по ссылке</a>
                            </div>
                        </div>
                    </div>
                </div>

                <textarea readonly required name="content" class="form-control" id="pastaArea" rows="3">{{ $snippet->content }}</textarea>
            </form>
                    
                    
@endsection
