<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment\CommentModel as MainModel;
use DateTime;
class CommentController extends Controller
{

	private $instants;

 	public	function __construct() {
 		$this->instants = new MainModel;
	}

    function store(Request $request)
    {
    	$data = $request->except('_token');
    	$data['created_at'] = new DateTime();
    	$this->instants->insertData($data);
    }
}
