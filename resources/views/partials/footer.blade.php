<footer>
    {{-- Footer for Mobile --}}
    <div class="flex flex-row lg:hidden justify-between mx-5 mb-2 pt-2 border-t border-custom-dark/40">
        <p class="font-league font-normal text-base text-custom-grey">
            ©2024 Kemudi.
        </p>
        <p class="font-league font-normal text-base text-custom-grey">
            All rights reserved.
        </p>
    </div>

    {{-- Footer for Desktop --}}
    <div class="hidden lg:flex lg:flex-col justify-between mx-[2rem] mb-4">
        <div class="flex flex-row">
            <div class="flex flex-col gap-5 w-1/2 pl-12 pr-36 pt-14 pb-10 border-y border-custom-dark/40">
                <img src="img/Logo-Hitam.svg" alt="" class="w-64">
                <p class="font-league text-lg/snug text-custom-dark">Sebuah platform untuk Penyedia Jasa Kursus Mengemudi dapat menawarkan jasanya kepada masyarakat umum. Platform untuk menjembatani Instruktur, Lembaga Kursus, dan Siswa Kursus</p>
            </div>
    
            <div class="flex flex-col gap-5 w-1/2">
                <div class="flex flex-row w-full">
                    <div class="flex flex-col w-1/2 border-b border-custom-dark/40">
                        @auth
                            @if (auth()->user()->role === 'user')
                                <a href="user-index" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                                    <p class="font-league font-medium text-2xl">Beranda</p>
                                </a>
                            @elseif (auth()->user()->role === 'instructor')
                                <a href="instructor-index" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                                    <p class="font-league font-medium text-2xl">Beranda</p>
                                </a>
                            @elseif (auth()->user()->role === 'admin')
                                <a href="admin-index" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                                    <p class="font-league font-medium text-2xl">Beranda</p>
                                </a>
                            @endif
                        @else
                            <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="tamu">Beranda</a></li>
                        @endauth
    
                        <a href="course-list" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                            <p class="font-league font-medium text-2xl">Kursus</p>
                        </a>

                        @auth
                            @if (auth()->user()->role === 'user')
                                <a href="user-profile" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                                    <p class="font-league font-medium text-2xl">Profil</p>
                                </a>
                            @elseif (auth()->user()->role === 'instructor')
                                <a href="instructor-profile" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                                    <p class="font-league font-medium text-2xl">Profil</p>
                                </a>
                            @elseif (auth()->user()->role === 'admin')
                                <a href="admin-profile" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                                    <p class="font-league font-medium text-2xl">Profil</p>
                                </a>
                            @endif
                        @else 
                            <a href="tamu-profile" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                                <p class="font-league font-medium text-2xl">Profil</p>
                            </a>
                        @endauth
                    </div>
                    <div class="flex flex-col w-1/2 border-b border-custom-dark/40">
                        <a href="about-app" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                            <p class="font-league font-medium text-2xl">Tentang Aplikasi</p>
                        </a>
    
                        <a href="contact-us" class="border-t border-l border-custom-dark/40 p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                            <p class="font-league font-medium text-2xl">Hubungi Kami</p>
                        </a>
    
                        @auth
                        <div class="border-t border-l border-custom-dark/40 text-custom-destructive p-8 cursor-pointer hover:bg-custom-destructive hover:text-custom-white duration-300" onclick="logoutConfirmation()">
                            <button type="submit" class="font-league font-medium text-2xl">Log Out</button>
                            <form action="/logout" method="post" class="mb-0 hidden">
                                @csrf
                            </form>
                        </div>
                        @else
                        <a href="/login" class="border-t border-l border-custom-dark/40 text-custom-green p-8 cursor-pointer hover:bg-custom-green hover:text-custom-white duration-300">
                            <p class="font-league font-medium text-2xl">Login</p>
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-between pt-2">
            <p class="font-league font-normal text-base text-custom-grey">
                ©2024 Kemudi.
            </p>
            <p class="font-league font-normal text-base text-custom-grey">
                All rights reserved.
            </p>
        </div>
    </div>
</footer>