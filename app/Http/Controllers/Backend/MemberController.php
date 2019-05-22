<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\Configs\StatusConfig;

use DB, App;
use App\Models\Customer;

class MemberController extends Controller
{
	public function __construct()
	{
		$this->memberModel = new Customer();
	}

    public function index() {
        return view('Backend.Contents.report.member');

        $this->middleware('permission:member.read', ['only' => ['index']]);
        $this->middleware('permission:member.read', ['only' => ['list']]);
    }

     public function list(Request $request) {

        $orderName = $request->input('orderName', 'id');
        $orderBy   = $request->input('orderBy', 'desc');

        $data = $this->memberModel->orderBy($orderName, $orderBy)
                                    ->paginate(10);
                                    
        return response()->json($data);
    }

}
