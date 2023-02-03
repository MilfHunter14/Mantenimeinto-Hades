<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Venta;

class VentaRegistrada extends Mailable
{
    use Queueable, SerializesModels;
    public $venta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Venta $venta)
    {
        $this->venta = $venta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('correos.ventaRegistrada');
    }
}
