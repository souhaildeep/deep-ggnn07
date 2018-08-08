<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reservation; 

class Resermail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $facture;
    public $fa ;
    public $ex ;
    public function __construct(Reservation $rservation)
    {
        $this->facture = $rservation;
       // $this->fa = $fa;
        //$this->ex = $ex;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  //dd($this->facture);
        return $this->from('souhaildeep@gmail.com')
            ->view('emails.facturemail');
    }
    
}
