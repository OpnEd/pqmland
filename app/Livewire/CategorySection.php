<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use Livewire\Component;

class CategorySection extends Component
{
    public $categories;
    public $showAll = false;
    public $modelClass; // Clase del modelo y filtro opcional, configurables.
    public $scopeMethod;

    public function mount(string $modelClass, ?string $scopeMethod = null)
    {
        $this->modelClass = $modelClass;
        $this->scopeMethod = $scopeMethod;
        $this->categories = $this->fetchCategories(limit: 3); // Cargar solo un subconjunto inicial de categorías.
    }

    public function toggleShowAll()
    {
        $this->showAll = !$this->showAll;

        if ($this->showAll) {
            $this->categories = $this->fetchCategories(); // Cargar todas las categorías
        } else {
            $this->categories = $this->fetchCategories(limit: 3); // Limitar nuevamente a 3 categorías
        }
    }

    private function fetchCategories(?int $limit = null, ?int $offset = null)
    {
        $query = $this->modelClass::query();

        if ($this->scopeMethod && method_exists($this->modelClass, $this->scopeMethod)) { // Aplicar el scope si está definido.
            $query->{$this->scopeMethod}();
        }

        if (!is_null($offset)) {
            $query->skip($offset);
        }

        if (!is_null($limit)) {
            $query->take($limit);
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.category-section', [
            'categories' => $this->categories,
        ]);
    }
}
