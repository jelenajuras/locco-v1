<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Locco;
use App\Models\Fuel;
use Illuminate\Support\Facades\Input;
use DB;
use Excel;

class ExcelController extends Controller
{
    public function getImport()
	{
		return view('excel.LoccoImport');
	}
	
	public function postImport()
	{
		/*Excel::load(Input::file('locco'),function($reader){
			$reader->each(function($sheet){
				Locco::firstOrCreate($sheet->toArray());
			});
		});*/
		Excel::load(Input::file('locco'), function($reader) {

			$reader->each(function($sheet){
				Locco::firstOrCreate($sheet->toArray());
			});

		});
		return back();
	}
	
	public function getExport()
	{
		$locco=Locco::all();
		Excel::create('Export Locco',function($excel) use($locco){
			$excel->sheet('Sheet 1',function($sheet) use($locco){
				$sheet->fromArray($locco);
			});
		})->export('xlsx');
	}
	
	public function getImport_fuel()
	{
		return view('excel.FuelImport');
	}
	
	public function postImport_fuel()
	{
		Excel::load(Input::file('fuel'), function($reader) {
			$reader->each(function($sheet){
				Fuel::firstOrCreate($sheet->toArray());
			});

		});
		return back();
	}
	
	public function getExport_fuel()
	{
		$fuel = Fuel::all();
		Excel::create('Export Fuel',function($excel) use($fuel){
			$excel->sheet('Sheet 1',function($sheet) use($fuel){
				$sheet->fromArray($fuel);
			});
		})->export('xlsx');
	}
	
	public function deleteAll()
	{
		DB::table('loccos')->delete();
		return back();
	}
}
