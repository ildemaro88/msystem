<?php

namespace App\Mail;
use App\ModMedico;
use App\ModAsistenteCirugia;
use App\ModCitaQuirofano;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailMedicoAnesthesiologist extends Mailable
{
    use Queueable, SerializesModels;
    protected $anesthesiologist;
    protected $medico;
    protected $cita;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModAsistenteCirugia $anesthesiologist, ModMedico $medico,  ModCitaQuirofano $cita)
    {
        $this->anesthesiologist = $anesthesiologist;
        $this->medico = $medico;
        $this->cita = $cita;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mailMedicoAnesthesiologist')->with([
            'anesthesiologist' => $this->anesthesiologist,
            'medico' => $this->medico,
            'cita' => $this->cita
        ]);
    }
}
