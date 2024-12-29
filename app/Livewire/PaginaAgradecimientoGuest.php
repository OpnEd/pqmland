<?php

namespace App\Livewire;

// use App\Models\GuestPedido;
use Livewire\Attributes\Title;
use Illuminate\Http\Request;
use App\Livewire\BaseComponent;

#[Title('PQM - Gracias')]
class PaginaAgradecimientoGuest extends BaseComponent
{
    public $payuResponse = []; // Variable para almacenar los datos de la respuesta
    public $estadoTx;
    public $validacionFirma = true;

    public function mount(Request $request)
    {
        // Captura todos los parámetros enviados en la URL
        $this->payuResponse = $request->all();

        $api_key = env('PAYU_API_KEY');
        $merchant_id = $this->payuResponse['merchantId'];
        $reference_code = $this->payuResponse['referenceCode'];
        $new_value = number_format($this->payuResponse['TX_VALUE'], 1, '.', '');
        $currency = $this->payuResponse['currency'];
        $transaction_state = $this->payuResponse['transactionState'];

        // Generar la firma digital
        $firma_cadena = "$api_key~$merchant_id~$reference_code~$new_value~$currency~$transaction_state";
        $firma_creada = md5($firma_cadena);

        // Firma recibida desde PayU
        $firma = $this->payuResponse['signature'] ?? '';

        // Validar la firma
        if (strtoupper($firma) !== strtoupper($firma_creada)) {
            $this->validacionFirma = false;
            //$this->estadoTx = "Error validando la firma digital.";
            //return;
        }

        // Determinar el estado de la transacción
        $this->estadoTx = match ($transaction_state) {
            '4' => 'Transacción aprobada',
            '6' => 'Transacción rechazada',
            '104' => 'Error de procesamiento',
            '7' => 'Pago pendiente',
            default => $this->payuResponse['menssage'] ?? 'Estado desconocido',
        };
    }


    public function render()
    {
        return view('livewire.payment-response', [
            'estadoTx' => $this->estadoTx,
            'payuResponse' => $this->payuResponse,
        ])->layout($this->getLayout());
    }
}
/*
public $guest_pedido;

public function mount($guest_pedido_id)
{
    $this->guest_pedido = GuestPedido::with('guestDetalles.producto')->findOrFail($guest_pedido_id);
}

public function render()
{
    return view('livewire.pagina-agradecimiento-guest', [
        'guest_pedido' => $this->guest_pedido,
    ])->layout($this->getLayout());
}
 */
