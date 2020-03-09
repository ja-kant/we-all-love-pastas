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
        <input type="text" name="title" id="title" class="form-control" placeholder="Название &laquo;пасты&raquo;" value="{{ old('title') }}" />
        <input type="hidden" name="access_mode_id" id="access_mode_id" value="{{ old('access_mode_id') }}"  />
        <input type="hidden" name="seconds" id="seconds" value="{{ old('seconds') }}"/>
        <input type="hidden" name="syntax_highlighter_id" id="syntax_highlighter_id" value="{{ old('syntax_highlighter_id') ?? 1 }}"/>
        <input type="hidden" name="content" id="pastaHidden" value="{{ old('content') }}"/>
        
        <div class="dropdown">

            <div class="btn-group">
                <button class="btn dropdown-toggle" type="button" id="lifetime__dropdown_button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Время жизни
                </button>
                <div class="dropdown-menu" id="lifetime-dropdown-menu" aria-labelledby="lifetime__dropdown_button">
                    @foreach ($lifetimes as $lt)
                    <a class="dropdown-item" data-button="#lifetime__dropdown_button" data-input="#seconds" href="javascript:;" data-value="{{$lt->seconds}}">{{$lt->title}}</a>
                    @endforeach
                </div>
            </div>

            <div class="btn-group">
                <button class="btn dropdown-toggle" type="button" id="access_mode_id__dropdown_button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Доступ
                </button>
                <div id="access_mode-dropdown-menu" class="dropdown-menu" aria-labelledby="access_mode_id__dropdown_button">
                    @foreach ($access_modes as $am)
                    <a class="dropdown-item" href="javascript:;" data-button="#access_mode_id__dropdown_button" data-input="#access_mode_id" data-value="{{$am->id}}">{{$am->title}}</a>
                    @endforeach
                </div>
            </div>
            
            <div class="btn-group">
                <button class="btn dropdown-toggle" type="button" id="syntax__dropdown_button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Подсветка синтаксиса
                </button>
                <div id="syntax-dropdown-menu" class="dropdown-menu" aria-labelledby="syntax__dropdown_button">
                    @foreach ($syntax_highlighters as $sh)
                        <a class="dropdown-item"  data-button="#syntax__dropdown_button" data-input="#syntax_highlighter_id" data-value="{{$sh->id}}" href="javascript:;" data-mode="{{ $sh->mode }}" >{{ $sh->name }}</a>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Сохранить &laquo;пасту&raquo;</button>
        </div>
    </div>

    <textarea required name="content" class="form-control" id="pastaArea" rows="3" value="{{ old('content') }}"></textarea>
</form>
@endsection

@section('js')
<script>
    $(function () {
        editor = ace.edit("pastaArea");
        
        //set value back after validation error
        var oldContent = $("#pastaHidden").val();
        if (!!oldContent){
            editor.setValue(oldContent);
        }
        
        var seconds = $("#seconds").val();
        var secondsText = $("#lifetime-dropdown-menu").find("a[data-value='"+seconds+"']").text();
        $("#lifetime__dropdown_button").html(secondsText);
        
        var syntax = $("#syntax_highlighter_id").val();
        var syntaxNode = $("#syntax-dropdown-menu").find("a[data-value='"+syntax+"']");
        $("#syntax__dropdown_button").html(syntaxNode.text());
        editor.session.setMode( syntaxNode.data('mode') );   
        
        var accessMode = $("#access_mode_id").val();
        var accessModeText = $("#access_mode-dropdown-menu").find("a[data-value='"+accessMode+"']").text();
        $("#access_mode_id__dropdown_button").html(accessModeText);
        
        
        //handling clicks on dropdown controls
        $(".dropdown-item").click(function (e) {
            var btn = $(this).data('button');
            $(btn).text($(this).html());            
            var input = $(this).data('input');           
            $(input).val($(this).data('value'));            
            e.preventDefault();
        });
        
        //cycling through editor modes
        $("#syntax-dropdown-menu .dropdown-item").click(function(e){
//            editor.setTheme("ace/theme/twilight");
            editor.session.setMode( $(this).data('mode') );            
        });
        //setting value in order to post it to the server
        editor.session.on('change', function(delta) {
            $("#pastaHidden").val( editor.getValue() );
        });
    });
    
    

</script>
@endsection