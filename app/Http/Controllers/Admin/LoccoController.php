<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Locco;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoccoRequest;
use Sentinel;

class LoccoController extends Controller
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
        $locco_vožnje = Locco::orderBy('datum','DESC')->paginate(20);
		return view('admin.loccos.index',['locco_vožnje'=>$locco_vožnje]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.loccos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoccoRequest $request)
    {
        $input = $request;

		$data = array(
			'datum'  => $input['datum'],
			'vozilo_id'  => $input['vozilo_id'],
			'user_id'  => Sentinel::getUser()->id,
			'relacija'  => ucfirst(strtolower($input['relacija'])),
			'projekt_id'  => $input['projekt_id'],
			'razlog_puta'  => $input['razlog'],
			'početni_kilometri'  => trim($input['početni_kilometri']),
			'završni_kilometri'  => trim($input['završni_kilometri']),
			'prijeđeni_kilometri'  => $input['završni_kilometri']-$input['početni_kilometri'],
			'Komentar'  => $input['Komentar']
		);
		
		$locco = new Locco();
		$locco->saveLocco($data);
		
		$message = session()->flash('success', 'Uspješno je dodana nova locco vožnja');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.loccos.index')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locco = Locco::find($id);
		
		return view('admin.loccos.show', ['locco' => $locco]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locco = Locco::find($id);
		
		return view('admin.loccos.edit', ['locco' => $locco]);
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
        $locco = Locco::find($id);
		$input = $request;
		
		$data = array(
			'datum'  => $input['datum'],
			'vozilo_id'  => $input['vozilo_id'],
			'user_id'  => Sentinel::getUser()->id,
			'relacija'  => ucfirst(strtolower($input['relacija'])),
			'projekt_id'  => $input['projekt_id'],
			'razlog_puta'  => $input['razlog'],
			'početni_kilometri'  => trim($input['početni_kilometri']," "),
			'završni_kilometri'  => trim($input['završni_kilometri']," "),
			'prijeđeni_kilometri'  => $input['završni_kilometri']-$input['početni_kilometri'],
			'Komentar'  => $input['Komentar']
		);
		
		$locco->updateLocco($data);
		
		$message = session()->flash('success', 'Uspješno su ispravljeni podaci locco vožnje');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.loccos.index')->withFlashMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locco = Locco::find($id);
		$locco->delete();
		
		$message = session()->flash('success', 'Locco vožnja je uspješno obrisana');
		
		return redirect()->route('admin.loccos.index')->withFlashMessage($message);
    }
}
