<?php

namespace App\Console\Commands;

use App\Cita;
use App\Notifications\FirebaseNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Notifications\Notification;

class AvisoReserva extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reserva:verificar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verfica las reservas de citas  ';

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

        $citas = Cita::where('FechaFumigacion', now()->toDateString())->get();
        if ($citas !== null) {
            if ($citas->count() > 0) {

                foreach ($citas as $item) {

                    $horaCita = $item->FechaProxima . "" . $item->Hora;
                    $Hora = new \DateTime($horaCita);

                    $Hora->modify("-60 minutes");

                    $Hora->format("Y-m-d H:i");
                    $carbonHora = Carbon::createFromTimestamp($Hora->getTimestamp());


                    if ($carbonHora->between(now()->subMinute(1), now()->addMinute(1))) {
                        $user = User::where("rol_id", 1)->first();

                        $data = array(
                            "id_cita" => $item->id,
                            "body" => "Tienes una cita pendiente a llevar a cabo dentro de 1 hora del usuario con nombre: ' ". $item->Nombre . "''"
                           , "click_action"=>"Detalle_Cita"

                        );

                        $user->notify(new FirebaseNotification($data,
                                "Citas Pendientes", $data));
                    }
                }

            }
        }
    }
}
