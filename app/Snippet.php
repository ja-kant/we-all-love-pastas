<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Snippet extends Model
{
    /**
     * Function sets new uid of current snippet instance in case it doesn't have one
     * @return type
     */
    public function generateUid(){
        if (!empty($this->uid)){
            return false;
        }else {            
            $collided = true;
            $newUid = "";
            while ( $collided ){
                $newUid = generateRandomString();
                $collided = Snippet::where('uid', $newUid)->count();
            }
            $this->uid = $newUid;
            return true;
        }
    }
}
