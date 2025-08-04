@extends('account.layouts.account')

@section('account-content')
    <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
    <div class="lg:w-3/4">
        <div class="flex lg:hidden">
            <button
                class="open-user-menu bg-blue-500 flex items-center gap-x-1 font-DanaMedium text-white p-2 rounded-lg text-sm mr-2">
                <svg class="size-5">
                    <use href="#bars-3"></use>
                </svg>
                منوی کاربری
            </button>
            <div class="user-menu">
                <button class="close-user-menu">
                    <svg class="size-6">
                        <use href="#x-mark"></use>
                    </svg>
                </button>
                <!-- NAME AND AVATAR  -->
                <div
                    class="w-full flex items-center justify-between border-b border-gray-200 dark:border-white/20 py-3">
                    <div class="flex items-center gap-x-3">
                        <img src="./images/svg/user.png" class="size-10 ring-2 ring-gray-400/20 rounded-full"
                             alt="AVATAR">
                        <span class="felx flex-col gap-y-2">
                            <p class="font-DanaMedium text-lg">پارسا وصالی</p>
                            <p class="text-gray-400">09100000001</p>
                        </span>
                    </div>
                    <span>
                        <svg class="w-6 h-6 cursor-pointer text-blue-500">
                            <use href="#edit"></use>
                        </svg>
                    </span>
                </div>
                <ul class="w-full relative space-y-2 child:duration-300 child:transition-all child:py-3  child:px-2 child:flex child:gap-x-2 text-lg child:cursor-pointer child:rounded-lg">
                    <li class="bg-blue-500/10 text-blue-500">
                        <svg class="w-6 h-6 ">
                            <use href="#squares"></use>
                        </svg>
                        <a href="dashboard.html">داشبورد</a>
                    </li>
                    <li class="hover:text-blue-500">
                        <svg class="w-6 h-6 ">
                            <use href="#shopping-bag"></use>
                        </svg>
                        <a href="dashboard-orders.html">
                            سفارش ها
                        </a>
                    </li>
                    <li class="hover:text-blue-500">
                        <svg class="w-6 h-6 ">
                            <use href="#heart"></use>
                        </svg>
                        <a href="dashboard-favorite.html">علاقه‌مندی ها</a>
                    </li>
                    <li class="hover:text-blue-500">
                        <svg class="w-6 h-6 ">
                            <use href="#map"></use>
                        </svg>
                        <a href="dashboard-address.html">آدرس ها</a>
                    </li>
                    <li class="hover:text-blue-500">
                        <svg class="w-6 h-6 ">
                            <use href="#bell"></use>
                        </svg>
                        <a href="dashboard-messages.html">پیام ها</a>
                    </li>
                    <li class="hover:text-blue-500">
                        <svg class="w-6 h-6 ">
                            <use href="#cog"></use>
                        </svg>
                        <a href="dashboard-account.html">اطلاعات حساب </a>
                    </li>
                    <li class="text-red-400">
                        <svg class="w-6 h-6 ">
                            <use href="#arrow-left-end"></use>
                        </svg>
                        <a href="main.html">خروج</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
            <div class="flex items-center justify-between">
                <h2 class="font-DanaMedium text-lg">اطلاعات حساب کاربری</h2>
            </div>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <!-- ITEM -->
                @error('general')
                    <div>
                        <span style="color: rgb(244 63 94)">{{$message}}</span>
                    </div>
                @enderror

                @if(session()->has('success'))
                    <div>
                        <span style="color: green">{{session('success')}}</span>
                    </div>
                @endif

                <div class="mt-5 grid grid-cols-12 gap-5 child:col-span-12 child:lg:col-span-6">

                    <div>
                        <label for="first_name" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                            نام
                        </label>
                        <div class="mt-3 relative">
                            <input
                                class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                type="text"
                                name="first_name"
                                id="first_name"
                                value="{{old('first_name',$user->first_name)}}"
                            >
                        </div>
                        @error('first_name')
                        <p class="text-error" style="display: block; opacity: 1">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                            نام خانوادگی
                        </label>
                        <div class="mt-3 relative">
                            <input
                                class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                type="text"
                                name="last_name"
                                id="last_name"
                                value="{{old('last_name',$user->last_name)}}"
                            >
                        </div>
                        @error('last_name')
                        <p class="text-error" style="display: block; opacity: 1">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                            پست الکترونیکی
                        </label>
                        <div class="mt-3 relative">
                            <input
                                class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                type="email"
                                name="email"
                                id="email"
                                value="{{old('email',$user->email)}}"
                            >
                        </div>
                        @error('email')
                        <p class="text-error" style="display: block; opacity: 1">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                            موبایل
                        </label>
                        <div class="mt-3 relative">
                            <input
                                class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                type="text"
                                name="phone"
                                id="phone"
                                value="{{old('phone',$user->phone)}}"
                            >
                        </div>
                        @error('phone')
                        <p class="text-error" style="display: block; opacity: 1">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                            رمز عبور
                        </label>
                        <div class="mt-3 relative">
                            <input
                                class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                type="password"
                                name="password"
                                id="password"
                                placeholder="در صورت نیاز به تغییر رمز عبور ان را وارد کنید"
                            >
                        </div>
                        @error('password')
                        <p class="text-error" style="display: block; opacity: 1">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                            تکرار رمز عبور
                        </label>
                        <div class="mt-3 relative">
                            <input
                                class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                type="password"
                                name="password_confirmation"
                                id="password"
                                placeholder="در صورت نیاز به تغییر رمز عبور ان را وارد کنید"
                            >
                        </div>
                    </div>
                </div>

                <div class="mt-6" style=" display: flex ;justify-content: end;">
                    <button type="submit" tabindex="3" class="submit-btn" style="width: unset">ذخیره اطلاعات</button>
                </div>

            </form>
        </div>
    </div>
@endsection
