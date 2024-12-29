<?php

namespace App\Livewire;

use App\Helpers\StatusMapper;
use App\Models\GuestPedido;
use App\Models\GuestDetallePedido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Guest;
use Livewire\Attributes\On;
use App\Mail\OrderConfirmed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Transaccion;
use App\Livewire\BaseComponent;

class Payment extends BaseComponent
{
    public $merchantId;
    public $accountId;
    public $description;
    public $referenceCode;
    public $amount;
    public $tax = 0;
    public $taxReturnBase = 0;
    public $currency;
    public $signature;
    public $test;
    public $buyerEmail;
    public $telephone;
    public $buyerFullName;
    public $payerEmail;
    public $payerPhone;
    public $payerFullName;
    public $payerDocument;
    public $payerDocumentType = 'CC';
    public $shippingAddress;
    public $shippingCity;
    public $query = ''; // Texto ingresado por el usuario
    public $carrito = [];
    public $checkoutForm = [];
    public $transactionParams = [];
    public $botonHabilitado = false; // Controla el estado del botón

    public function mount()
    {
        $this->carrito = Session::get('carrito', []);
        $this->checkoutForm = session('checkoutForm');
        // Verificar en la sesión si todos los campos están completos
        $this->botonHabilitado = $this->verificarFormularioCompleto();
        $this->buyerEmail = $this->checkoutForm['your_email'] ?? '';
        $this->amount = $this->getTotalProperty();
        $this->merchantId = env('PAYU_MERCHANT_ID');
        $this->accountId = env('PAYU_ACCOUNT_ID');
        $this->currency = env('CURRENCY');
        $this->test = env('APP_ENV') === 'prod' ? '0' : '1';
        $this->description = 'Compra en PQM';
        $this->referenceCode = uniqid('pedidopqm');
        $this->tax = 0;
        $this->taxReturnBase = 0;
        $this->signature = $this->generateSignature($this->amount, $this->referenceCode);
        $this->buyerFullName = $this->checkoutForm['your_name'] ?? '';
        $this->payerPhone = $this->checkoutForm['your_phone'] ?? '';
        $this->payerFullName = $this->checkoutForm['your_name'] ?? '';
        $this->payerDocument = $this->checkoutForm['document_number'] ?? '';
        $this->payerDocumentType = $this->checkoutForm['document_type'] ?? '';
        $this->shippingAddress = $this->checkoutForm['address'] ?? '';
        $this->shippingCity = $this->checkoutForm['your_city'] ?? '';
    }

    private function generateSignature($amount, $referenceCode)
    {
        $apiKey = env('PAYU_API_KEY');
        $merchantId = env('PAYU_MERCHANT_ID');
        $currency = 'COP';

        return md5("$apiKey~$merchantId~$referenceCode~$amount~$currency");
    }

    public function getTotalProperty()
    {
        // Inicializa los totales
        $subtotal = 0;
        $totalDescuentos = 0;
        $totalImpuestos = 0;

        // Itera sobre los productos en el carrito
        foreach ($this->carrito as $item) {
            $subtotal += $item['subtotal']; // Suma el subtotal de cada producto
            $totalDescuentos += $item['descuentos']; // Suma los descuentos totales
            $totalImpuestos += $item['impuestos']; // Suma los impuestos totales
        }

        // Calcula el total final
        $total = $subtotal + $totalImpuestos - $totalDescuentos;

        // Asegura que el total no sea negativo
        return max(0, $total);
    }

    public function getSubtotalProperty()
    {
        return array_sum(array_column($this->carrito, 'subtotal'));
    }

    public function getTotalDescuentosProperty()
    {
        return array_sum(array_column($this->carrito, 'descuentos'));
    }

    public function getTotalImpuestosProperty()
    {
        return array_sum(array_column($this->carrito, 'impuestos'));
    }

    #[On('formularioCompleto')]
    public function habilitarBoton()
    {
        $this->botonHabilitado = true; // Habilitar el botón
    }

    #[On('formularioIncompleto')]
    public function desHabilitarBoton()
    {
        $this->botonHabilitado = false; // Deshabilitar el botón
    }

    private function verificarFormularioCompleto()
    {
        $formData = session('checkoutForm', []); // Recupera los datos de la sesión

        // Define los campos obligatorios
        $camposObligatorios = [
            'your_name',
            'your_email',
            'your_phone',
            'document_type',
            'document_number',
            'address',
            'your_city',
        ];

        foreach ($camposObligatorios as $campo) {
            if (empty($formData[$campo])) {
                return false; // Si algún campo obligatorio está vacío, el formulario no está completo
            }
        }

        return true; // Todos los campos están completos
    }

    public function render()
    {
        return view('livewire.payment')->layout($this->getLayout());
    }
}
