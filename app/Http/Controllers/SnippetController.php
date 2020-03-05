<?php

namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

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
        return view('snippets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {           
        $validatedData = $request->validate([
            'title' => 'required|max:191',
            'content' => 'required|max:16777215',
        ]);
        $snippet = new Snippet();
        $snippet->title = $request->title;
        $snippet->content = $request->content;
        $snippet->generateUid();
//        $snippet->author_id = 
//        $snippet->expired_at = 
        $snippet->access_mode_id = null;
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
        $snippet = Snippet::where('uid', $uid)->first();        
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

}
