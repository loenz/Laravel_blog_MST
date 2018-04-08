<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use Illuminate\Http\Request;
use App\Comment;

class BlogController extends Controller
{
    //
    public function category($slug) {
    	$category = Category::where('slug', $slug)->first();

    	return view('blog.category', [
    		'category' => $category,
    		'articles' => $category->articles()->where('published', 1)->paginate(5)
    	]);
    }

    public function article($slug) {

        $comments = Comment::where('article_slug', $slug)->get();

    	return view('blog.article', [
    		'article' => Article::where('slug', $slug)->first(),
            'comments' => $comments
    	]);
    }
}
