@extends('layouts.base')
@section('content')        

<form method="post" action="{{ action('SnippetController@store') }}">
                @csrf
                <div class="form-group form-inline">
                    <input disabled value="{{ $snippet->title ?? "Без названия" }}" type="text" name="title" id="title" class="form-control" placeholder="Название &laquo;пасты&raquo;" />                    
                    <div class="dropdown">
                        <div class="btn-group">
                            <button class="btn dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                
                                @if ($snippet->expired_at)
                                    Срок годности истекает: <b>{{ $snippet->expired_at }}</b>
                                @else                                                                    
                                    Срок годности: <b>∞</b>
                                @endisset                                                         
                                
                                
                            </button>
                        </div>
                        <div class="btn-group">
                            <button class="btn dropdown-toggle disabled" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Доступ: <b>{{ $snippet->accessMode->title }}</b>
                            </button>
                        </div>
                        <div class="btn-group">
                            <button class="btn dropdown-toggle disabled" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Подсветка синтаксиса: <b>{{ $snippet->syntaxHighlighter->name }}</b>
                            </button>
                        </div>
                    </div>
                </div>

                <textarea readonly required name="content" class="form-control" id="pastaArea" rows="3">{{ $snippet->content }}</textarea>
            </form>                    
@endsection

@section('js')
<script>
    $(function () {
        
        editor = ace.edit("pastaArea");
        editor.session.setMode( "{{ $snippet->syntaxHighlighter->mode }}" );          
        
//        $(".dropdown-item").click(function (e) {
//            var btn = $(this).data('button');
//            $(btn).text($(this).html());            
//            var input = $(this).data('input');           
//            $(input).val($(this).data('value'));            
//            e.preventDefault();
//        });
        
        
//        $("#syntax-dropdown-menu .dropdown-item").click(function(e){
////            editor.setTheme("ace/theme/twilight");
//           
//        });
//        editor.session.on('change', function(delta) {
//            $("#pastaHidden").val( editor.getValue() );
//        });
    });
    
    

</script>
@endsection
