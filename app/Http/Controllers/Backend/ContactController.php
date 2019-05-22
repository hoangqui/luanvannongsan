<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\Configs\StatusConfig;

use DB, App;
use App\Models\Contact;

class ContactController extends Controller
{
	public function __construct()
	{
		$this->contactModel = new Contact();
        $this->middleware('permission:contact.read', ['only' => ['index']]);
        $this->middleware('permission:contact.read', ['only' => ['list']]);
	}

    public function index() {
        return view('Backend.Contents.report.contact');
    }

     public function list() {
        $data = Contact::paginate(10);
        return response()->json($data);
    }

}
