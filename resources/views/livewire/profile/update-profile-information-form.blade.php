<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public $profilePhoto;
    public string $degree;
    public string $professional_profile;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->degree = Auth::user()->degree;
        $this->professional_profile = Auth::user()->professional_profile;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'profilePhoto' => ['nullable', 'image', 'max:1024'],
            'degree' => ['required', 'string', 'max:255'],
            'professional_profile' => ['required', 'string'],
        ]);

        // Asignar los datos validados
        $user->fill(collect($validated)->except('profilePhoto')->toArray());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Manejar la imagen de perfil
        if ($this->profilePhoto) {
            $path = $this->profilePhoto->store('profile-photos', 'public'); // Guarda la imagen en storage/public/profile-photos
            $user->profile_photo_path = $path; // Guarda la ruta en la base de datos
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your principal account's profile information and email address.") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <!-- Campo de imagen de perfil -->
        <div>
            <x-input-label for="profilePhoto" :value="__('Profile Photo')" />
            <div x-data="{ imagePreview: null }" class="flex flex-col items-center space-y-4">
                <!-- Imagen actual o previsualización -->
                <div class="w-32 h-32 rounded-full overflow-hidden border-2 border-gray-300">
                    <img x-bind:src="imagePreview ||
                        '{{ auth()->user()->profile_photo_url ?? 'https://via.placeholder.com/150?text=Perfil' }}'"
                        alt="Foto de perfil" class="w-full h-full object-cover" />
                </div>

                <!-- Input para subir imagen -->
                <label class="block">
                    <span class="sr-only">Elige una imagen</span>
                    <input type="file" wire:model="profilePhoto" accept="image/*"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring focus:ring-blue-500"
                        @change="imagePreview = URL.createObjectURL($event.target.files[0])" />
                </label>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('profilePhoto')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" name="email" type="email" class="mt-1 block w-full"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="degree" :value="__('Degree')" />
            <x-text-input
                wire:model="degree"
                id="degree"
                name="degree"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="degree"
            />
            <x-input-error class="mt-2" :messages="$errors->get('degree')" />
        </div>

        <div>
            <x-input-label for="professional_profile" :value="__('Professional Profile')" />
            <x-textarea-input
                wire:model="professional_profile"
                id="professional_profile"
                name="professional_profile"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                rows="5"
                placeholder="Define tu perfil profesional..."
                autocomplete="professional_profile"
            ></x-textarea-input>
            <x-input-error class="mt-2" :messages="$errors->get('professional_profile')" />
        </div>
        <div>
            <x-input-label for="current_position" :value="__('Current Position')" />
            <x-text-input wire:model="current_position" id="current_position" name="current_position" type="text" class="mt-1 block w-full"
                autofocus placeholder="Escribe así: 'Nombre del cargo' en 'nombre de la empresa'" autocomplete="current_position" />
            <x-input-error class="mt-2" :messages="$errors->get('current_position')" />
        </div>
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input wire:model="city" id="city" name="city" type="text" class="mt-1 block w-full"
                required autofocus placeholder="Escribe así: Ciudad, Departamento" autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div>
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input wire:model="phone_number" id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
                required autofocus autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>
        <div>
            <x-input-label for="url" :value="__('Personal URL')" />
            <x-text-input wire:model="url" id="url" name="url" type="text" class="mt-1 block w-full"
                autofocus placeholder="https://miurl.com" autocomplete="url" />
            <x-input-error class="mt-2" :messages="$errors->get('url')" />
        </div>
        <div>
            <x-input-label for="linked_in" :value="__('LinkedIn')" />
            <x-text-input wire:model="linked_in" id="linked_in" name="linked_in" type="text" class="mt-1 block w-full"
                autofocus placeholder="https://www.linkedin.com/in/pepito-34a88888/" autocomplete="linked_in" />
            <x-input-error class="mt-2" :messages="$errors->get('linked_in')" />
        </div>
        <div>
            <x-input-label for="facebook" :value="__('Facebook')" />
            <x-text-input wire:model="facebook" id="facebook" name="facebook" type="text" class="mt-1 block w-full"
                autofocus placeholder="https://www.facebook.com/profile.php?id=100063906746595" autocomplete="facebook" />
            <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
        </div>
        <div>
            <x-input-label for="tweeter" :value="__('Twitter')" />
            <x-text-input wire:model="tweeter" id="tweeter" name="tweeter" type="text" class="mt-1 block w-full"
                autofocus placeholder="@pqm" autocomplete="tweeter" />
            <x-input-error class="mt-2" :messages="$errors->get('tweeter')" />
        </div>
        <div>
            <x-input-label for="instagram" :value="__('Instagram')" />
            <x-text-input wire:model="instagram" id="instagram" name="instagram" type="text" class="mt-1 block w-full"
                autofocus placeholder="@pqm" autocomplete="instagram" />
            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
        </div>
        <div>
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <x-date-input
                wire:model="birth_date"
                id="birth_date"
                name="birth_date"
                class="mt-1 block w-full"
                autofocus
                autocomplete="birth_date"
            />
            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="profile-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>

    <span>
        <hr class="solid text-gray-500 mt-6 mb-3">
    </span>

    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Curriculum data') }}
    </h2>

    <p class="mt-1 mb-3 text-sm text-gray-600">
        {{ __("Update your curriculum's profile information.") }}
    </p>

    <div class="container mx-auto space-y-4">
        <livewire:user-profile />
    </div>

    <span>
        <hr class="solid text-gray-500 mt-6 mb-3">
    </span>

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
</section>
