<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
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
        $odjeli = Department::orderBy('name','ASC')->paginate(20);
		return view('admin.departments.index',['odjeli'=>$odjeli]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $input = $request;

		$data = array(
			'name'  => $input['name']
		);
		
		$grad = new Department();
		$grad->saveDepartment($data);
		
		$message = session()->flash('success', 'Uspješno je dodan novi odjel');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.departments.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $odjel = Department::find($id);
		
		return view('admin.departments.show', ['odjel' => $odjel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $odjel = Department::find($id);
		return view('admin.departments.edit', ['odjel' => $odjel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $odjel = Department::find($id);
		$input = $request;
		
		$data = array(
			'name'  => $input['name']
		);
		
		$odjel->updateDepartment($data);
		
		$message = session()->flash('success', 'Uspješno su ispravljeni podaci odjela');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.departments.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $odjel = Department::find($id);
		$odjel->delete();
		
		$message = session()->flash('success', 'Odjel je uspješno obrisan');
		
		return redirect()->route('admin.departments.index')->withFlashMessage($message);
    }
}
