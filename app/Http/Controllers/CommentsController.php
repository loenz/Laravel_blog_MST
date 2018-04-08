<?php

/**
* 
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function index () {

	}


	public function create (Request $request) {

		//dd($request->all());

		$comment = $request->input('comment');
		$article_slug = $request->input('article_slug');
		
		$user_id = auth()->user()->id;

		$objComment = new Comment();
		$objComment = $objComment->create([
	    	'article_slug' => $article_slug,
	    	'user_id' => $user_id,
	    	'comment' => $comment,
		]);

		return back();
	}
}