@extends('front.layout.app')
@section('title', 'Home')
@section('content')

    {{-- Hero --}}
    <section class="min-h-96 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden bg-gray-100 py-16 shadow-lg md:py-20 xl:py-48">
        <img src="{{ asset('storage/' . $sekolah->profile_bg) }}" loading="lazy" alt="Photo by Fakurian Design" class="absolute inset-0 h-full w-full object-cover object-center" />

        <div class="absolute inset-0 bg-gray-500 mix-blend-multiply"></div>

        <div class="mb-8 flex flex-wrap justify-between md:mb-16 top-12 z-10 px-4">
            <div class="mb-6 flex w-full flex-col justify-center sm:mb-12 lg:mb-0 lg:w-1/3 lg:pb-24 lg:pt-48">
              <h1 class="mb-4 text-4xl font-bold text-white sm:text-5xl md:mb-8 md:ms-8 md:text-6xl">{{ $sekolah->name }}</h1>
      
              <p class="max-w-md leading-relaxed text-gray-50 md:ms-8 xl:text-lg">{{ \Illuminate\Support\Str::limit(strip_tags($sekolah->company_profile), 100, '...') }}</p>
            </div>
      
            <div class="mb-12 flex w-full md:mb-16 lg:w-2/3">
              <div class="relative left-12 top-12 z-10 -ml-12 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:left-16 md:top-16 lg:ml-0">
                <img src="{{ asset('storage/' . $sekolah->profile_banner1) }}" loading="lazy" alt="Photo by Kaung Htet" 
                  class="h-[300px] max-h-[400px] w-full object-contain object-center" />
              </div>
            
              <div class="overflow-hidden rounded-lg bg-gray-100 shadow-lg">
                <img src="{{ asset('storage/' . $sekolah->profile_banner2) }}" loading="lazy" alt="Photo by Manny Moreno" 
                  class="h-[300px] max-h-[400px] w-full object-contain object-center" />
              </div>
            </div> 
            
            <div class="relative w-full max-w-4xl mx-auto overflow-hidden">
              <div class="flex w-[500%] animate-scroll">
                <img src="{{ asset('default.jpeg') }}" class="w-1/5 h-[300px] object-contain" alt="Image 1">
                <img src="{{ asset('default.jpeg') }}" class="w-1/5 h-[300px] object-contain" alt="Image 2">
                <img src="{{ asset('default.jpeg') }}" class="w-1/5 h-[300px] object-contain" alt="Image 3">
                <img src="{{ asset('default.jpeg') }}" class="w-1/5 h-[300px] object-contain" alt="Image 4">
                <img src="{{ asset('default.jpeg') }}" class="w-1/5 h-[300px] object-contain" alt="Image 5">
              </div>
            </div>
          </div>
    </section>

    {{-- Visi Misi --}}
    <section>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
              <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-2xl">Visi</p>
              <h2 class="mb-4 text-center text-xl font-bold text-gray-800 md:mb-6 lg:text-2xl">{!! str_replace(['<p>', '</p>'], '', $sekolah->visi) !!}</h2>
            </div>
          </div>

          <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
              <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-2xl">Misi</p>
              <h2 class="mb-4 text-center text-xl font-bold text-gray-800 md:mb-6 lg:text-2xl">{!! $sekolah->misi !!}</h2>
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
    <div class="bg-white py-6 sm:py-8 lg:py-12">
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
    </div>

@endsection