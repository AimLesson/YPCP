@extends('front.layout.app')
@section('title', 'Home')
    @section('content')
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="rounded-lg bg-gray-100 px-4 py-6 md:py-8 lg:py-12">
            <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
      
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{$profile->name}}</h2>
      
            <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">{{ \Illuminate\Support\Str::limit(strip_tags($profile->about), 100, '...') }}</p>
          </div>
        </div>
      </div>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-xl px-4 md:px-8">
        <div class="grid gap-8 md:grid-cols-2 lg:gap-12">
            <div>
            <div class="h-64 overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-auto">
                <img src="{{ asset('storage/' . $profile->logo) }}" loading="lazy" alt="Photo by Martin Sanchez" class="h-full w-full object-cover object-center" />
            </div>
            </div>
    
            <div class="md:pt-8">  
                <h1 class="mb-4 text-center text-2xl font-bold text-indigo-500 sm:text-3xl md:mb-6 md:text-left">About Us</h1>
        
                @if (!empty($profile) && !empty($profile->about))
                    <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                        {{ \Illuminate\Support\Str::limit(strip_tags($profile->about), 200, '...') }}
                    </p>
                @else
                    <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                        No additional information available about this profile.
                    </p>
                @endif
            
            </div>
        </div>
        </div>
    </div>

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