<!-- Page Container -->
<div class="min-h-dvh min-w-[320px] bg-white text-gray-800">
    <!-- Info -->
    <div class="container mx-auto max-w-screen-lg p-4 lg:p-8">
        <div class="grid grid-cols-1 md:mt-12 md:grid-cols-6">
            <!-- Personal -->
            <div class="p-5 text-left md:col-span-2 md:text-right">
                <img class="inline-block md:w-2/3" src="{{ $user->getProfilePhotoUrlAttribute() }}"
                    alt="My portrait" />
                <div class="mt-5 space-y-2">
                    <p>{{ $user->city }}</p>
                    <p>{{ $user->phone_number }}</p>
                    <p>
                        <a class="font-medium text-black underline hover:text-black/75"
                            href="javascript:void(0)">{{ $user->email }}</a>
                    </p>
                    @if ($user->url != null)
                    <p>
                        <a class="font-medium text-black underline hover:text-black/75"
                            href="javascript:void(0)">{{ $user->url }}</a>
                    </p>
                    @endif
                </div>
            </div>
            <!-- END Personal -->

            <!-- Intro -->
            <div class="p-5 md:col-span-4">
                <h1 class="text-xl font-semibold">{{ $user->degree }}</h1>
                <h2 class="text-5xl font-bold leading-tight">{{ $user->name .' '. $user->last_name }} </h2>
                <p class="text-lg leading-relaxed text-slate-600">
                    {{ $user->current_position }}
                </p>
                <div class="my-5 h-1 rounded bg-indigo-500"></div>
                <p class="text-lg leading-relaxed text-slate-600">
                    {{ $user->professional_profile }}
                </p>
            </div>
            <!-- END Intro -->
        </div>
    </div>
    <!-- END Info -->

    <!-- Bio -->
    <div class="container mx-auto max-w-screen-lg space-y-10 p-4 lg:p-8">
        <!-- Education -->
        @if ($user->education->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-6">
                <div class="px-5 py-2 text-left md:col-span-2 md:text-right">
                    <h3 class="text-lg font-bold uppercase">Educación</h3>
                </div>
                <div class="space-y-6 px-5 py-2 md:col-span-4">
                    @foreach ($user->education as $education)
                        <div>
                            <h4 class="mb-2 text-lg font-semibold text-indigo-700">
                                {{ $educacion->año }}
                            </h4>
                            <h5 class="mb-1 font-bold">
                                {{ $education->titulo }}
                            </h5>
                            <p class="leading-relaxed">
                                {{ $education->descripcion }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <!-- END Education -->

        <!-- Work Experience -->
        @if ($user->workExperience->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-6">
                <div class="px-5 py-2 text-left md:col-span-2 md:text-right">
                    <h3 class="text-lg font-bold uppercase">Experiencia laboral</h3>
                </div>
                <div class="space-y-6 px-5 py-2 md:col-span-4">
                    @foreach ($user->workExperience as $experience)
                        <div>
                            <h4 class="mb-2 text-lg font-semibold text-indigo-700">
                                {{ $experience->año_inicio }} - {{ $experience->año_fin }}
                            </h4>
                            <h5 class="mb-1 font-bold">{{ $experience->puesto }} en {{ $experience->empresa }}</h5>
                            <p class="leading-relaxed">
                                {{ $experience->descripcion }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <!-- END Work Experience -->

        <!-- Projects -->
        @if ($user->projects->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-6">
                <div class="px-5 py-2 text-left md:col-span-2 md:text-right">
                    <h3 class="text-lg font-bold uppercase">Proyectos</h3>
                </div>
                <div class="space-y-6 px-5 py-2 md:col-span-4">
                    @foreach ($user->projects as $project)
                        <div>
                            <h4 class="mb-2 text-lg font-semibold text-indigo-700">
                                {{ $project->nombre }}, {{ $project->año }}
                            </h4>
                            <p class="leading-relaxed">
                                {{ $project->descripcion }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <!-- Redes Sociales -->
        @if (!empty($socialMediaLinks) && collect($socialMediaLinks)->filter()->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-6">
                <div class="px-5 py-2 text-left md:col-span-2 md:text-right">
                    <h3 class="text-lg font-bold uppercase">Sígueme en redes sociales</h3>
                </div>
                <div class="space-y-6 px-5 py-2 md:col-span-4">
                    @foreach ($socialMediaLinks as $platform => $url)
                        @if ($url) <!-- Mostrar solo si hay URL -->
                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="hover:opacity-75">
                                <img src="{{ asset('storage/images/redes-sociales/' . $platform . '.png') }}"
                                    alt="{{ ucfirst($platform) }}"
                                    class="w-10 h-10">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <!-- END redes sociales -->
        <!-- Social -->
        {{-- <div class="grid grid-cols-1 md:grid-cols-6">
            <div class="space-y-6 px-5 py-2 md:col-span-4"> --}}
                <!-- Footer -->
                <footer class="space-y-2 py-12 text-sm text-gray-600">
                    <p class="font-semibold">
                        Resume &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </p>
                    <p class="inline-flex items-center gap-1">
                        <span>Crafted with</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" data-slot="icon"
                            class="hi-mini hi-heart inline-block size-5 text-rose-500">
                            <path
                                d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                        </svg>
                        <span>by
                            <a class="font-medium text-black underline hover:text-black/75"
                                href="https://pixelcave.com">pixelcave</a></span>
                    </p>
                </footer>
                <!-- END Footer -->
            {{-- </div>
        </div> --}}
        <!-- END Social -->
    </div>
    <!-- END Bio -->
</div>
<!-- END Page Container -->
