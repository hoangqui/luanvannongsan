<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;

class Tag extends MyModel
{
    protected $table="tags";

    public function filterFreeText ($params) {
    	if (!empty($params)) {
    		$this->setFunctionCond('where', ['name', 'like', '%'.$params.'%']);
    	}
    	return $this;
	}
}
