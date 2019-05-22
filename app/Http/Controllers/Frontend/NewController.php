<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class NewController extends Controller
{
	public function __construct()
	{
		$this->postModel = new Post();
	}
    public function list() {

    	$posts = $this->postModel->with('user')
    							->orderBy('id', 'desc')
    							->paginate(5);

    	return view('Frontend.Contents.new.list', array(
    								'posts' => $posts
    								));
    }

    public function detailNew ($slug, $id, Request $request) {

        app('CountView')->upView($this->postModel, 'view', $id, 'posts');
        
    	$post = $this->postModel->with('user')->findOrFail($id);

    	return view('Frontend.Contents.new.detail', array(
    								'post' => $post
    								));
    }
}
