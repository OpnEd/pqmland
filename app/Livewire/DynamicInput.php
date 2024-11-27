<?php

namespace App\Livewire;

use App\Models\Education;
use App\Models\Project;
use App\Models\WorkExperience;
use Livewire\Component;
use Str;

class DynamicInput extends Component
{
    public $section;  // Nombre de la sección (education, work_experience, projects)
    public $fields;   // Campos de la sección (['titulo', 'descripcion', 'año'])
    public $entries = []; // Datos dinámicos ingresados por el usuario
    public $userId;

    public function mount(
        $section,
        //$userId,
        $fields,
        //$existingEntries = []
        )
    {
        $this->section = $section;
        $this->fields = $fields;
        //$this->entries = $existingEntries;
        $this->userId = auth()->id();
        //$this->userId = $userId;
        $this->loadEntries();
    }

    protected function loadEntries()
    {
        $modelClass = $this->getModelClass();
        $this->entries = $modelClass::where('user_id', $this->userId)
            ->get(['id', ...$this->fields]) // Incluir el ID y los campos necesarios
            //->map(function ($entry) {
            //    return $entry->toArray(); // Asegura que la clave `id` esté presente
            //})
            ->toArray();
    }

    public function addEntry()
    {
        $this->entries[] = array_fill_keys($this->fields, '');
    }

    public function removeEntry($index)
    {
        unset($this->entries[$index]);
        $this->entries = array_values($this->entries);
    }

    public function save()
    {
        $modelClass = $this->getModelClass();

        foreach ($this->entries as $entry) {

            $this->validateEntry($entry);
            // Construir las claves únicas como un array asociativo
            $uniqueKeys = $this->getUniqueKeys($entry); //debe devolver un array asociativo como ['titulo' => 'Título de ejemplo']
            //$uniqueKeys['user_id'] = $this->userId;
            //dd($uniqueKeys);

            // Llamar a updateOrCreate con claves y datos correctos
            $modelClass::updateOrCreate(
                $uniqueKeys, // Claves únicas para encontrar o crear el registro
                $entry       // Datos para actualizar o crear
            );
        }

        session()->flash('message', __('¡Sección guardada exitosamente!'));

        // Recargar entradas desde la base de datos
        $this->loadEntries();
    }

    public function deleteEntry($id)
    {
        $modelClass = $this->getModelClass(); // Obtener el modelo correspondiente a la sección actual

        // Verificar si el registro existe antes de eliminarlo
        $entry = $modelClass::find($id);

        if ($entry) {
            $entry->delete(); // Eliminar el registro de la base de datos
            session()->flash('message', __('Registro eliminado exitosamente.'));
        } else {
            session()->flash('error', __('No se encontró el registro.'));
        }

        // Recargar las entradas para reflejar el cambio
        $this->loadEntries();
    }


    protected function getRequiredKeys(): array
    {
        $formattedSection = ucfirst(Str::camel($this->section)); // Convertir a PascalCase
        return match ($formattedSection) {
            'Education' => ['titulo', 'descripcion', 'año'],
            'WorkExperience' => ['empresa', 'puesto', 'descripcion', 'año_inicio', 'año_fin'],
            'Projects' => ['nombre', 'descripcion', 'año'],
            default => throw new \Exception("Sección no soportada: {$this->section}"),
        };
    }

    protected function validateEntry(array $entry): void
    {
        $requiredKeys = $this->getRequiredKeys()[$this->section] ?? [];

        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $entry)) {
                throw new \Exception("La entrada para '{$this->section}' es inválida: falta la clave requerida '{$key}'.");
            }
        }
    }

    protected function getModelClass()
    {
        $formattedSection = ucfirst(Str::camel($this->section)); // Convertir a PascalCase
        return match ($formattedSection) {
            'Education' => Education::class,
            'WorkExperience' => WorkExperience::class,
            'Projects' => Project::class,
            default => throw new \Exception("Sección no soportada: {$this->section}"),
        };
    }

    protected function getUniqueKeys(array $entry): array
    {
        // Si el registro tiene un 'id', usarlo como clave única
        if (isset($entry['id'])) {
            return ['id' => $entry['id']];
        }

        $formattedSection = ucfirst(Str::camel($this->section));
        return match ($formattedSection) {
            'Education' => [
                'user_id' => $this->userId,
                'titulo' => $entry['titulo'],
                'descripcion' => $entry['descripcion'],
                'año' => $entry['año'],
            ],
            'WorkExperience' => [
                'user_id' => $this->userId,
                'empresa' => $entry['empresa'],
                'puesto' => $entry['puesto'],
                'descripcion' => $entry['descripcion'],
                'año_inicio' => $entry['año_inicio'],
                'año_fin' => $entry['año_fin'],
            ],
            'Projects' => [
                'user_id' => $this->userId,
                'nombre' => $entry['nombre'],
                'descripcion' => $entry['descripcion'],
                'año' => $entry['año'],
            ],
            default => throw new \Exception("Sección no soportada: {$this->section}"),
        };
    }

    public function render()
    {
        return view('livewire.dynamic-input');
    }
}
