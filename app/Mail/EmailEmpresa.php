<?php

namespace App\Mail;
use App\ModEmpresa;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailEmpresa extends Mailable
{
    use Queueable, SerializesModels;
    protected $empresa;
    protected $update;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModEmpresa $empresa,$update = false)
    {
        $this->empresa = $empresa;
        $this->update = $update;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd( $this->update);
        if( $this->update){
            return $this->view('mail.mailEmpresaUpdate')->with([
            'empresa' => $this->empresa
        ]);
        }else{

            return $this->view('mail.mailEmpresaNew')->with([
            'empresa' => $this->empresa
        ]);
        }
        
    }
}
