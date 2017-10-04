<?php

namespace App\Mail;
use App\ModMedico;
use App\ModAsistenteCirugia;
use App\ModCitaQuirofano;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailMedicoResident extends Mailable
{
    use Queueable, SerializesModels;
    protected $resident;
    protected $medico;
    protected $cita;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModAsistenteCirugia $resident, ModMedico $medico, ModCitaQuirofano $cita)
    {
        $this->resident = $resident;
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
        return $this->view('mail.mailMedicoResident')->with([
            'resident' => $this->resident,
            'medico' => $this->medico,
            'cita' => $this->cita
        ]);
    }
}
