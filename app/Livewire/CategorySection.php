<?php

namespace App\Livewire;

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

        // Cargar todas o limitar a 3 categorías según el estado de `showAll`.
        $this->categories = $this->showAll
            ? $this->fetchCategories()
            : $this->fetchCategories(limit: 3);
    }

    //private function fetchCategories(?int $limit = null, ?int $offset = null)
    private function fetchCategories(?int $limit = null)
    {
        // Crear una consulta basada en el modelo configurado dinámicamente.
        $query = $this->modelClass::query();

        // Aplicar el scope si está definido.
        if ($this->scopeMethod && method_exists($this->modelClass, $this->scopeMethod)) {
            $query->{$this->scopeMethod}();
        }

        // Filtrar categorías con relaciones asociadas dinámicamente.
        $relationName = $this->getRelationNameFromModel($this->modelClass);

        if ($relationName) {
            $query->whereHas($relationName);
        }

        // Aplicar límite si está definido.
        if (!is_null($limit)) {
            $query->limit($limit);
        }

        // Incluir solo categorías con modelos asociados
        //$query->whereHas($this->modelClass::getRelationName()); // Ajusta dinámicamente al nombre de la relación adecuada

        /* if (!is_null($offset)) {
            $query->skip($offset);
        }

        if (!is_null($limit)) {
            $query->take($limit);
        } */

        return $query->get();
    }

    private function getRelationNameFromModel($modelClass)
    {
        // Detectar dinámicamente el nombre de la relación asociada.
        // Se asume que existe un método `getRelationName()` en cada modelo.
        return method_exists($modelClass, 'getRelationName')
            ? $modelClass::getRelationName()
            : null;
    }

    public function render()
    {
        return view('livewire.category-section', [
            'categories' => $this->categories,
        ]);
    }
}
