@extends('layouts.dark-main')

@section('content')
    <div class="w-full h-full text-custom-white">   
        {{-- Greetings Element --}}
        <div class="flex flex-col px-5 my-8 lg:my-12">
            <p class="font-encode font-medium text-xl lg:text-4xl">Selamat Datang, {{ auth()->user()->fullname }}</p>
        </div> 
        {{-- Tabs --}}
        <div class="border-b px-16"></div>

        {{-- <div class="border-b border-custom-secondary">
            <ul class="flex font-league text-lg font-medium text-center">
                <li class="">
                    <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>Users
                    </a>
                </li>
            </ul>
        </div> --}}
    </div>
@endsection