<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use App\Livewire\BaseComponent;
use App\Models\Testimonio;
use App\Models\WelcomePage;

#[Title('PQM - Bienvenidos')]
class Welcome extends BaseComponent
{
    public $seccionHero;
    public $seccionFeatures;
    public $seccionTestimonios;
    public $seccionBenefits;
    public $seccionCta;
    public $testimonios;
    public $testimonioActivo = 0;

    public function mount()
    {
        // Cargar contenido dinámico desde la base de datos
        $this->seccionHero = WelcomePage::where('type', 'hero')->first();
        $this->seccionFeatures = WelcomePage::where('type', 'features')->get();
        $this->seccionTestimonios = WelcomePage::where('type', 'testimonios')->get();
        $this->seccionBenefits = WelcomePage::where('type', 'benefits')->get();
        $this->seccionCta = WelcomePage::where('type', 'cta')->get();

        $this->testimonios= Testimonio::all()->toArray();
    }

    public function setTestimonioActivo($index)
    {
        $this->testimonioActivo = $index;
    }
    public function render()
    {
        return view('livewire.welcome')->layout($this->getLayout());
    }
}
