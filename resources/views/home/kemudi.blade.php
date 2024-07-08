@extends('layouts.dark-main')

@section('content')
    {{-- Tabs --}}
    <div class="px-16 mt-8">
        <ul class="flex justify-center gap-8 font-league text-custom-white text-lg font-medium text-center">
            {{-- User Management --}}
            <li class="hover:bg-custom-grey/30 rounded-lg duration-300">
                <a href="#" class="inline-flex items-center justify-center gap-4 p-4 border-b-2 border-custom-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><g fill="none" stroke="#EBF0F2" stroke-width="1.5"><circle cx="12" cy="6" r="4"/><path stroke-linecap="round" d="M18 9c1.657 0 3-1.12 3-2.5S19.657 4 18 4M6 9C4.343 9 3 7.88 3 6.5S4.343 4 6 4"/><ellipse cx="12" cy="17" rx="6" ry="4"/><path stroke-linecap="round" d="M20 19c1.754-.385 3-1.359 3-2.5s-1.246-2.115-3-2.5M4 19c-1.754-.385-3-1.359-3-2.5s1.246-2.115 3-2.5"/></g></svg>
                    <p class="text-lg">Users</p>
                </a>
            </li>
            {{-- Driving School License --}}
            <li class="hover:bg-custom-grey/30 rounded-lg duration-300">
                <a href="#" class="inline-flex items-center justify-center gap-4 p-4 opacity-40">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><g fill="none" stroke="#EBF0F2" stroke-width="1.5"><path d="m18.18 8.04l.463-.464a1.966 1.966 0 1 1 2.781 2.78l-.463.464M18.18 8.04s.058.984.927 1.853s1.854.927 1.854.927M18.18 8.04l-4.26 4.26c-.29.288-.434.433-.558.592c-.146.188-.271.39-.374.606c-.087.182-.151.375-.28.762l-.413 1.24l-.134.401m8.8-5.081l-4.26 4.26c-.29.29-.434.434-.593.558c-.188.146-.39.271-.606.374c-.182.087-.375.151-.762.28l-1.24.413l-.401.134m0 0l-.401.134a.53.53 0 0 1-.67-.67l.133-.402m.938.938l-.938-.938"/><path stroke-linecap="round" d="M8 13h2.5M8 9h6.5M8 17h1.5M19.828 3.172C18.657 2 16.771 2 13 2h-2C7.229 2 5.343 2 4.172 3.172C3 4.343 3 6.229 3 10v4c0 3.771 0 5.657 1.172 6.828C5.343 22 7.229 22 11 22h2c3.771 0 5.657 0 6.828-1.172c.944-.943 1.127-2.348 1.163-4.828"/></g></svg>
                    <p class="text-lg">Licenses</p>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="mt-6 px-5 text-custom-white">
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
                    {{-- Action buttons will go here --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection