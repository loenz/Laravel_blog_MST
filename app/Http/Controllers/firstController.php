<?php

/**
* 
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class firstController extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function show ($id = null) {
		if (is_null($id)) echo __METHOD__;
		else echo $id;
	}
}