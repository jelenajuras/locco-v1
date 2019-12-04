<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fuel;
use App\Models\Car;
use App\Models\Locco;
use Sentinel;
use DateTime;

class FuelController extends Controller
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
		$fuels = Fuel::get();
		$loccos = Locco::get();
		
		return view('admin.fuels.index',['fuels'=>$fuels, 'loccos'=>$loccos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::get();
		
		return view('admin.fuels.create',['cars' => $cars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request;
		
		$data = array(
			'car_id'  => $input['car_id'],
			'user_id'  => Sentinel::getUser()->id,
			'liters'  => str_replace(",",".", $input['liters']),
			'km'  => $input['km'],
			'date'  => $input['date'],
		);
		
		$fuel = new Fuel();
		$fuel->saveFuel($data);
		
		$message = session()->flash('success', 'Uspješno je dodano novo točenje goriva');

		return redirect()->route('admin.fuels.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuel = Fuel::find($id);
		
		return view('admin.fuels.edit', ['fuel' => $fuel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fuel = Fuel::find($id);
		$input = $request;

		$data = array(
			'car_id'  => $input['car_id'],
			'user_id'  => Sentinel::getUser()->id,
			'liters'  => str_replace(",",".", $input['liters']),
			'km'  => $input['km'],
			'date'  => $input['date'],
		);
		
		$fuel->updateFuel($data);
		
		$message = session()->flash('success', 'Podaci su uspješno ispravljeni ');
		
		return redirect()->route('admin.fuels.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fuel = Fuel::find($id);
		$fuel->delete();
		
		$message = session()->flash('success', 'Podaci su obrisani');
		
		return redirect()->route('admin.fuels.index')->withFlashMessage($message);
    }
}
