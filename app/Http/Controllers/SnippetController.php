<?php

namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SnippetController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $lifetimes = \App\SnippetsLifetime::all();
        if (Auth::check()){
            $access_modes = \App\SnippetsAccessMode::all();
        }else {
            $access_modes = \App\SnippetsAccessMode::where('auth_only' , 0)->get();
        }
        
        $syntax_highlighters = \App\SyntaxHighlighter::all();
        return view('snippets.create', compact('lifetimes', 'access_modes', 'syntax_highlighters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {           
        $validatedData = $request->validate([
            'title' => 'max:191',
            'content' => 'required|max:16777215',
            'access_mode_id' => 'exists:snippets_access_modes,id',
            'syntax_highlighter_id' => 'exists:syntax_highlighters,id'
        ],[
            'title.max' => 'Слишком длинный заголовок',
            'content.max' => 'Слишком длинная паста',
            'content.required' => 'Необходимо ввести содержимое пасты',
            'access_mode_id.exists' => 'Необходимо указать режим доступа!'
        ]);
        $snippet = new Snippet();
        $snippet->title = $request->title;
        $snippet->content = $request->content;
        if (Auth::check()){
            $snippet->author_id = Auth::id();
        }  
        if (is_int($request->seconds) && $request->seconds > 0 ){
            $snippet->expired_at = date("Y-m-d H:i:s", time() + $request->seconds);
        }
        $snippet->access_mode_id = $request->access_mode_id;
        $snippet->syntax_highlighter_id = $request->syntax_highlighter_id;
        $snippet->save();
        
        $url = action('SnippetController@show', [$snippet->uid]);               
        return redirect($url)->with('message', "Паста готова! <div><a href='$url'>$url</a></div>" );
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uid
     * @return \Illuminate\Http\Response
     */
    public function show($uid) {
        $snippet = Snippet::where('uid', $uid)
                ->where(function($q){
                    $q->whereNull('expired_at')->orWhere('expired_at', '>=', date('Y-m-d H:i:s'));
                })
                ->first();    
        
        if ($snippet->accessMode->id == 3){
            if (!Auth::check() || Auth::id() !== $snippet->author->id){
                abort(401);
            }
        }
                
        if (!$snippet){
            abort(404);
        }else {
            return view('snippets.view', compact('snippet'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function edit(Snippet $snippet) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snippet $snippet) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet) {
        //
    }

    public function userSnippets(){
        if (Auth::check()){
            $snippets = Snippet::where('author_id', Auth::id())->paginate(5);
            return view('snippets.list', compact('snippets'));
        }else {
            abort(401);
        }
    }
}
