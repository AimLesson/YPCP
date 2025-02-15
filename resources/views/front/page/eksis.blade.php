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

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Heading --}}
                <div class="col-span-2">
                    <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">EKSPRESI SISWA</h2>
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Halaman ini menampilkan berbagai karya kreatif siswa Bruderan Karitas. Selamat menikmati dan teruslah berkarya!</p>
                </div>
                {{-- Berita --}}
                <div class="col-span-1">
                    <div class="bg-white py-6 sm:py-8 lg:py-12">
                        <div class="mx-auto max-w-screen-3xl px-4 md:px-8">
                            <div class="grid gap-4 sm:grid-cols-1 md:gap-6 lg:grid-cols-1 xl:grid-cols-1 xl:gap-8">
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
                </div>
            </div>
        </div>
    </div>
@endsection
