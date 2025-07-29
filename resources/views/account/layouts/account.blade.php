@extends('layouts.app')

@section('content')
    <main class="container relative">

        <div class="flex flex-col lg:flex-row gap-x-8 mt-10">
            @include('account.layouts.sidebar')
            @yield('account-content')
        </div>
    </main>
@endsection
