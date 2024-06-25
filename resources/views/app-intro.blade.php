@extends('layouts.no-padding')

@section('content')
    <div class="swiper w-screen h-screen">
        <div class="swiper-wrapper">
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('img/BG-Image-Landing.webp')">
                <div class="flex flex-col items-center justify-center px-5 lg:px-60 lg:pb-12 gap-3 bg-custom-dark-overlay backdrop-blur-sm h-screen">
                    <h1 class="text-center text-3xl/snug lg:text-5xl/snug text-custom-white font-encode font-semibold">Selamat Datang !</h1>
                    <p class="text-center text-lg lg:text-2xl text-custom-white font-league font-light">Terima kasih sudah memilih kami. Sebentar lagi kami akan memperkenalkan anda tentang fitur-fitur layanan kami.</p>
                </div>                  
            </div>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('img/BG-Intro-1.webp')">
                <div class="flex flex-col items-center justify-center px-5 lg:px-60 lg:pb-12 gap-3 bg-custom-dark-overlay backdrop-blur-sm h-screen">
                    <h1 class="text-center text-3xl/snug lg:text-5xl/snug text-custom-white font-encode font-semibold">Instruktur yang ahli</h1>
                    <p class="text-center text-lg lg:text-2xl text-custom-white font-league font-light">Anda akan diarahkan oleh para instruktur yang berpengalaman dan terampil yang dapat membuat anda mengemudi dengan lebih aman dan nyaman.</p>
                </div>                  
            </div>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('img/BG-Intro-2.webp')">
                <div class="flex flex-col items-center justify-center px-5 lg:px-60 lg:pb-12 gap-3 bg-custom-dark-overlay backdrop-blur-sm h-screen">
                    <h1 class="text-center text-3xl/snug lg:text-5xl/snug text-custom-white font-encode font-semibold">Sesuaikan jadwal anda</h1>
                    <p class="text-center text-lg lg:text-2xl text-custom-white font-league font-light">Anda dapat memilih jadwal sesuai dengan keinginan anda, selain itu, anda dapat mengubahnya jika tiba-tiba anda tidak dapat hadir.</p>
                </div>                  
            </div>
            <div class="swiper-slide bg-cover bg-center" style="background-image: url('img/BG-Intro-3.webp')">
                <div class="flex flex-col items-center justify-center px-5 lg:px-60 lg:pb-12 gap-3 bg-custom-dark-overlay backdrop-blur-sm h-screen">
                    <h1 class="text-center text-3xl/snug lg:text-5xl/snug text-custom-white font-encode font-semibold">Transparansi Biaya</h1>
                    <p class="text-center text-lg lg:text-2xl text-custom-white font-league font-light">Anda dapat membandingkan biaya atas jasa yang ditawarkan oleh instruktur dan keuntungan apa saja yang bisa anda dapatkan.</p>
                </div>                  
            </div>
        </div>

        <div class="font-league nav-button fixed bottom-5 z-40 flex flex-row w-full justify-between px-5 lg:px-60">
            <div class="prev-slide opacity-0 w-[136px] lg:w-40 py-3 lg:py-3 rounded-lg bg-custom-dark text-center lg:text-lg text-custom-white font-semibold lg:order-1 hover:bg-custom-dark-hover duration-500">Kembali</div>
            <div class="next-slide w-[136px] lg:w-40 py-3 lg:py-3 rounded-lg bg-custom-white text-center lg:text-lg text-custom-dark font-semibold lg:order-2 hover:bg-custom-white-hover duration-500">Lanjut</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var swiper = new Swiper(".swiper", {          
                effect: "creative",
                creativeEffect: {
                    prev: {
                    shadow: true,
                    translate: ["-20%", 0, -1],
                    },
                    next: {
                    translate: ["100%", 0, 0],
                    },
                },
                navigation: {
                    nextEl: ".next-slide",
                    prevEl: ".prev-slide",
                },

                on: {
                    slideChange: function (swiper) {
                        if (swiper.activeIndex === 0) {
                            $(".prev-slide").addClass("opacity-0");
                        } else {
                            $(".prev-slide").removeClass("opacity-0");
                        }

                        if (swiper.isEnd) {
                            $(".next-slide").on("click", function() {
                            window.location.href = "/user-home";
                            });
                        } else {
                            $(".next-slide").off("click");
                        }
                    }
                },
            });
        })
    </script>
@endsection