<?php

namespace App\Libs\Providers\Frontend;

use App\Models\Slide as SlideModel;
use App\Libs\Configs\StatusConfig;


class Slide {

	public function __construct() {
		$this->slideModel = new SlideModel();
	}

	public function getSlide($limit) {
		$slideModel = new SlideModel();
		$data =  $slideModel->where([['status', "AVAILABLE"]])
							->orderBy('sort_by', 'asc')
							->limit($limit)
							->get();			 	 
		return $data;
	} 
	

}



    
