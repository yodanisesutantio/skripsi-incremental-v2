<header class="z-50 bg-custom-white sticky top-0">
    <div class="flex flex-row pt-8 pb-3 px-5 lg:px-[4.25rem] mb-4 justify-between">
        <div class="burger" onclick="openNav()">
            <svg id="originalSvg" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="#040B0D" stroke-linecap="round" stroke-width="1.5" d="M20 7H4m11 5H4m5 5H4"/></svg>
            <svg id="newSvg" class="cursor-pointer hidden" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 256 256"><path fill="#040B0D" d="M205.66 194.34a8 8 0 0 1-11.32 11.32L128 139.31l-66.34 66.35a8 8 0 0 1-11.32-11.32L116.69 128L50.34 61.66a8 8 0 0 1 11.32-11.32L128 116.69l66.34-66.35a8 8 0 0 1 11.32 11.32L139.31 128Z"/></svg>

            <div class="hidden">
                <div class="flex flex-col absolute w-[calc(100%-2.5rem)] lg:w-[calc(100%-8.5rem)] top-20 p-2 shadow-lg shadow-custom-grey bg-custom-white-hover border border-custom-green backdrop-blur-sm rounded-xl">
                    <ul>
                        @auth
                            @if (auth()->user()->role === 'user')
                                <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="user-index">Beranda</a></li>
                            @elseif (auth()->user()->role === 'instructor')
                                <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="instructor-index">Beranda</a></li>
                            @elseif (auth()->user()->role === 'admin')
                                <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="admin-index">Beranda</a></li>
                            @endif
                        @else
                            <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="tamu">Beranda</a></li>
                        @endauth
                        <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="course-list">Kursus</a></li>
                        @auth
                            @if (auth()->user()->role === 'user')
                                <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="user-profile">Profil</a></li>
                            @elseif (auth()->user()->role === 'instructor')
                                <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="instructor-profile">Profil</a></li>
                            @elseif (auth()->user()->role === 'admin')
                                <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="admin-profile">Profil</a></li>
                            @endif
                        @else
                            <li class="p-3 text-custom-green font-bold lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="/login">Beranda</a></li>
                        @endauth
                        <li class="p-3 text-custom-green font-bold lg:text-xl"><a href=""><hr class="border-custom-grey border-opacity-35"></a></li>
                        @auth
                            <li class="lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item">
                                <form action="/logout" method="post" class="mb-1">
                                    @csrf
                                    <button type="submit" class="w-full text-left p-3 text-custom-destructive font-semibold">Log Out</button>
                                </form>
                            </li>
                        @else
                            <li class="mb-1 p-3 lg:text-xl hover:bg-custom-dark/10 cursor-pointer nav-item"><a href="/login" class="text-custom-green font-semibold">Login</a></li>
                        @endauth
                    </ul>                    
                </div>
            </div>
        </div>
        <svg class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><g fill="none" stroke="#040B0D" stroke-width="1.5"><circle cx="11.5" cy="11.5" r="9.5"/><path stroke-linecap="round" d="M18.5 18.5L22 22"/></g></svg>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    const $header = $('header');
    const threshold = 30;

    $(window).on('scroll', function () {
        const scrolled = $(this).scrollTop();
        if (scrolled > threshold) {
            $header.addClass('shadow-xl');
        } else {
            $header.removeClass('shadow-xl');
        }
    });

    const $navContainer = $('.hidden');

    function openNav() {
        const $originalSvg = $('#originalSvg');
        const $newSvg = $('#newSvg');

        $originalSvg.toggle();
        $newSvg.toggle();

        $originalSvg.toggleClass('hidden');
        $newSvg.toggleClass('hidden');
        $navContainer.toggleClass('hidden');
    }

    const $navItems = $('.nav-item');

    function checkActiveRoutes() {
        const currentRoute = window.location.pathname.split('/').pop();
        $navItems.each(function () {
            const $link = $(this);
            $link.removeClass('text-custom-green font-bold').addClass('text-custom-dark');

            if ($link.find('a').attr('href').toLowerCase().endsWith(currentRoute)) {
                $link.addClass('text-custom-green font-bold');
            }
        });
    }
    checkActiveRoutes();
</script>