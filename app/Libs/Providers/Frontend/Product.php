<?php

namespace App\Libs\Providers\Frontend;

use App\Models\Product as ProductModel;
use App\Libs\Configs\StatusConfig;
use App\Models\Tag;


class Product {

	public function __construct() {
		$this->productModel = new ProductModel();
		$this->tagModel     = new Tag();
	}

	public function getProduct($limit) {
		$data =  $this->productModel ->where([['status', "AVAILABLE"],
											['hot', 1],
											])
							->orderBy('id', 'desc')
							->limit($limit)
							->get();			 	 
		return $data;
	} 

	public function relatedProduct($limit) {
		$data =  $this->productModel ->where([
										['status', "AVAILABLE"],

											])
							->inRandomOrder()
							->limit($limit)
							->get();			 	 
		return $data;
	} 

	public function getTag() {
		$data =  $this->tagModel ->where(array(
										array('status', "AVAILABLE"),
									))
							->orderBy('id', 'desc')
							->get();			 	 
		return $data;
	}
}



    
