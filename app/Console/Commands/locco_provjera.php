<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use Mail;
use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Locco;

class locco_provjera extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:locco';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Locco provjera';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $datum = new DateTime('now');
		$dan = date_format($datum,'d');
		$mjesec = date_format($datum,'m');
		$godina = date_format($datum,'Y');
		
		$cars = Car::get();

		foreach($cars as $car){
			$loccos_danas = Locco::where('vozilo_id', $car->id)->orderBy('zavrsni_kilometri','DESC')->whereYear('datum', '=', $godina)->whereMonth('datum', '=', $mjesec)->whereDay('datum', '=', $dan)->first();
			if($loccos_danas != null){
				$locco_prethodni = Locco::where('vozilo_id',$car->id)->orderBy('zavrsni_kilometri','DESC')->skip(1)->take(1)->value('zavrsni_kilometri');
				if($locco_prethodni != $loccos_danas->pocetni_kilometri){
					$registracija = $loccos_danas->car['registracija'];
					$locco_pocetni = $loccos_danas->pocetni_kilometri;
					Mail::queue('email.locco', ['locco_pocetni' => $locco_pocetni, 'registracija' => $registracija, 'locco_prethodni' => $locco_prethodni], function ($mail) use ($registracija) {
					$mail->to('petrapaola.bockor@duplico.hr')
						->cc('jelena.juras@duplico.hr')
						->from('info@duplico.hr', 'Duplico')
						->subject('Locco ' . ' izvještaj ' . ' - ' . $registracija );
					});
				}
			}
		}
		
	//	$mails = array('jelena.juras@duplico.hr','jelena.juras@duplico.hr','jelena.juras@duplico.hr');
	/*	$mails = array('tomica.lisak@duplico.hr','marko.brscic@duplico.hr','marko.turk@duplico.hr');
		
		foreach($mails as $mail_to){
			Mail::queue('email.locco_reminder', ['mails' => $mails], function ($mail) use ($mail_to) {
				$mail->to($mail_to)
					->cc('petrapaola.bockor@duplico.hr')
					->from('info@duplico.hr', 'Duplico')
					->subject('Locco ' . ' podjetnik ');
			});
		}*/
    }
}
