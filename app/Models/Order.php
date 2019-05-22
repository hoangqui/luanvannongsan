<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class Order extends MyModel
{
    protected $table = "orders";

    public function filterFreeText ($params) {
    	if (!empty($params)) {
    		$this->setFunctionCond('where', ['buyer', 'like', '%'.$params.'%']);
    		$this->setFunctionCond('orWhere', ['code', 'like', '%'.$params.'%']);
    	}
    	return $this;
	}
}
