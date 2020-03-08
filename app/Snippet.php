<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Snippet extends Model {

    protected $attributes = [];

    public function __construct(array $attributes = array()) {
        $this->attributes['uid'] = $this->getNewUid();
        parent::__construct($attributes);
    }

    public function getTitleAttribute($value){
        return !empty( $value ) ? $value : "Без имени";
    }
    
    public function getCreatedAtAttribute($value){
        return formatDatetime($value);
    }
    
    public function getExpiredAtAttribute($value){
        if ($value){
            return formatDatetime($value);
        }else {
            return "∞";
        }        
    }

    protected function getNewUid() {
        $collided = true;
        while ($collided) {
            $newUid = generateRandomString();
            $collided = Snippet::where('uid', $newUid)->count();
        }
        return $newUid;
    }

    public function accessMode() {
        return $this->hasOne('App\SnippetsAccessMode', 'id', 'access_mode_id');
    }
    
    public function syntaxHighlighter(){
        return $this->hasOne('App\SyntaxHighlighter', 'id', 'syntax_highlighter_id');
    }
    
    public function author() {
        return $this->hasOne('App\User', 'id', 'author_id');
    }

}
