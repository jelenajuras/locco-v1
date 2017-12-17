<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use Sentinel;

class CityController extends Controller
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
		$gradovi = City::orderBy('grad','ASC')->paginate(20);
		return view('admin.cities.index',['gradovi'=>$gradovi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $input = $request;

		$data = array(
			'id'  => $input['id'],
			'grad'  => $input['grad']
		);
		
		$grad = new City();
		$grad->saveGrad($data);
		
		$message = session()->flash('success', 'Uspješno je dodan novi grad');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.cities.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grad = City::find($id);
		
		return view('admin.cities.show', ['grad' => $grad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grad = City::find($id);
		return view('admin.cities.edit', ['grad' => $grad]);
	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $grad = City::find($id);
		$input = $request;
		
		$data = array(
			'id'  => $input['id'],
			'grad'  => $input['grad']
		);
		
		$grad->updateGrad($data);
		
		$message = session()->flash('success', 'Uspješno su ispravljeni podaci grada');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.cities.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grad = City::find($id);
		$grad->delete();
		
		$message = session()->flash('success', 'Grad je uspješno obrisan');
		
		return redirect()->route('admin.cities.index')->withFlashMessage($message);
    }
}
