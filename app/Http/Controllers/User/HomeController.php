<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Locco;

class HomeController extends Controller
{
  /**
   * Set middleware to quard controller.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('sentinel.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$locco = Locco::all();

		
        return view('user.home',['locco'=>$locco]);
    }
	
	
}
