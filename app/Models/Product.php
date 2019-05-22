<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class Product extends MyModel
{
 	protected $table = "products"; 

 	public function user() {
 		return $this->hasOne('App\User', 'id', 'user_update');
 	}

 	public function category() {
 		return $this->hasOne('App\Models\Category', 'id', 'category_id');
 	}

 	public function filterFreeText ($params) {
    	if (!empty($params)) {
    		$this->setFunctionCond('where', ['name', 'like', '%'.$params.'%']);
    		$this->setFunctionCond('orWhere', ['code', 'like', '%'.$params.'%']);
    	}
    	return $this;
	}
}
