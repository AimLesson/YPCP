@extends('front.layout.app')
@section('title', 'Home')
@section('content')
    <section>
      <div class="max-w-screen-4xl">
          <div id="static-carousel" class="relative" data-carousel="static">
              <!-- Carousel wrapper -->
              <div class="relative h-96 overflow-hidden md:h-[600px]">
                  <!-- Slide 0 -->
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                      <img src="{{ asset('storage/' . $sekolah->profile_bg) }}" class="absolute block w-full h-full object-cover object-top"
                          alt="Image 1">
                      <div class="absolute left-0 bottom-1/4 transform -translate-y-1/2 bg-white bg-opacity-75 p-4">
                          <h2 class="text-xl uppercase font-semibold text-gray-800">{{ $sekolah->name }}</h2>
                      </div>
                  </div>
                  <!-- Slide 1 -->
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                      <img src="{{ asset('storage/' . $sekolah->profile_banner1) }}" class="absolute block w-full h-full object-cover object-top"
                          alt="Image 1">
                  </div>
                  <!-- Slide 2 -->
                  <div class="hidden duration-700 ease-in-out" data-carousel-item>
                      <img src="{{ asset('storage/' . $sekolah->profile_banner2) }}" class="absolute block w-full h-full object-cover object-top"
                          alt="Image 2">
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

    {{-- Visi Misi --}}
    <section class="border-y-2 border-blue-300">
      <div class="py-2 sm:py-4 lg:py-6">
          <div class="mx-auto max-w-screen-md px-4 md:px-8">
              <p class="mb-2 text-center font-bold uppercase text-blue-600 md:mb-3 lg:text-2xl">Visi</p>
              <p class="bg-blue-500 rounded-lg tracking-wide p-4 text-center capitalize text-sm md:text-xl text-white md:mb-6">{!! str_replace(['<p>', '</p>'], '', $sekolah->visi) !!}
              </p>
          </div>
      </div>

      <div class="bg-white py-2 sm:py-4 lg:py-6">
          <div class="mx-auto max-w-screen-lg px-4 md:px-8">
              <p class="mb-2 text-center font-bold uppercase text-blue-500 md:mb-3 lg:text-2xl">Misi</p>
              <h2 class="bg-blue-500 prose rounded-lg p-4 tracking-wide mb-4 text-center capitalize text-sm md:text-xl text-white md:mb-6">{!! $sekolah->misi !!}
              </h2>
          </div>
      </div>
  </section>

    {{-- Berita --}}
    <section>
      <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Berita {{$sekolah->name}}</h2>
          </div>
      
          <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
            @foreach ( $sekolah->news as $n )
              <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                <a href={{ route('news.show', ['slug' => $n->slug, 'type' => 'sekolah']) }} class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                  <img src="{{ asset('storage/' . $n->image) }}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                </a>
        
                <div class="flex flex-1 flex-col p-4 sm:p-6">
                  <h2 class="mb-2 text-lg font-semibold text-gray-800">
                    <a href={{ route('news.show', ['slug' => $n->slug, 'type' => 'sekolah']) }} class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$n->title}}</a>
                  </h2>
        
                  <p class="mb-8 text-gray-500">{{ \Illuminate\Support\Str::limit(strip_tags($n->content), 100, '...') }}</p>
        
                  <div class="mt-auto flex items-end justify-between">
                    <div class="flex items-center gap-2">
                      <div class="h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gray-100">
                        <img src="https://images.unsplash.com/photo-1611898872015-0571a9e38375?auto=format&q=75&fit=crop&w=64" loading="lazy" alt="Photo by Brock Wegner" class="h-full w-full object-cover object-center" />
                      </div>
        
                      <div>
                        <span class="block text-indigo-500">{{$n->branch->name}}</span>
                        <span class="block text-sm text-gray-400">{{$n->created_at}}</span>
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
  
    {{-- Personalia --}}
    {{-- <div class="bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-xl px-4 md:px-8">
        <!-- text - start -->
        <div class="mb-10 md:mb-16">
          <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Tim {{ $sekolah->name}}</h2>
    
          <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Saling Berkolaborasi dan Bersinergi</p>
        </div>
        <!-- text - end -->
    
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 lg:gap-8">
          @foreach ($personalia as $person)
            <!-- person - start -->
            <div class="flex flex-col items-center rounded-lg bg-gray-100 p-4 lg:p-8">
                <div class="mb-2 h-24 w-24 overflow-hidden rounded-full bg-gray-200 shadow-lg md:mb-4 md:h-32 md:w-32">
                <img src="{{ asset('storage/' . $person->profile_picture) }}" loading="lazy" alt="Photo by Radu Florin" class="h-full w-full object-cover object-center" />
                </div>
        
                <div>
                <div class="text-center font-bold text-indigo-500 md:text-lg">{{$person->name}}</div>
                <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">{{$person->title}}</p>
                </div>
            </div>
            <!-- person - end -->
          @endforeach
        </div>
      </div>
    </div> --}}

@endsection