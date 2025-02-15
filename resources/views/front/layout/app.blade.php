<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yayasan Pius')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JMVE7PRCWP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-JMVE7PRCWP');
    </script>


    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('faqChat', () => ({
                open: false,
                selectedQuestion: "",
                answer: "",
                questions: {
                    "Kapan pendaftaran siswa baru dibuka?": "Pendaftaran siswa baru Sekolah Bruderan dan Sekolah Karitas dibuka mulai November 2024 hingga Juni 2025. Informasi lebih lanjut dapat dilihat di halaman PPDB atau dengan menghubungi kontak sekolah.",
                    "Apa saja syarat pendaftaran siswa baru?": "Syarat pendaftaran meliputi: <br>- Fotokopi akta kelahiran<br>- Fotokopi Kartu Keluarga (KK)<br>- Pas foto ukuran 3x4 sebanyak 2 lembar<br>- Fotokopi rapor terakhir<br>- Surat keterangan dari sekolah sebelumnya (jika ada).",
                    "Bagaimana cara mendaftar?": "Pendaftaran dapat dilakukan dengan dua cara:<br>1. Online melalui website resmi Sekolah Bruderan dan Sekolah Karitas di menu PPDB.<br>2. Offline dengan datang langsung ke sekolah tujuan dan mengisi formulir pendaftaran.",
                    "Apakah ada tes seleksi untuk calon siswa?": "Ya, seleksi meliputi tes akademik, wawancara, dan observasi minat serta bakat. Detail jadwal tes akan diinformasikan setelah pendaftaran.",
                    "Apakah ada program beasiswa?": "Sekolah Bruderan dan Sekolah Karitas menyediakan beberapa program beasiswa bagi siswa berprestasi dan yang membutuhkan. Informasi lebih lanjut dapat diperoleh di bagian administrasi sekolah.",
                    "Apa saja fasilitas yang tersedia di sekolah?": "Sekolah Bruderan dan Sekolah Karitas memiliki fasilitas lengkap seperti ruang kelas multimedia, laboratorium komputer dan sains, perpustakaan modern, lapangan olahraga voli, basket, dan badminton, kantin sehat, serta area bermain dan ruang seni.",
                    "Bagaimana cara mendapatkan update terbaru dari sekolah?": "Anda bisa mengikuti media sosial kami di Instagram, YouTube, atau berlangganan newsletter melalui website sekolah."
                },
                checkAnswer() {
                    this.answer = this.questions[this.selectedQuestion] || "Apabila Jawaban Tidak muncul silahkan kontak link WhatsApp berikut :  https://wa.me/6283822646645";
                }
            }));
        });
      </script>
    <style>
        /* Keyframes for slow reveal animation */
        @keyframes slowReveal {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation class */
        .animate-slow-reveal {
            animation: slowReveal 1s ease-out;
        }
    </style>
</head>
<body>
    @include('front.layout.nav')

    <main class="animate-slow-reveal">
        @yield('content')
    </main>

    @include('front.layout.foot')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>