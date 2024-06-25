@extends('layouts.main')

@include('partials.navbar')

@section('content')
    <div class="flex flex-col px-5 my-8">
        <p class="text-custom-grey font-league font-medium text-3xl lg:text-5xl">Hi, {{ auth()->user()->fullname }}</p>
    </div>
@endsection