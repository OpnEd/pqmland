<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Nosotros')

    <!-- Sección hero -->

    <section class="relative bg-fixed bg-center bg-cover bg-no-repeat bg-white dark:bg-gray-900"
        style="background-image: url('/storage/images/nosotros/dt-farmacia.jpg');">
        <!-- Overlay para oscurecer la imagen si es necesario -->
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>

        <div class="relative py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <h1
                class="mb-4 text-gray-100 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl dark:text-white">
                Quiénes somos y qué Hacemos?</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                Promovemos el uso responsable de medicamentos con soluciones tecnológicas, formación y un firme
                compromiso con el bienestar social.</p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            </div>
        </div>
    </section>

    <section class="bg-gray-100 dark:bg-gray-900 py-12">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                    Nuestra Misión y Visión
                </h2>
                <p class="mt-4 text-lg leading-6 text-gray-500 dark:text-gray-400">
                    Descubre lo que nos impulsa y hacia dónde nos dirigimos
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Misión -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <span
                            class="inline-block p-3 bg-primary-100 text-primary-800 rounded-full dark:bg-primary-900 dark:text-primary-200">
                            <!-- Icono de la Misión -->
                            <img src="{{ asset('storage/images/mision-vision/mision.png') }}" alt="M">
                            {{-- <img src="https://www.pqm-pharmaquality.com.co/images/mision-vision/mision.png" alt="M"> --}}
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white ml-4">Misión</h3>
                    </div>
                    <p class="text-base leading-7 text-gray-500 dark:text-gray-400">
                        Nuestra misión es fomentar el uso responsable de los medicamentos en la sociedad,
                        trabajando en alianza con las droguerías y proporcionándoles herramientas tecnológicas,
                        servicios de consultoría y capacitación, así como información clave para beneficiar
                        a la comunidad. Trabajamos a diario para facilitar a las droguerías el cumplimiento
                        con los requisitos que auditan las Secretarías de Salud.
                    </p>
                </div>
                <!-- Visión -->
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <span
                            class="inline-block p-3 bg-primary-100 text-primary-800 rounded-full dark:bg-primary-900 dark:text-primary-200">
                            <!-- Icono de la Visión -->
                            <img src="{{ asset('storage/images/mision-vision/vision.png') }}" alt="V">
                            {{-- <img src="https://www.pqm-pharmaquality.com.co/images/mision-vision/vision.png" alt="V"> --}}
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white ml-4">Visión</h3>
                    </div>
                    <p class="text-base leading-7 text-gray-500 dark:text-gray-400">
                        Para el año 2027, seremos reconocidos como un importante aliado estratégico de las
                        droguerías en Colombia, principalmente en los departamentos con mayor densidad poblacional,
                        liderando el sector con soluciones innovadoras que impulsen la racionalidad en el uso
                        de los medicamentos, contribuyendo a una mejor salud pública en el país.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Nuestro equipo
                </h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Equipo pequeño aún, pero de
                    profesionales calificados y comprometidos</p>
            </div>
            {{-- <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"> --}}
            <div class="flex flex-row justify-center gap-8 lg:gap-16">
                @foreach ($colaboradores as $colaborador)
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="{{ $colaborador->getProfilePhotoUrlAttribute() }}" alt="{{ $colaborador->name }}">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            @if ($colaborador->cv_published)
                                <a
                                    href="{{ route('curriculo.user', $colaborador->slug) }}">{{ $colaborador->name . ' ' . $colaborador->last_name }}</a>
                            @else
                                <a href="#">{{ $colaborador->name . ' ' . $colaborador->last_name }}</a>
                            @endif
                        </h3>
                        <p>{{ $colaborador->current_position }}</p>
                        {{-- @if (!empty($colaborador->socialMediaLinks))
                            <ul class="flex justify-center mt-4 space-x-4">
                                @foreach ($colaborador->socialMediaLinks as $platform => $url)
                                    @if ($url)
                                        <!-- Mostrar solo si hay URL -->
                                        <li>
                                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                                class="hover:opacity-75 pr-8">
                                                <img src="{{ asset('storage/images/redes-sociales/' . $platform . '.png') }}"
                                                    alt="{{ ucfirst($platform) }}" class="w-10 h-10">
                                                    {{-- <img src="{{ 'https://www.pqm-pharmaquality.com.co/images/redes-sociales/' . $platform . '.png' }}"
                                                    alt="{{ ucfirst($platform) }}" class="w-10 h-10"> --}}
                                            {{--</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif --}}
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
