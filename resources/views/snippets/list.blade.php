@extends('layouts.base')
@section('content')
<div class="container">
    <div class="list-group">
        @forelse ($snippets as $snippet)
         <a href="{{ url("/" . $snippet->uid) }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{!! $snippet->title !!}</h5>             
            </div>
             
             <small>Создана: <b>{{$snippet->created_at}}</b></small>
             <small>Истекает: <b>{{$snippet->expired_at}}</b></small>
             <small>Доступ: <b>{{$snippet->accessMode->title}}</b></small>
             <small>Автор: <b>{{$snippet->author ? $snippet->author->name : "-"}}</b></small>
             
            <p class="mb-1">{!!$snippet->content!!}</p>
          </a>
        @empty
            Нет ни одной пасты :(
        @endforelse       
    </div>
    <br>
    {!! $snippets->render() !!}
</div>                    
@endsection
