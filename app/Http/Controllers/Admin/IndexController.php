<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function show() {

    	if (view()->exists('template')) {

    		return view('template', ['title'=>'MST digital blog title']);
    	}
    	

    }
}
