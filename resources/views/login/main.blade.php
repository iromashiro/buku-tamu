@extends('layout.login')

@section('subhead')
<title>Dinas Sosial - PMKS</title>
@endsection

@section('content')

<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <div class="my-auto">
                <img alt="Icewall Tailwind HTML Admin Template" class="-intro-x w-2/1 -mt-16"
                    src="{{ asset('muara_enim.png') }}">
                <div class="-intro-x text-white font-medium text-5xl leading-tight mt-10">Simon Balik Dalu Yan Kesal
                </div>

                <div class="-intro-x text-white font-medium text-2xl leading-tight mt-5">
                    Sistem Informasi Online Berbasis Aplikasi Data <br> Pemerlu Pelayanan Kesejahteraan Sosial
                </div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Masukkan Username dan
                    Password</h2>
                <form class="p-t-15" method="post" role="form" action="{{ route('submit_login') }}">
                    @csrf
                    <div class="intro-x mt-8">
                        <input name="username" type="text" class="intro-x login__input form-control py-3 px-4 block"
                            placeholder="Contoh : bagian_pendaftaran" placeholder="Masukkan Username">
                        @if (session('pesan'))
                        <div id="error-email" class="login__input-error text-danger mt-2"></div>
                        @endif
                        <input name="password" type="password"
                            class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password"
                            placeholder="Password">
                        @if (session('pesan'))
                        <div id="error-password" class="login__input-error text-danger mt-2"></div>
                        @endif
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button id="btn-login" type="submit"
                            class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
</div>
@endsection