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
            return "&mdash;";
        }        
    }
    
    /**
     * Function sets new uid of current snippet instance in case it doesn't have one
     * @return type
     */
//    public function generateUid(){
//        if (!empty($this->uid)){
//            return false;
//        }else {            
//            $collided = true;
//            $newUid = "";
//            while ( $collided ){
//                $newUid = generateRandomString();
//                $collided = Snippet::where('uid', $newUid)->count();
//            }
//            $this->uid = $newUid;
//            return true;
//        }
//    }

    protected function getNewUid() {
        $collided = true;
        $newUid = "";
        while ($collided) {
            $newUid = generateRandomString();
            $collided = Snippet::where('uid', $newUid)->count();
        }
        return $newUid;
    }

    public function accessMode() {
        return $this->hasOne('App\SnippetsAccessMode', 'id', 'access_mode_id');
    }

}
