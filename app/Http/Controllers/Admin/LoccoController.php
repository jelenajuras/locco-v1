<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Locco;
use App\Models\Car;
use App\Models\Users;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoccoRequest;
use Sentinel;
use Mail;

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
        
		$cars = Car::get();
		
		return view('admin.loccos.index',['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
	   $reg = $request->get('reg');
       return view('admin.loccos.create')->with('reg',$reg);
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
		
		if($input['servis']){
			if(!$input['Komentar'] ){
				$message = session()->flash('error', 'Za prijavu kvara obavezan je unos napomene');
				return redirect()->back()->withFlashMessage($message);
			} else {
				$car = Car::where('id',$input['vozilo_id'])->first();
				$user = Users::where('id',$input['user_id'])->first();
				$napomena =  $input['Komentar'];
				$mails = array('petrapaola.bockor@duplico.hr', 'mladen.bockor@duplico.hr');
				
				foreach($mails as $mail) {
					Mail::queue(
						'email.servis',
						['car' => $car, 'user' => $user, 'napomena' => $napomena],
						function ($message) use ($mail, $car) {
							$message->to($mail)
								->subject('Servis vozila - ' . $car->registracija);
						}
					);
				}
			}
		}		

		$data = array(
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'vozilo_id'  => $input['vozilo_id'],
			'user_id'  => $input['user_id'],
			'relacija'  => $input['relacija'],
			'projekt_id'  => $input['projekt_id'],
			'razlog_puta'  => $input['razlog'],
			'početni_kilometri'  => trim($input['početni_kilometri']),
			'završni_kilometri'  => $input['završni_kilometri'],
			'prijeđeni_kilometri'  => $input['završni_kilometri']-trim($input['početni_kilometri']),
			'Komentar'  => $input['Komentar']
		);
		$locco = new Locco();
		$locco->saveLocco($data);
		
		$km = array(
			'trenutni_kilometri'  => $input['završni_kilometri']
		);
		
		$vozilo = Car::where('id', $input['vozilo_id']);
		$vozilo->update($km);
		
		$message = session()->flash('success', 'Uspješno je dodana nova locco vožnja');
		
		//return redirect()->back()->withFlashMessage($messange);
		return redirect()->route('admin.dashboard')->withFlashMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loccos = Locco::where('vozilo_id',$id)->orderBy('created_at','DESC')->get();
		
		return view('admin.loccos.show', ['loccos' => $loccos]);
    }
	
	
	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $loccos = Locco::orderBy('created_at','DESC')->get();
		
		return view('admin.showAll', ['loccos' => $loccos]);
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
    public function update(LoccoRequest $request, $id)
    {
        $locco = Locco::find($id);
		$input = $request;
		
		$data = array(
			'datum'  => date("Y-m-d", strtotime($input['datum'])),
			'vozilo_id'  => $input['vozilo_id'],
			'user_id'  => $input['user_id'],
			'relacija'  =>  $input['relacija'],
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
		return redirect()->route('admin.dashboard')->withFlashMessage($message);
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
