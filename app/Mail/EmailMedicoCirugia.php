<?php

namespace App\Mail;
use App\ModMedico;
use App\ModPaciente;
use App\ModCitaQuirofano;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailMedicoCirugia extends Mailable
{
    use Queueable, SerializesModels;
    protected $paciente;
    protected $medico;
    protected $cita;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModMedico $medico,ModPaciente $paciente, ModCitaQuirofano $cita)
    {
        $this->paciente = $paciente;
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
        return $this->view('mail.mailMedico')->with([
            'paciente' => $this->paciente,
            'medico' => $this->medico,
            'cita' => $this->cita
        ]);
    }
}
