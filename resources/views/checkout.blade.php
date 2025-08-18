@extends('layouts.app')

@section('content')
    <main class="container">
        <!-- Breadcrumb -->
        <nav class="flex mt-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route('index')}}"
                       class="inline-flex items-center text-sm gap-x-1  text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="size-4 mb-0.5">
                            <use href="#home"/>
                        </svg>
                        صفحه اصلی
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{route('cart.index')}}"
                       class="inline-flex items-center text-sm gap-x-1  text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        سبد خرید
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm  text-gray-500 md:ms-2 dark:text-gray-400">
                            آدرس و زمان ارسال
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        @error('general')
            <section
                class="flex flex-col lg:flex-row justify-between items-start gap-4 mt-5">
                <div class="w-full flex flex-col gap-y-4 child:rounded-lg child:bg-white child:dark:bg-gray-800 child:shadow child:p-4">
                    <div>
                        <div class="grid grid-cols-12 child:col-span-12 gap-2 child:w-full child:flex child:items-center child:gap-x-2 child:rounded-lg  child:p-3 child:duration-300 child:border child:border-gray-300 child:dark:border-gray-300/20 child:transition-all  ">
                        <span
                            class="group ring-transparent ring-1 focus:ring-blue-500 dark:ring-white/20 dark:focus:ring-blue-400 text-red-500" >
                               تحویل درب منزل:رایگان
                        </span>
                        </div>
                    </div>
                </div>
            </section>
        @enderror

        <form method="post" action="">
            @csrf
            <section
                class="flex flex-col lg:flex-row justify-between items-start gap-4 mt-5">
                <!-- Form -->
                <div
                    class="w-full lg:w-3/4 flex flex-col gap-y-4 child:rounded-lg child:bg-white child:dark:bg-gray-800 child:shadow child:p-4">
                    <div class="w-full flex flex-col">
                <span class="flex items-center gap-x-2">
                    <a href="{{route('cart.index')}}">
                        <svg class="size-5">
                            <use href="#arrow-right"></use>
                        </svg>
                    </a>
                    <p class="font-DanaDemiBold text-lg">آدرس و زمان ارسال</p>
                </span>
                        <p class="text-gray-500 dark:text-gray-400 font-DanaMedium mt-4 mb-8 text-sm lg:text-base">
                            لطفا اطلاعات خود را به درستی وارد نمایید
                        </p>

                        <div class="flex flex-col lg:flex-row items-start ">
                            <div class="w-full grid grid-cols-12 gap-4">
                                <div class="block w-full col-span-6">
                                    <input
                                        type="text"
                                        name="province"
                                        placeholder="استان*"
                                        class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6 text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11"
                                    >
                                    @error('province')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="block w-full col-span-6">
                                    <input
                                        type="text"
                                        name="city"
                                        placeholder="شهر*"
                                        class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6 text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11"
                                    >
                                    @error('city')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="block w-full col-span-12">
                                    <input
                                        type="text"
                                        name="user_address"
                                        placeholder="آدرس*"
                                        class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-12 text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11"
                                    >
                                    @error('user_address')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="block w-full col-span-6">
                                    <input
                                        type="text"
                                        name="postal_code"
                                        placeholder="کدپستی*"
                                        class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6 text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11"
                                    >
                                    @error('postal_code')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="block w-full col-span-6">
                                    <input
                                        type="text"
                                        name="phone"
                                        placeholder="شماره تلفن ثابت"
                                        class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-6 text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400 h-11"
                                    >
                                    @error('phone')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="block w-full col-span-12">
                                    <input
                                        type="text"
                                        name="description"
                                        placeholder="توضیحات"
                                        class="block w-full py-1.5 px-3 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400   transition-all col-span-12 h-11 text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400"
                                    >
                                    @error('description')
                                        <span class="text-red-500">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    <span class="flex items-center gap-x-1">
                        <span>
                            <svg class="size-5 mb-1">
                                <use href="#truck"></use>
                            </svg>
                        </span>
                        <h1 class="font-DanaDemiBold">روش ارسال</h1>
                    </span>
                        <div class="grid grid-cols-12 child:col-span-12 gap-2 child:w-full child:flex child:items-center child:gap-x-2 child:rounded-lg  child:p-3 child:duration-300 child:border child:border-gray-300 child:dark:border-gray-300/20 child:transition-all child:text-gray-600 child:dark:text-gray-300  child:font-DanaMedium child:text-base mt-4"
                        >
                            <span
                                class="group ring-transparent ring-1 focus:ring-blue-500 dark:ring-white/20 dark:focus:ring-blue-400">
                                تحویل درب منزل:رایگان
                            </span>
                        </div>
                    </div>
                    <div>
                        <h1 class="font-DanaDemiBold text-lg">محصولات سفارش</h1>
                        <hr>
                        @foreach($userCartItems as $cartItem)
                            <div class="mt-8">
                                <div class="flex flex-col mt-8 gap-x-4">
                                    <img src="{{asset('assets/images/products/8.webp')}}" class="w-36 h-20" alt="">
                                    <ul class="flex flex-col items-start gap-y-2 font-DanaMedium text-gray-600 dark:text-gray-200 mt-5  mr-3">
                                        <li>
                                            <p>
                                                {{$cartItem['product']->name . ' | ' . $cartItem['product']->name_en}}
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                تعداد :
                                                {{$cartItem['qty']}}
                                            </p>
                                        </li><li>
                                            <p>
                                                مبلغ :
                                                {{number_format($cartItem['product']->price)}}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr>
                        @endforeach
                    </div>
                </div>
                <!-- PRICE BOX -->
                <div
                    class="w-full lg:w-1/4 lg:sticky top-5 flex flex-col gap-y-4 rounded-lg bg-white dark:bg-gray-800 shadow p-4">
                    <!-- PRICE -->
                    <ul class="child:flex child:items-center child:justify-between space-y-8">
                        <li>
                            <p>
                                قیمت کالاها
                                ({{count($userCartItems)}})
                            </p>
                            <p class="flex gap-x-1 text-gray-600 dark:text-gray-300 ">
                                {{number_format($totalPrice)}}
                                <span
                                    class="hidden xl:flex">
                                    تومان
                                </span>
                            </p>
                        </li>
                        <li class="text-red-500 dark:text-red-400">
                            <p>تخفیف </p>
                            <p class="font-DanaMedium">
                                {{number_format($totalDiscount)}}
                                تومان
                            </p>
                        </li>
                        <li class="border-t-2 border-dashed border-gray-400 pt-8">
                            <p> مبلغ نهایی :</p>
                            <p>
                                {{number_format($totalPrice - $totalDiscount)}}
                                تومان
                            </p>
                        </li>
                    </ul>

                    <button
                        type="submit"
                       class="w-full mt-4 flex items-center gap-x-1 justify-center bg-blue-500 text-white hover:bg-blue-600 transition-all rounded-lg shadow py-2">
                        <svg class="w-5 h-5">
                            <use href="#shopping-bag"></use>
                        </svg>
                        تایید و تکمیل سفارش
                    </button>
                </div>
            </section>
        </form>

    </main>
@endsection
