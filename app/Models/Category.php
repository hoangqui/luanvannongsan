<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use App\MyModel;

class Category extends MyModel
{
    use Translatable;
    protected $blog = 'categories';

    protected $translationModel = "App\Models\CategoryTranslation"; 

    protected $translatedAttributes = ['name', 'description', 'slug', 'meta_title', 'meta_description', 'meta_data'];

    public $translationForeignKey = 'category_id';

    public function filterFreeText ($params) {
    	if (!empty($params)) {
    		$this->setFunctionCond('where', ['name', 'like', '%'.$params.'%']);
    	}
    	return $this;
	}
}