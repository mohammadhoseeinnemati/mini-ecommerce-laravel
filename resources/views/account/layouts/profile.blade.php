@extends('account.layouts.account')

@section('account-content')
    <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
    <div class="lg:w-3/4">
        <div class="flex flex-col shadow rounded-lg p-4 dark:bg-gray-800 bg-white mt-5 lg:mt-0">
            <div class="flex items-center justify-between">
                <h2 class="font-DanaMedium text-lg">اطلاعات حساب کاربری</h2>
            </div>
            <form class="mt-5 grid grid-cols-12 gap-5 child:col-span-12 child:lg:col-span-6" action="#" method="POST">
                <!-- ITEM -->
                <div>
                    <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                        نام و نام خانوادگی
                    </label>
                    <div class="mt-3 relative">
                        <input type="text" placeholder="پارسا وصالی"
                               class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                        <button type="button" class="absolute left-3 top-3 z-10">
                            <svg class="size-5 text-gray-500">
                                <use href="#edit"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- ITEM -->
                <div>
                    <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                        شماره موبایل
                    </label>
                    <div class="mt-3 relative">
                        <input type="text" placeholder="090000000 "
                               class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                        <button type="button" class="absolute left-3 top-3 z-10">
                            <svg class="size-5 text-gray-500">
                                <use href="#edit"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- ITEM -->
                <div>
                    <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                        ایمیل
                    </label>
                    <div class="mt-3 relative">
                        <input type="text" placeholder="ایمیل خود را وارد کنید"
                               class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                        <button type="button" class="absolute left-3 top-3 z-10">
                            <svg class="size-5 text-gray-500">
                                <use href="#plus"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- ITEM -->
                <div>
                    <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                        رمز عبور
                    </label>
                    <div class="mt-3 relative">
                        <input type="text" placeholder="......"
                               class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                        <button type="button" class="absolute left-3 top-3 z-10">
                            <svg class="size-5 text-gray-500">
                                <use href="#edit"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- ITEM -->
                <div>
                    <label for="email" class="block text-sm font-DanaMedium text-gray-500 dark:text-gray-300">
                        تاریخ تولد :
                    </label>
                    <div class="mt-3 relative">
                        <input type="text" placeholder="1400/1/1"
                               class="block w-full p-2.5 text-base outline dark:outline-none outline-1 -outline-offset-1 placeholder:text-gray-400 transition-all
                     text-gray-800 dark:text-gray-100 dark:bg-gray-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded-md outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-blue-400">
                        <button type="button" class="absolute left-3 top-3 z-10">
                            <svg class="size-5 text-gray-500">
                                <use href="#edit"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
