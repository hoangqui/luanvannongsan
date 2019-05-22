<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use DB;

class SettingController extends Controller
{
	private $settingModel;

	public function __construct(Setting $setting) {
		$this->settingModel = $setting;
        $this->middleware('permission:setting.read', ['only' => ['index']]);
        $this->middleware('permission:setting.read', ['only' => ['getSetting']]);
        $this->middleware('permission:setting.update', ['only' => ['insertSetting']]);
	}

    public function index () {
    	return view('Backend.Contents.setting.index');
    }

    public function getSetting (Request $request) {
    	$data = $this->settingModel::get();
    	foreach ($data as $key => $value) {
    		if (!empty($value)) {
    			$data[$key]->setting = json_decode($value->setting);
    		}
    	}
    	return response()->json($data);
    }

    public function insertSetting(Request $request) {
    	$find = $this->settingModel::where('key', $request->key)
    								->first();
    	DB::beginTransaction();
    	try {
	    	if (empty($find)) {
				$this->settingModel->key     = $request->key;
				$this->settingModel->setting = $request->setting;
				$this->settingModel->save();
				DB::commit();
	    	} else {
	    		$find->key     = $request->key;
	    		$find->setting = $request->setting;
	    		$find->save();
	    		DB::commit();
	    	}
    	} catch (Exception $e) {
    		DB::rollback();
    	}
    }
}
