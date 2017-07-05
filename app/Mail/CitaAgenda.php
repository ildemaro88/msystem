<?php

namespace App\Mail;

use App\ModPaciente;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CitaAgenda extends Mailable
{
    use Queueable, SerializesModels;
    protected $paciente;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModPaciente $paciente )
    {
        $this->paciente = $paciente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.content')->with([
            'paciente' => $this->paciente
        ]);
    }
}
