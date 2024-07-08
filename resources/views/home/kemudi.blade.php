@extends('layouts.dark-main')

@section('content')
    {{-- Logout --}}
    <form action="/logout" method="post" id="logout-form" class="hidden">
        @csrf
    </form>
    <button onclick="document.getElementById('logout-form').submit();" class="absolute right-16 inline-flex items-center justify-center gap-4 text-custom-white p-3 opacity-30 hover:opacity-100 hover:bg-custom-destructive/70 duration-300 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12.75 11a.75.75 0 0 0-1.5 0v2a.75.75 0 0 0 1.5 0z"/><path fill="#EBF0F2" fill-rule="evenodd" d="m13.725 2.027l2.434.406c1.155.192 2.092.348 2.824.566c.763.228 1.393.546 1.878 1.118c.485.573.696 1.247.794 2.037c.095.758.095 1.708.095 2.88v5.933c0 1.171 0 2.12-.095 2.879c-.098.79-.309 1.464-.794 2.037c-.485.572-1.115.89-1.878 1.117c-.732.219-1.669.375-2.824.567l-2.434.406c-1.033.172-1.888.315-2.57.331c-.716.017-1.379-.098-1.933-.567c-.467-.395-.698-.91-.82-1.487h-.456c-1.132 0-2.058 0-2.79-.098c-.763-.103-1.425-.325-1.954-.854c-.529-.529-.751-1.19-.854-1.955c-.098-.73-.098-1.656-.098-2.79V9.447c0-1.133 0-2.058.098-2.79c.103-.763.325-1.425.854-1.954c.529-.529 1.19-.751 1.955-.854c.73-.098 1.656-.098 2.79-.098h.456c.12-.577.352-1.092.82-1.487c.553-.47 1.216-.584 1.932-.567c.682.016 1.537.159 2.57.331M8.25 17.335c0 .516 0 .988.011 1.415H8c-1.2 0-2.024-.002-2.643-.085c-.598-.08-.89-.224-1.094-.428c-.204-.203-.348-.496-.428-1.094c-.083-.619-.085-1.443-.085-2.643v-5c0-1.2.002-2.024.085-2.643c.08-.598.224-.89.428-1.094c.203-.204.496-.348 1.094-.428C5.976 5.252 6.8 5.25 8 5.25h.261c-.011.427-.011.899-.011 1.415zm2.869-14.14c-.543-.013-.773.082-.927.212c-.154.13-.285.342-.361.88c-.08.557-.081 1.316-.081 2.435v10.556c0 1.119.002 1.878.081 2.436c.076.537.207.749.361.879s.384.224.927.211c.563-.013 1.312-.136 2.415-.32l2.33-.388c1.215-.203 2.059-.345 2.691-.533c.612-.182.936-.384 1.162-.65c.226-.267.37-.619.45-1.253c.082-.654.083-1.51.083-2.743V9.083c0-1.233-.001-2.089-.083-2.743c-.08-.634-.225-.987-.45-1.253c-.226-.266-.55-.468-1.162-.65c-.632-.188-1.476-.33-2.692-.533l-2.329-.388c-1.103-.184-1.852-.307-2.415-.32" clip-rule="evenodd"/></svg>
        <p class="text-base/tight font-light">Logout</p>
    </button>
    {{-- Tabs --}}
    <div class="px-16 mt-8">
        <ul class="flex justify-center gap-8 font-league text-custom-white text-lg font-medium text-center">
            {{-- User Management --}}
            <li class="hover:bg-custom-grey/30 rounded-lg duration-300">
                <a href="#" class="tab-link inline-flex items-center justify-center gap-4 p-4 border-b-2 border-custom-green opacity-100" data-tab="users">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><g fill="none" stroke="#EBF0F2" stroke-width="1.5"><circle cx="12" cy="6" r="4"/><path stroke-linecap="round" d="M18 9c1.657 0 3-1.12 3-2.5S19.657 4 18 4M6 9C4.343 9 3 7.88 3 6.5S4.343 4 6 4"/><ellipse cx="12" cy="17" rx="6" ry="4"/><path stroke-linecap="round" d="M20 19c1.754-.385 3-1.359 3-2.5s-1.246-2.115-3-2.5M4 19c-1.754-.385-3-1.359-3-2.5s1.246-2.115 3-2.5"/></g></svg>
                    <p class="text-lg">Users</p>
                </a>
            </li>
            {{-- Driving School License --}}
            <li class="hover:bg-custom-grey/30 rounded-lg duration-300">
                <a href="#" class="tab-link inline-flex items-center justify-center gap-4 p-4 opacity-40" data-tab="licenses">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><g fill="none" stroke="#EBF0F2" stroke-width="1.5"><path d="m18.18 8.04l.463-.464a1.966 1.966 0 1 1 2.781 2.78l-.463.464M18.18 8.04s.058.984.927 1.853s1.854.927 1.854.927M18.18 8.04l-4.26 4.26c-.29.288-.434.433-.558.592c-.146.188-.271.39-.374.606c-.087.182-.151.375-.28.762l-.413 1.24l-.134.401m8.8-5.081l-4.26 4.26c-.29.29-.434.434-.593.558c-.188.146-.39.271-.606.374c-.182.087-.375.151-.762.28l-1.24.413l-.401.134m0 0l-.401.134a.53.53 0 0 1-.67-.67l.133-.402m.938.938l-.938-.938"/><path stroke-linecap="round" d="M8 13h2.5M8 9h6.5M8 17h1.5M19.828 3.172C18.657 2 16.771 2 13 2h-2C7.229 2 5.343 2 4.172 3.172C3 4.343 3 6.229 3 10v4c0 3.771 0 5.657 1.172 6.828C5.343 22 7.229 22 11 22h2c3.771 0 5.657 0 6.828-1.172c.944-.943 1.127-2.348 1.163-4.828"/></g></svg>
                    <p class="text-lg">Licenses</p>
                </a>
            </li>
        </ul>
    </div>
    
    {{-- Users List --}}
    <div id="users-content" class="mt-6 px-5 text-custom-white">
        <h1 class="font-encode font-medium text-2xl lg:text-3xl">Daftar Users</h1>

        {{-- Table Headings --}}
        <div class="p-2 mt-6 border-b border-custom-secondary">
            <div class="grid grid-cols-12 gap-4">
                <h2 class="font-league font-medium text-center text-xl">ID</h2>
                <h2 class="col-span-4 font-league font-medium line-clamp-3 text-xl">Nama Lengkap</h2>
                <h2 class="col-span-3 font-league font-medium line-clamp-3 text-xl">Username</h2>
                <h2 class="col-span-2 font-league font-medium text-xl">Peran</h2>
                <h2 class="col-span-2 font-league font-medium text-xl text-center">Aksi</h2>
            </div>
        </div>

        {{-- Table Contents --}}
        @foreach($users as $user)
        <div class="px-2 py-4 border-b border-custom-secondary">
            <div class="grid grid-cols-12 gap-4">
                <p class="font-league font-light text-center text-lg">{{ $user->id }}</p>
                <p class="col-span-4 font-league font-light line-clamp-3 text-lg">{{ $user->fullname }}</p>
                <p class="col-span-3 italic font-league font-light line-clamp-3 text-lg">{{ $user->username }}</p>
                <p class="col-span-2 font-league font-light text-lg">{{ $user->role }}</p>
                <div class="col-span-2 font-league font-medium text-xl text-center">
                    <a href="" class="p-3 border border-custom-grey text-base rounded">Reset Password</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Licenses List --}}
    <div id="licenses-content" class="mt-6 px-5 text-custom-white hidden">
        <h1 class="font-encode font-medium text-2xl lg:text-3xl">Dokumen Izin Penyelenggaraan Kursus</h1>

        {{-- Table Headings --}}
        <div class="p-2 mt-6 border-b border-custom-secondary">
            <div class="grid grid-cols-12 gap-4">
                <h2 class="font-league font-medium text-center text-xl">ID</h2>
                <h2 class="col-span-4 font-league font-medium line-clamp-3 text-xl">Nama Lengkap</h2>
                <h2 class="col-span-3 font-league font-medium line-clamp-3 text-xl">Username</h2>
                <h2 class="col-span-2 font-league font-medium text-xl">Peran</h2>
                <h2 class="col-span-2 font-league font-medium text-xl text-center">Aksi</h2>
            </div>
        </div>

        {{-- Table Contents --}}
    </div>

    {{-- jQuery JS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.tab-link').on('click', function(e) {
                e.preventDefault();
                var tabId = $(this).data('tab');

                // Hide all contents
                $('[id$="-content"]').addClass('hidden');

                // Show the selected content
                $('#' + tabId + '-content').removeClass('hidden');

                // Update active tab styles
                $('.tab-link').removeClass('border-b-2 border-custom-green opacity-100').addClass('opacity-40');
                $(this).removeClass('opacity-40').addClass('border-b-2 border-custom-green opacity-100');
            });
        });
    </script>
@endsection