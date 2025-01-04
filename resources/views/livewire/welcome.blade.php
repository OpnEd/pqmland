<div>
    @section('pageDescription', 'Esta es una descripción específica para la página Home')

    @if ($seccionHero)

    <section class="bg-white dark:bg-gray-900">
        <div x-data="handleScroll()" x-init="init()" @scroll.window="onScroll" class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <!-- Primer div independiente -->
            <div class="mr-auto place-self-center lg:col-span-7 transition-all duration-500 transform" x-ref="leftContent">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    {{ $seccionHero->title }}
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {{ $seccionHero->subtitle }}
                </p>
                @foreach ($seccionHero->buttons as $button)
                    @if ($button['url'] === 'register')
                        <a href="{{ route($button['url']) }}"
                           class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 mb-4">
                            {{ $button['text'] }}
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @else
                        <a href="{{ route($button['url']) }}"
                           class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            {{ $button['text'] }}
                        </a>
                    @endif
                @endforeach
            </div>
            <!-- Segundo div independiente -->
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex shadow-2xl rounded-xl transition-all duration-500 transform" x-ref="rightContent">
                <img src="{{ asset('storage/images/welcome/'.$seccionHero->image.'.png') }}" alt="PQM" class="rounded-xl">
                {{-- <img src="{{ 'https://www.pqm-pharmaquality.com.co/images/welcome/'.$seccionHero->image.'.png' }}" alt="PQM" class="rounded-xl"> --}}
            </div>
        </div>
    </section>
    @endif
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            @if ($seccionFeatures)
            <div class="mb-6">
                <div class="max-w-screen-md mb-8 lg:mb-16">
                    <h2 class="items-center mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Diseñado para droguistas como <strong class="text-7xl">tú</strong></h2>
                    <p class="text-gray-500 sm:text-xl dark:text-gray-400">En PQM - Pharmaceutical Quality Management, nos enfocamos ante todo en facilitarle el trabajo al droguista del barrio! Observa algunas de nuestras características:</p>
                </div>
                <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                    @foreach ($seccionFeatures as $feature)
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                                {!! $feature->image !!}
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">{{ $feature->title }}</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $feature->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            @if ($seccionBenefits)
            <div class="bg-indigo-100 p-6 rounded-lg">
                <div class="max-w-screen-md mb-8 mt-12 lg:mb-16 ml-auto text-right">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Benefíciate con las herramientas que desarrollamos pensando en tí</strong></h2>
                    <p class="text-gray-500 sm:text-xl dark:text-gray-400">Al implementar PQM en tu droguería podrás:</p>
                </div>
                <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                    @foreach ($seccionBenefits as $benetif)
                        <div>
                            <div
                                class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                                {!! $benetif->image !!}
                            </div>
                            <h3 class="mb-2 text-xl font-bold dark:text-white">{{ $benetif->title }}</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $benetif->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
    {{-- <div x-data="testimonios()" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-24 mt-8">
        <div class="flex">
            <!-- Columna Izquierda -->
            <div class="w-1/3">
                <div class="space-y-4">
                    <template x-for="(testimonio, index) in testimonios.slice(0, 3)" :key="index">
                        <div @click="setTestimonioActivo(index)"
                            class="p-4 border rounded-lg cursor-pointer hover:bg-gray-100"
                            :class="{ 'bg-gray-200': testimonioActivo === index }">
                            <div class="flex flex-row content-center justify-start">
                                <img :src="`/storage/${testimonio.foto}`" alt="" class="w-12 h-12 rounded-full mx-auto">
                                <h4 class="text-lg font-semibold" x-text="testimonio.nombre"></h4>
                            </div>
                            <div class="text-center mt-2 items-start">
                                <p class="text-gray-500" x-text="testimonio.cargo"></p>
                            </div>
                        </div>
                    </template>
                </div>
                <button class="w-full mt-4 p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                    Ver más testimonios
                </button>
            </div>
            <!-- Columna Derecha -->
            <div class="w-2/3 ml-4">
                <div class="p-6 bg-white rounded-lg shadow-lg h-full">
                    <h2 class="text-2xl font-bold" x-text="testimonios[testimonioActivo].titulo"></h2>
                    <p class="mt-4" x-text="testimonios[testimonioActivo].contenido"></p>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- CTA Section -->
    {{-- {{dd($seccionCta)}} --}}
    @if ($seccionCta)
        <section class="py-8">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">{{ $seccionCta[0]->title }}</h2>
                <p class="text-lg mb-8">{{ $seccionCta[0]->subtitle }}</p>
                @foreach ($seccionCta[0]->buttons as $button)

                @endforeach
                <a href="{{ route($button['url']) }}" class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-700">{{ $button['text'] }}</a>
            </div>
        </section>
    @endif
</div>
{{-- <script>
    function testimonios() {
        return {
            testimonios: @json($testimonios),
            testimonioActivo: 0,
            setTestimonioActivo(index) {
                this.testimonioActivo = index;
            }
        }
    }
</script> --}}
{{-- <script>
    function handleScroll() {
        return {
            init() {
                this.onScroll();
            },
            onScroll() {
                const section = this.$el;
                const scrollPosition = window.scrollY;
                const screenHeight = window.innerHeight;
                const triggerPoint = screenHeight / 2; // Ajusta este valor según sea necesario

                if (scrollPosition > triggerPoint) {
                    section.style.transform = 'scale(0.5)';
                    section.style.opacity = '0';
                } else {
                    const scaleValue = 1 - (scrollPosition / (triggerPoint * 2));
                    section.style.transform = `scale(${scaleValue})`;
                    section.style.opacity = `${scaleValue}`;
                }
            }
        }
    }
</script> --}}
<script>
    function handleScroll() {
        return {
            init() {
                this.onScroll();
            },
            onScroll() {
                const leftContent = this.$refs.leftContent;
                const rightContent = this.$refs.rightContent;
                const scrollPosition = window.scrollY;
                const screenHeight = window.innerHeight;
                const triggerPoint = screenHeight / 1; // Ajusta este valor según sea necesario

                // Ajuste para el primer div (leftContent)
                if (scrollPosition > triggerPoint) {
                    leftContent.style.transform = 'scale(0.5)';
                    leftContent.style.opacity = '0';
                } else {
                    const scaleValueLeft = 1 - (scrollPosition / (triggerPoint * 2));
                    leftContent.style.transform = `scale(${scaleValueLeft})`;
                    leftContent.style.opacity = `${scaleValueLeft}`;
                }

                // Ajuste para el segundo div (rightContent)
                if (scrollPosition > triggerPoint) {
                    rightContent.style.transform = 'scale(0.5)';
                    rightContent.style.opacity = '0';
                } else {
                    const scaleValueRight = 1 - (scrollPosition / (triggerPoint * 2));
                    rightContent.style.transform = `scale(${scaleValueRight})`;
                    rightContent.style.opacity = `${scaleValueRight}`;
                }
            }
        }
    }
</script>



