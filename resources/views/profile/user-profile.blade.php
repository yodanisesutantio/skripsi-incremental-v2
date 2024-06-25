@extends('layouts.main')

@include('partials.navbar')

@section('content')
    {{-- Profile Information --}}
    <div class="flex flex-col items-center w-full">
        <div class="profile-header flex flex-col lg:flex-row gap-3 lg:gap-10 w-full items-center lg:justify-center">
            <img src="img/jane-doe.jpg" alt="" class="w-20 lg:w-32 h-20 lg:h-32 rounded-full">
            <div class="text-content text-center lg:text-left flex flex-col gap-1 lg:gap-2 w-full lg:w-[24rem] px-12 lg:px-0">
                <h1 class="font-encode font-semibold text-2xl lg:text-4xl">{{ auth()->user()->fullname }}, {{ auth()->user()->age }}</h1>
                <i class="font-league text-lg/tight lg:text-xl/tight">“{{ auth()->user()->description }}”</i>
            </div>
        </div>

        {{-- Menu for Mobile --}}
        <div class="flex flex-col lg:hidden w-full px-5 my-6 lg:mt-12 text-custom-white gap-3">
            <div class="flex flex-row gap-3 h-[252px] lg:h-[332px]">
                <a href="edit-user-profile" class="w-1/2 h-full bg-cover bg-center rounded-xl lg:cursor-pointer" style="background-image: url('img/edit-profile.jpg')">
                    <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/10 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                        <h2 class="text-lg/snug lg:text-2xl/[2rem] font-semibold">Ubah Profil</h2>
                        <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Perbarui informasi personal anda</p>
                    </div>
                </a>

                <div class="flex flex-col gap-3 w-1/2">
                    <a href="user-course-details" class="w-full h-[120px] lg:h-[160px] bg-cover bg-center rounded-xl lg:cursor-pointer" style="background-image: url('img/BG-Class-4.jpg')">
                        <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/10 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                            <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Kursus Saya</h2>
                            <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Lacak progress anda di setiap pertemuan</p>
                        </div>
                    </a>
                    <a href="course-history" class="w-full h-[120px] lg:h-[160px] bg-cover bg-center rounded-xl lg:cursor-pointer" style="background-image: url('img/past-course.jpg')">
                        <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/10 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                            <h2 class="text-lg/snug lg:text-2xl/[1.75rem] font-semibold">Riwayat Kursus</h2>
                            <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Cari kursus yang pernah anda ikuti</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex flex-row gap-3">
                <a href="about-app" class="w-full h-20 lg:h-24 bg-cover bg-center rounded-xl lg:cursor-pointer" style="background-image: url('img/about-app.jpg');">
                    <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/30 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                        <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Tentang Aplikasi</h2>
                        <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Informasi tentang kami</p>
                    </div>
                </a>
                <a href="contact-us" class="w-full h-20 lg:h-24 bg-cover bg-center rounded-xl lg:cursor-pointer" style="background-image: url('img/contact-us.jpg');">
                    <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/30 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                        <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Hubungi Kami</h2>
                        <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Laporkan masalah</p>
                    </div>
                </a>
            </div>

            <a href="new-driving-school" class="w-full h-20 lg:h-24 bg-cover bg-center rounded-xl lg:cursor-pointer" style="background-image: url('img/add-driving-school.jpg');">
                <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/30 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                    <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Ingin jadi instruktur?</h2>
                    <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Klik disini untuk mengetahui persyaratan & ketentuannya</p>
                </div>
            </a>            
        </div>
    </div>

    {{-- Menu for Large Screen --}}
    <div class="hidden lg:flex lg:flex-row w-full h-[350px] px-5 lg:px-8 mt-6 lg:my-12 text-custom-white gap-3">
        <a href="edit-user-profile" class="bg-cover bg-center lg:w-1/5 rounded-xl lg:cursor-pointer" style="background-image: url('img/edit-profile.jpg')">
            <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/10 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                <h2 class="text-lg/snug lg:text-2xl/[2rem] font-semibold">Ubah Profil</h2>
                <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Perbarui informasi personal anda</p>
            </div>
        </a>

        <div class="lg:flex lg:flex-col lg:w-2/5 gap-3">
            <a href="user-course-details" class="bg-cover bg-center w-full h-full rounded-xl lg:cursor-pointer" style="background-image: url('img/BG-Class-4.jpg')">
                <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/25 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                    <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Kursus Saya</h2>
                    <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Lacak progress anda di setiap pertemuan</p>
                </div>
            </a>
            <a href="course-history" class="bg-cover bg-center w-full h-full rounded-xl lg:cursor-pointer" style="background-image: url('img/past-course.jpg')">
                <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/25 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                    <h2 class="text-lg/snug lg:text-2xl/[1.75rem] font-semibold">Riwayat Kursus</h2>
                    <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Cari kursus yang pernah anda ikuti</p>
                </div>
            </a>
        </div>

        <div class="lg:flex lg:flex-col lg:w-2/5 gap-3">
            <div class="lg:flex lg:flex-row w-full h-full gap-3">
                <a href="about-app" class="bg-cover bg-center w-full h-full rounded-xl lg:cursor-pointer" style="background-image: url('img/about-app.jpg');">
                    <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/30 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                        <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Tentang Aplikasi</h2>
                        <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Informasi tentang kami</p>
                    </div>
                </a>
                <a href="contact-us" class="bg-cover bg-center w-full h-full rounded-xl lg:cursor-pointer" style="background-image: url('img/contact-us.jpg');">
                    <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/30 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                        <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Hubungi Kami</h2>
                        <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Laporkan masalah</p>
                    </div>
                </a>
            </div>

            <a href="new-driving-school" class="bg-cover bg-center w-full h-full rounded-xl lg:cursor-pointer" style="background-image: url('img/add-driving-school.jpg');">
                <div class="flex flex-col justify-end p-[10px] bg-gradient-to-t from-custom-dark/80 from-15% to-custom-dark/30 to-70% font-league w-full h-full rounded-xl lg:hover:bg-custom-dark-low lg:hover:transition-colors lg:duration-500">
                    <h2 class="text-lg/snug lg:text-2xl/[1.5rem] font-semibold">Ingin jadi instruktur?</h2>
                    <p class="text-sm/none lg:text-base/[1.35rem] text-custom-white font-light">Klik disini untuk mengetahui persyaratan & ketentuannya</p>
                </div>
            </a>
        </div>
    </div>

    <div class="mt-4">
        @include('partials.footer')
    </div>
@endsection