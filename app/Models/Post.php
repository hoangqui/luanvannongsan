<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class Post extends MyModel
{
    protected $table = "posts";

    public function user() {
    	return $this->belongsTo('App\User', 'user_create', 'id');
    }

    public function filterFreeText ($params) {
    	if (!empty($params)) {
    		$this->setFunctionCond('where', ['content', 'like', '%'.$params.'%']);
    		$this->setFunctionCond('orWhere', ['title', 'like', '%'.$params.'%']);
    	}
    	return $this;
	}
}
