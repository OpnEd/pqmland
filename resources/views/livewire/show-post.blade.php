<div>
<div>
    @php
        $objectives = is_string($post['objectives']) ? json_decode($post['objectives'], true) : $post['objectives'];
        $conclusions = is_string($post['conclusions']) ? json_decode($post['conclusions'], true) : $post['conclusions'];
        $references = is_string($post['references']) ? json_decode($post['references'], true) : $post['references'];
    @endphp
    @section('pageDescription', 'Esta es una descripción específica para la página Post')
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="prose mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="flex flex-row justify-between items-center w-full">
                            <img class="mr-4 mt-4 w-16 h-16 rounded-full"
                                src="{{ $post->author->getProfilePhotoUrlAttribute() }}" alt="{{ $post->author->name }}">
                            <div class="flex flex-col">
                                <a href="{{ route('curriculo.user', $post->author) }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name . ' ' . $post->author->last_name }}</a>
                                <p class="text-gray-500 dark:text-gray-400">{{ $post->author->degree }}</p>
                            </div>
                            <div class="ml-auto">
                                <livewire:favorite-posts :post="$post" />
                            </div>
                        </div>

                        {{-- <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="{{ $post->author->getProfilePhotoUrlAttribute() }}" alt="{{ $post->author->name }}">
                            <div class="flex flex-row justify-between items-end w-max">
                                <div>
                                    <a href="{{ route('curriculo.user', $post->author) }}" rel="author"
                                        class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name .' '. $post->author->last_name }}</a>
                                    <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->author->degree }}</p>
                                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                            datetime="{{ $post->created_at }}" title="{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d M Y') }}">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d M Y') }}</time></p>
                                </div>
                                <div>
                                    <livewire:favorite-posts :post="$post" />
                                </div>
                            </div>
                        </div> --}}
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                    <time pubdate datetime="{{ $post->created_at }}"
                        title="{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d M Y') }}">
                        {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d M Y') }}
                    </time>
                </header>
                @if ($post->video != null && $post->cover == null)
                    <div>
                        <iframe class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl"
                            src="{{ $post->video }}" title="{{ $post->title }}" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                @elseif ($post->cover != null && $post->video == null)
                    <div>
                        <img class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl"
                            src="{{ Storage::url($post->cover) }}" alt="{{ $post->title }}">
{{--                         <img class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl"
                            src="{{ 'https://www.pqm-pharmaquality.com.co/storage/app/public/' . $post->cover }}" alt="{{ $post->title }}"> --}}
                    </div>
                @endif
                <!-- -->
                @if ($post->objectives != null)
                    <h2>Objetivos</h2>
                    <ol>
                        @foreach ($objectives as $objective)
                            @if (is_array($objective) && isset($objective['content']))
                            <li>{!! $objective['content'] !!}</li>
                            @endif
                        @endforeach
                    </ol>
                @endif


                <!-- -->
                @if ($post->abstract != null)
                    <h2>Resumen</h2>
                    {!! $post->abstract !!}
                @endif


                <!-- -->
                @if ($post->introduction != null)
                <div class="mt-8">
                    <h2>Introducción</h2>
                    {!! $post->introduction !!}
                </div>
                @endif


                <!-- -->
                {!! $post->content !!}


                <!-- -->
                @if ($post->conclusions != null)
                    <h2>Conclusiones</h2>
                    <ul>
                        @foreach ($conclusions as $conclusion)
                            @if (is_array($conclusion) && isset($conclusion['content']))
                            <li>{!! $conclusion['content'] !!}</li>
                            @endif
                        @endforeach
                    </ul>
                @endif


                <!-- -->
                @if ($post->references != null)
                    <h2>Referencias</h2>
                    <ol>
                        @foreach ($references as $reference)
                            @if (is_array($reference) && isset($reference['content']))
                            <li>{!! $reference['content'] !!}</li>
                            @endif
                        @endforeach
                    </ol>
                @endif
                <livewire:post-comments :key="'comments' . $post->id" :$post />
            </article>
        </div>
    </main>

    <!-- <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                <article class="max-w-xs">
                    <a href="#">
                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png"
                            class="mb-5 rounded-lg" alt="Image 1">
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="#">Our first office</a>
                    </h2>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many
                        changes! After months of preparation.</p>
                    <a href="#"
                        class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                        Read in 2 minutes
                    </a>
                </article>
            </div>
        </div>
    </aside> -->

    <!-- <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md sm:text-center">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Suscríbete a nuestro boletín</h2>
                <p class="mx-auto max-w-2xl  text-gray-500 sm:text-xl dark:text-gray-400">Te informaremos cada vez que
                    hagamos una nueva publicación.</p>
                <p class="mx-auto mb-8 max-w-2xl  text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400">Te mantendremos
                    al tanto de noticias del sector de droguerías y otros temas de interés para tí y tus usuarios.</p>
                <form action="#">
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="email"
                                class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email
                                address</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                    <path
                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                </svg>
                            </div>
                            <input
                                class="block p-3 pl-9 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Enter your email" type="email" id="email" required="">
                        </div>
                        <div>
                            <button type="submit"
                                class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Subscribe</button>
                        </div>
                    </div>
                    <div
                        class="mx-auto max-w-screen-sm text-sm text-left text-gray-500 newsletter-form-footer dark:text-gray-300">
                        We care about the protection of your data. <a href="#"
                            class="font-medium text-primary-600 dark:text-primary-500 hover:underline">Read our Privacy
                            Policy</a>.</div>
                </form>
            </div>
        </div>
    </section> -->
</div>

{{-- @if (!empty($post->references) && is_array($post->references))
    <ul>
        @foreach ($post->references as $reference)
            <li>
                <h3 class="text-lg font-bold">{{ $reference['title'] ?? 'Sin título' }}</h3>
                <p class="text-sm text-gray-500">
                    <a href="{{ $reference['url'] ?? '#' }}" target="_blank" class="text-blue-500 underline">
                        {{ $reference['url'] ?? 'Enlace no disponible' }}
                    </a>
                </p>
                <p class="text-sm text-gray-400">{{ $reference['description'] ?? 'Sin descripción' }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay referencias disponibles.</p>
@endif
--}}
</div>
