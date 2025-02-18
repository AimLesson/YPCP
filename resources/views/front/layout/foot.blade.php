{{-- 3rd option --}}
<footer class="bg-gray-100 text-black font-semibold uppercase py-8">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="flex flex-col items-center justify-between text-center md:flex-row md:text-left">
            
            <!-- Left Section (Profile Name & Motto) -->
            <div class="mb-6 md:mb-0">
                <h2 class="text-xl font-bold md:text-2xl">{{ $profile->name }}</h2>
                <p class="text-gray-800">Beriman, Berkarakter Kasih, Berwawasan Global</p>
            </div>

            <!-- Right Section (Address & Social Media) -->
            <div class="text-center md:text-right">
                <h2 class="text-xl font-bold md:text-2xl">Alamat Kami</h2>
                <p class="text-black">
                    {{ $profile->address }}
                </p>

                <!-- Social Media Icons with Custom Images -->
                <div class="mt-4 flex justify-center space-x-4 md:justify-end">
                    <a href="#" class="hover:opacity-75">
                        <img src="icons/facebook.png" alt="Facebook" class="w-6 h-6">
                    </a>
                    <a href="#" class="hover:opacity-75">
                        <img src="icons/instagram.png" alt="Instagram" class="w-6 h-6">
                    </a>
                    <a href="#" class="hover:opacity-75">
                        <img src="icons/tiktok.png" alt="Tiktok" class="w-6 h-6">
                    </a>
                    <a href="#" class="hover:opacity-75">
                        <img src="icons/youtube.png" alt="YouTube" class="w-6 h-6">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="mt-8 border-t border-gray-700 pt-4 text-center text-black uppercase font-semibold">
        @if (isset($profile))
            {{ date('Y') }} {{ $profile->name }}. All rights reserved.
        @elseif(isset($sekolah))
            {{ date('Y') }} {{ $sekolah->name }}. All rights reserved.
        @endif
    </div>
</footer>