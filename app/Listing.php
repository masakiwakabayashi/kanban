<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
        // ユーザ関連処理
        public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function cards()
        {
            return $this->hasMany('App\Card');
        }
}
