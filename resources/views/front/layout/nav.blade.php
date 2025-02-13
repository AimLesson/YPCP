<header>
    <div class="bg-white">
        <!-- banner - start -->
        <div class="bg-blue-500">
            <div class="relative flex flex-wrap px-4 py-2 sm:flex-nowrap sm:items-center sm:justify-between md:mx-auto md:max-w-screen-xl sm:gap-3 sm:pr-8 md:px-8">
                <div class="order-1 mb-2 inline-block w-11/12 max-w-screen-sm text-left items-left text-sm text-white sm:order-none sm:mb-0 sm:w-auto md:text-base flex space-x-4">
                  <p>Phone: 0812345678</p>
                  <p>|</p>
                  <p>Email: admin@bruderanpwt.sch.id</p>
                </div>
            
                <a href="/" class="order-last inline-block w-full whitespace-nowrap rounded-lg bg-amber-500 px-4 py-2 text-center text-xs font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-700 focus-visible:ring active:bg-indigo-800 sm:order-none sm:w-auto md:text-sm">PPDB</a>
              </div>
        </div>
        <!-- banner - end -->
      </div>
    <nav class="bg-white px-2 lg:px-4 py-0.5 max-w-screen-2xl mx-auto">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                @if(isset($profile))
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('storage/' . $profile->logo) }}" class="mr-3 h-9 sm:h-20" alt="Logo {{ $profile->name }}" />
                        <span class="self-center uppercase text-md md:text-xl font-semibold whitespace-nowrap">{{ $profile->name }}</span>
                    </a>
                @elseif(isset($sekolah))
                    <a href="{{ route('sekolah.show', $sekolah->slug) }}" class="flex items-center">
                        <img src="{{ asset('storage/' . $sekolah->logo) }}" class="mr-3 h-9 sm:h-20" alt="Logo {{ $sekolah->name }}" />
                        <span class="self-center uppercase text text-md md:text-xl font-semibold whitespace-nowrap">{{ $sekolah->name }}</span>
                    </a>
                @endif
            <div class="flex items-center lg:order-1">
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        @if(isset($profile))
                            <a href="/" class="block uppercase font-semibold py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 md:hover:text-blue-700 hover:bg-blue-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 ">Home</a>
                        @elseif(isset($sekolah))
                            <a href="{{ route('sekolah.show', $sekolah->slug) }}" class="block uppercase font-semibold py-2 md:hover:text-blue-700 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-blue-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 ">Home</a>
                        @endif
                    </li>
                    <li>
                        @if(isset($profile))
                            <a href="{{ route('about') }}" class="block uppercase font-semibold py-2 pr-4 pl-3 text-gray-700 border-b md:hover:text-blue-700 border-gray-100 hover:bg-blue-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">
                                About Us
                            </a>
                        @elseif(isset($sekolah))
                            <a href="{{ route('about', ['slug' => $sekolah->slug]) }}" class="block uppercase font-semibold py-2 pr-4 pl-3 md:hover:text-blue-700 text-gray-700 border-b border-gray-100 hover:bg-blue-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">
                                About Us
                            </a>                        
                        @endif
                    </li>
                    <li>
                        <a href="/" class="block uppercase font-semibold md:hover:text-blue-700 py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-blue-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 ">Yayasan</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center uppercase font-semibold justify-between w-full py-2 px-3 text-gray-700 rounded-sm hover:bg-blue-400 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto"> 
                            Sekolah
                        </button>
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-55">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                @foreach ($schools as $sekolah)
                                    <li>
                                        <a href="{{ route('sekolah.show', $sekolah->slug) }}" class="block uppercase font-semibold px-4 py-2 hover:bg-blue-400">
                                            {{ $sekolah->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>                        
                    </li>
                    <li>
                        <a href="/" class="block py-2 pr-4 pl-3 text-gray-700 border-b md:hover:text-blue-700 uppercase font-semibold border-gray-100 hover:bg-blue-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 ">Berita</a>
                    </li>
                    <li>
                        <a href="/" class="block py-2 pr-4 pl-3 text-gray-700 border-b uppercase md:hover:text-blue-700 font-semibold border-gray-100 hover:bg-blue-400 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 ">PPDB</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>