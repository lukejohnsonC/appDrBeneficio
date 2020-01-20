<?php
#App\Mail\Upload.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use DB;
use Session;

class Upload extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data=[])
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

      $data = [];
      $data['id_pedido'] = Session::get('admin_id_pedido');
      $data['nome'] = Session::get('admin_name');
      $data['cpf'] = Session::get('admin_cpf');


        return $this->view('emails/upload', $data)
                ->subject('Base de Dados via Área do Gestor')
                ->attach($this->data['document']->getRealPath(),
                [
                    'as' => $this->data['document']->getClientOriginalName(),
                    'mime' => $this->data['document']->getClientMimeType(),
                ]);
    }
}
