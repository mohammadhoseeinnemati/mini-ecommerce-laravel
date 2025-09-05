@extends('layouts.app')

@section('content')

    <section class="relative flex items-center justify-center min-h-screen w-full">
        <!-- background -->
        <div class="pointer-events-none absolute inset-0 flex  items-center justify-center overflow-hidden
                [mask-image:radial-gradient(circle_at_center,rgba(255,255,255,1)_0%,rgba(255,255,255,0)_85%)]">

            <svg
                class="absolute left-0 top-0 h-full w-full stroke-black/10 stroke-[2]
            [mask-image:radial-gradient(circle_at_center,rgba(255,255,255,1)_20%,rgba(255,255,255,0)_95%)] dark:stroke-white/10">
                <rect width="100%" height="100%" stroke-width="0" fill="url(#grid-pattern)"></rect>
                <defs>
                    <pattern id="grid-pattern" viewBox="0 0 64 64" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M64 0H0V64" fill="none"></path>
                    </pattern>
                </defs>
            </svg>
        </div>

        <div
            class="relative w-[27rem] mx-5 flex flex-col justify-center py-8 px-4 md:px-8 bg-white dark:bg-gray-800 shadow-md rounded-xl">
            <div class="flex items-center justify-center">
                <button class="toggle-theme absolute left-2 top-2 flex-center p-1.5 rounded-full text-gray-300">
                    <svg class="inline-block dark:hidden size-5">
                        <use href="#moon"/>
                    </svg>
                    <svg class="hidden dark:inline size-5">
                        <use href="#sun"/>
                    </svg>
                </button>
                <a href="index.html" class="flex flex-col text-center">
          <span class="font-MorabbaMedium text-4xl flex items-center">
            فروشگاه<span class="text-blue-500">{{config('project.project_name')}}</span>
          </span>
                </a>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <p class="mb-2 text-gray-800 dark:text-gray-100 font-DanaMedium text-lg">کد تایید را وارد کنید</p>
                <form id="otp-form" action="{{route('auth.otp.post')}}" method="post">
                    @csrf
                    <label for="email" class="block text-sm/6 font-medium text-gray-500 dark:text-gray-300">
                        کد تایید برای  شماره شما ارسال
                        گردید.
                    </label>
                    @error('general')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                    <div dir="ltr" class="flex items-center justify-between gap-4 mt-5">
                        <input type="text" class="otp-input" name="code[]" pattern="\d*" maxlength="1"/>
                        <input type="text" class="otp-input" name="code[]" maxlength="1"/>
                        <input type="text" class="otp-input " name="code[]" maxlength="1"/>
                        <input type="text" class="otp-input" name="code[]" maxlength="1"/>
                    </div>
                    <div class="w-full mx-auto mt-8">
                        <button type="submit" class="submit-btn">
                            ادامه
                        </button>
                    </div>
                </form>
                <p class="login-timer_text">
                    مانده تا دریافت مجدد کد <span class="login-timer text-blue-500">3:00</span>
                </p>
                <a href="{{route('auth.login.index')}}" class="resend-code">
                       دریافت مجدد کد
                       <svg class="size-4 rotate-90">
                           <use href="#chevron"/>
                       </svg>
                </a>
            </div>
        </div>
    </section>

@endsection
