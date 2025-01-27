@extends('front.layout.app')
@section('title', 'Home')
@section('content')

    {{-- Hero --}}
    <section class="min-h-96 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden bg-gray-100 py-16 shadow-lg md:py-20 xl:py-48">
        <img src="{{ asset('storage/' . $profile->profile_bg) }}" loading="lazy" alt="Photo by Fakurian Design" class="absolute inset-0 h-full w-full object-cover object-center" />

        <div class="absolute inset-0 bg-gray-500 mix-blend-multiply"></div>

        <div class="mb-8 flex flex-wrap justify-between md:mb-16 top-12 z-10 px-4">
            <div class="mb-6 flex w-full flex-col justify-center sm:mb-12 lg:mb-0 lg:w-1/3 lg:pb-24 lg:pt-48">
              <h1 class="mb-4 text-4xl font-bold text-white sm:text-5xl md:mb-8 md:ms-8 md:text-6xl">{{ $profile->name }}</h1>
      
              <p class="max-w-md leading-relaxed text-gray-50 md:ms-8 xl:text-lg">{{ $profile->company_profile }}</p>
            </div>
      
            <div class="mb-12 flex w-full md:mb-16 lg:w-2/3">
              <div class="relative left-12 top-12 z-10 -ml-12 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:left-16 md:top-16 lg:ml-0">
                <img src="{{ asset('storage/' . $profile->profile_banner1) }}" loading="lazy" alt="Photo by Kaung Htet" class="h-full w-full object-cover object-center" />
              </div>
      
              <div class="overflow-hidden rounded-lg bg-gray-100 shadow-lg">
                <img src="{{ asset('storage/' . $profile->profile_banner1) }}" loading="lazy" alt="Photo by Manny Moreno" class="h-full w-full object-cover object-center" />
              </div>
            </div>
          </div>
    </section>

    {{-- Visi Misi --}}
    <section>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
              <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-2xl">Visi</p>
              <h2 class="mb-4 text-center text-xl font-bold text-gray-800 md:mb-6 lg:text-2xl">{!! str_replace(['<p>', '</p>'], '', $profile->visi) !!}</h2>
            </div>
          </div>

          <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
              <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-2xl">Misi</p>
              <h2 class="mb-4 text-center text-xl font-bold text-gray-800 md:mb-6 lg:text-2xl">{!! $profile->misi !!}</h2>
            </div>
          </div>
    </section>

    {{-- Sekolah --}}
    <section>
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <h2 id="school-section" class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl xl:mb-12">Sekolah</h2>
    
                <div class="mb-4 grid grid-cols-2 gap-4 sm:grid-cols-3 md:mb-8 md:grid-cols-5 md:gap-6 xl:gap-8">
                    @foreach($schools as $school)
                      <a href="{{ $school->url }}" class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                          <img src="{{ asset('storage/' . $school->logo) }}" loading="lazy" alt="{{ $school->name }}" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                          <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50"></div>
                          <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $school->name }}</span>
                      </a>
                    @endforeach
                </div>
    
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section>
      <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="mb-10 md:mb-16">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Berita {{$profile->name}}</h2>
          </div>
      
          <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
            @foreach ( $news as $n )
              <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                <a href="{{ route('news.show', $n->slug) }}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                  <img src="{{ asset('storage/' . $n->image) }}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                </a>
        
                <div class="flex flex-1 flex-col p-4 sm:p-6">
                  <h2 class="mb-2 text-lg font-semibold text-gray-800">
                    <a href="{{ route('news.show', $n->slug) }}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$n->title}}</a>
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
          <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Tim {{ $profile->name}}</h2>
    
          <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">Saling Berkolaborasi dan Bersinergi</p>
        </div>
        <!-- text - end -->
    
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 lg:gap-8">
          @foreach ($personalia as $person)
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
          <!-- person - start -->
        </div>
      </div>
    </div>

@endsection