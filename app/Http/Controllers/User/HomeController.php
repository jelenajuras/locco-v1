<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Locco;
use App\Models\Car;
use App\Models\Project;
use App\Models\Users;
use Sentinel;

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
    public function index(Request $request)
    {
		if( Sentinel::inRole('administrator')) {

            $reg = $request->get('reg');
            $cars = Car::get();
            $projects = Project::orderBy('id','ASC')->get();
            $users = Users::orderBy('last_name','ASC')->get();

            return view('user.home',['reg' => $reg, 'cars' => $cars, 'projects' => $projects, 'users' => $users ]);
        
        } else {
            return redirect('https://duplico.myintranet.io');
        }
    }
}
