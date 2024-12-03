<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Curriculum education and experience') }}
                </h2>

                <p class="mt-1 mb-3 text-sm text-gray-600">
                    {{ __("Update your curriculum's education and experience.") }}
                </p>
                <div class="space-y-8">
                    <!-- Sección: Educación -->
                    <livewire:dynamic-input section="education" :fields="['titulo', 'descripcion', 'año']" :existing-entries="auth()->user()->education->toArray()" />

                    <!-- Sección: Experiencia Laboral -->
                    <livewire:dynamic-input section="work_experience" :fields="['empresa', 'puesto', 'descripcion', 'año_inicio', 'año_fin']" :existing-entries="auth()->user()->workExperience->toArray()" />

                    <!-- Sección: Proyectos -->
                    <livewire:dynamic-input section="projects" :fields="['nombre', 'descripcion', 'año']" :existing-entries="auth()->user()->projects->toArray()" />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
