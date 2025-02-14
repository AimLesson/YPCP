@extends('front.layout.app')
@section('title', 'Home')
@section('content')
    {{-- Carousel --}}
    <section>
        <div class="max-w-screen-4xl">
            <div id="static-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-96 overflow-hidden md:h-[600px]">
                    <!-- Slide 0 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('slide/1.png') }}" class="absolute block w-full h-full object-cover object-top"
                            alt="Image 1">
                        <div class="absolute left-0 bottom-1/4 transform -translate-y-1/2 bg-white bg-opacity-75 p-4">
                            <h2 class="text-xl uppercase font-semibold text-gray-800">Sekolah Bruderan Karitas Purwokerto</h2>
                        </div>
                    </div>
                    <!-- Slide 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('slide/8.jpg') }}" class="absolute block w-full h-full object-cover"
                            alt="Image 1">
                        <div class="absolute left-0 bottom-1/4 transform translate-y-1/2 bg-white bg-opacity-75 p-4">
                            <h2 class="text-xl font-bold text-gray-800">SD Bruderan Purwokerto</h2>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('slide/9.jpg') }}" class="absolute block w-full h-full object-cover"
                            alt="Image 2">
                        <div class="absolute left-0 bottom-1/4 transform translate-y-1/2 bg-white bg-opacity-75 p-4">
                            <h2 class="text-xl font-bold text-gray-800">SMP Bruderan Purwokerto</h2>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('slide/10.jpg') }}" class="absolute block w-full h-full object-cover"
                            alt="Image 3">
                        <div class="absolute left-0 bottom-1/4 transform translate-y-1/2 bg-white bg-opacity-75 p-4">
                            <h2 class="text-xl font-bold text-gray-800">SD Karitas</h2>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('slide/11.jpg') }}" class="absolute block w-full h-full object-cover"
                            alt="Image 4">
                        <div class="absolute left-0 bottom-1/4 transform translate-y-1/2 bg-white bg-opacity-75 p-4">
                            <h2 class="text-xl font-bold text-gray-800">TK Karitas</h2>
                        </div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('slide/12.jpg') }}" class="absolute block w-full h-full object-cover"
                            alt="Image 5">
                        <div class="absolute left-0 bottom-1/4 transform translate-y-1/2 bg-white bg-opacity-75 p-4">
                            <h2 class="text-xl font-bold text-gray-800">SMA Bruderan Purwokerto</h2>
                        </div>
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-300" aria-current="false"
                        aria-label="Slide 6" data-carousel-slide-to="5"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>

    {{-- About Us --}}
    <div class="bg-gray-100 py-6 sm:py-8 lg:py-8 mx-auto">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <p class="text-center uppercase font-semibold text-black md:mb-3 lg:text-2xl">{{ $profile->name }}</p>
            <div class="grid gap-8 md:grid-cols-2 lg:gap-12 my-8">
                <div>
                    <div class="h-64 max-h-96 overflow-hidden rounded-xl bg-gray-100 shadow-xl md:h-auto">
                        {{-- <img src="{{ asset('slide/3.jpg') }}" loading="lazy" alt="Photo by Martin Sanchez"
                            class="h-full w-full max-h-96 object-cover object-center" /> --}}
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/NSrnSr01bU8?si=QY-02vSFFtOeEllK"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <div class="md:pt-8">
                    <h2 class="mb-2 text-center text-xl font-semibold text-gray-800 sm:text-2xl md:mb-4 md:text-left">About
                        us</h2>
                    <p class="mb-6 text-gray-800 sm:text-lg md:mb-8">
                        {!! str_replace(['<p>', '</p>'], '', $profile->about) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Visi Misi --}}
    <section class="border-y-2 border-blue-300">
        <div class="py-2 sm:py-4 lg:py-6">
            <div class="mx-auto max-w-screen-md px-4 md:px-8">
                <p class="mb-2 text-center font-bold uppercase text-blue-600 md:mb-3 lg:text-2xl">Visi</p>
                <p class="bg-blue-500 rounded-lg tracking-wide p-4 text-center capitalize text-sm md:text-xl text-white md:mb-6">{!! str_replace(['<p>', '</p>'], '', $profile->visi) !!}
                </p>
            </div>
        </div>

        <div class="bg-white py-2 sm:py-4 lg:py-6">
            <div class="mx-auto max-w-screen-lg px-4 md:px-8">
                <p class="mb-2 text-center font-bold uppercase text-blue-500 md:mb-3 lg:text-2xl">Misi</p>
                <h2 class="prose bg-blue-500 rounded-lg p-4 tracking-wide mb-4 text-center capitalize text-sm md:text-xl text-white md:mb-6">{!! $profile->misi !!}
                </h2>
            </div>
        </div>
    </section>

    {{-- Our Channel --}}
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">
            <div class="mx-auto max-w-screen-2xl flex items-center gap-12">
                <h2 class="text-2xl font-semibold uppercase text-gray-800 lg:text-3xl">Our Channel</h2>
            </div>
        </div>
        <div class="flex justify-center py-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/NSrnSr01bU8?si=QY-02vSFFtOeEllK"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>

    {{-- Sekolah --}}
    <section>
        <div class="bg-gray-100 py-6 sm:py-8 lg:py-6">
            <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
                <h2 id="school-section"
                    class="mb-4 text-center uppercase text-2xl font-semibold text-gray-800 md:mb-8 lg:text-3xl xl:mb-12">Sekolah Bruderan Karitas</h2>

                <div class="mb-4 grid grid-cols-2 gap-4 sm:grid-cols-3 md:mb-8 md:grid-cols-5 md:gap-6 xl:gap-8">
                    @foreach ($schools as $school)
                        <a href="{{ route('sekolah.show', $school->slug) }}"
                            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                            <img src="{{ asset('storage/' . $school->logo) }}" loading="lazy" alt="{{ $school->name }}"
                                class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                            </div>
                            <span
                                class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $school->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-3xl px-4 md:px-8">
                <div class="mb-10 md:mb-16">
                    <h2 class="mb-4 text-center uppercase text-2xl font-semibold text-gray-800 md:mb-6 lg:text-3xl">Berita
                        Sekolah Bruderan Karitas</h2>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-5 xl:gap-8">
                    @foreach ($news as $n)
                        <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                            <a href="{{ route('news.show', $n->slug) }}"
                                class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                                <img src="{{ asset($n->image ? 'storage/' . $n->image : 'default.jpeg') }}"  loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>

                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <h2 class="mb-2 text-lg font-semibold text-gray-800">
                                    <a href="{{ route('news.show', $n->slug) }}"
                                        class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{ $n->title }}</a>
                                </h2>

                                <p class="mb-8 text-gray-500">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($n->content), 100, '...') }}</p>

                                <div class="mt-auto flex items-end justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gray-100">
                                            <img src="{{ asset($n->branch->logo ? 'storage/' . $n->branch->logo : 'default.jpeg') }}"
                                                loading="lazy" alt="Photo by Brock Wegner"
                                                class="h-full w-full object-cover object-center" />
                                        </div>

                                        <div>
                                            <span class="block text-indigo-500">{{ $n->branch->name }}</span>
                                            <span class="block text-sm text-gray-400">{{ $n->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    

    {{-- Gallery --}}
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">
                <div class="flex items-center gap-12">
                    <h2 class="text-2xl font-semibold uppercase text-gray-800 lg:text-3xl">Gallery</h2>
                </div>
            </div>
    
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 md:gap-6 xl:gap-8">
                @foreach($news->take(8) as $n)
                    <a href="#" class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80 {{ in_array($loop->iteration, [2,3,6,7]) ? 'md:col-span-2' : '' }}">
                        <img src="{{ asset($n->image ? 'storage/' . $n->image : 'default.jpeg') }}" loading="lazy" alt="News Image" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50"></div>
                        <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $n->title }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    
    {{-- Personalia --}}
    {{-- <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
            <!-- text - start -->
            <div class="mb-10 md:mb-16">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Tim {{ $profile->name }}
                </h2>

                <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Saling Berkolaborasi dan Bersinergi
                </p>
            </div>
            <!-- text - end -->

            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 lg:gap-8">
                @foreach ($personalia as $person)
                    <div class="flex flex-col items-center rounded-lg bg-gray-100 p-4 lg:p-8">
                        <div
                            class="mb-2 h-24 w-24 overflow-hidden rounded-full bg-gray-200 shadow-lg md:mb-4 md:h-32 md:w-32">
                            <img src="{{ asset('storage/' . $person->profile_picture) }}" loading="lazy"
                                alt="Photo by Radu Florin" class="h-full w-full object-cover object-center" />
                        </div>

                        <div>
                            <div class="text-center font-bold text-indigo-500 md:text-lg">{{ $person->name }}</div>
                            <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">{{ $person->title }}
                            </p>
                        </div>
                    </div>
                    <!-- person - end -->
                @endforeach
                <!-- person - start -->
            </div>
        </div>
    </div> --}}

    {{-- Floating Chat Button --}}
    <div x-data="faqChat()" class="fixed bottom-6 right-6 z-50">

        <!-- Floating Chat Button -->
        <button @click="open = !open"
            class="bg-white text-blue-500 border border-blue-300 rounded-full shadow-lg p-4 flex items-center justify-center hover:bg-blue-100 transition duration-300">
            <!-- Chat Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6" viewBox="0 0 16 16">
                <path
                    d="M2 0a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.5L8 16l2.5-2H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm0 1h12a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H9.675L8 14.175 6.325 13H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                <path d="M3 3h10v1H3V3zm0 3h7v1H3V6zm0 3h5v1H3V9z" />
            </svg>
        </button>

        <!-- Chat Pop-up FAQ -->
        <div x-show="open" @click.away="open = false"
            class="absolute bottom-20 right-0 w-80 md:w-96 bg-white border border-blue-300 shadow-lg rounded-lg transition-opacity duration-300 ease-in-out">

            <!-- Chat Header -->
            <div class="bg-blue-500 text-white px-4 py-3 flex justify-between items-center rounded-t-lg">
                <span class="font-semibold">Live Chat FAQ</span>
                <button @click="open = false" class="text-white hover:text-gray-300">
                    ✖
                </button>
            </div>

            <!-- FAQ Input Selection -->
            <div class="p-4">
                <label for="faq-select" class="block text-gray-700 font-medium">Pilih pertanyaan:</label>
                <input x-model="selectedQuestion" x-on:input="checkAnswer()" list="faq-list" id="faq-select"
                    class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                    placeholder="Ketik pertanyaan..." />
                <datalist id="faq-list">
                    <template x-for="(answer, question) in questions">
                        <option x-text="question"></option>
                    </template>
                </datalist>
            </div>

            <!-- FAQ Answer Display -->
            <div class="px-4 pb-4">
                <div class="p-3 bg-gray-50 border-l-4 border-blue-500 rounded-md text-gray-700" x-html="answer"></div>
            </div>
        </div>

    </div>


@endsection
