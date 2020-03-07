@extends('layouts.base')
@section('content')
<div class="container">
    <div class="list-group">
        @foreach ($snippets as $snippet)
         <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{{ $snippet->title }}</h5>             
            </div>
             
             <small>Создана: <b>{{$snippet->created_at}}</b></small>
             <small>Истекает: <b>{{$snippet->expired_at}}</b></small>
              <small>Доступ: <b>{{$snippet->accessMode->title}}</b></small>
             
            <p class="mb-1">{{$snippet->content}}</p>
          </a>
        @endforeach       
    </div>
    <br>
    {!! $snippets->render() !!}
</div>                    
@endsection
