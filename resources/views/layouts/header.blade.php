<!-- Header -->
<header class="header">
    <!-- Desktop -->
    <div class="container mt-5 hidden flex-col gap-y-6 lg:flex">
        <!-- TOPBAR -->
        <div class="flex-between">
            <!-- Search Box -->
            <div class="relative z-20">
                <!-- INPUT -->
                <form action="{{route('products.index')}}">
                    <div
                        class="search-btn-open flex gap-x-2 app-border bg-gray-50 dark:bg-gray-700 p-1 rounded-full cursor-pointer ring-blue-400 w-84 transition-all">
                        <button type="submit">
                            <svg  class="size-6 p-1.5 flex-center text-gray-100 bg-blue-600 rounded-full w-9 h-9">
                                <use href="#search" />
                            </svg>
                        </button>
                        <input
                            placeholder="جستجو در محصولات..."
                            type="text"
                            name="keyword"
                            value="{{request()->input('keyword')}}"
                        >
                    </div>
                </form>
            </div>
            <!-- Logo -->
            <a href="{{route('index')}}" class="flex flex-col text-center ml-20">
                    <span class="font-MorabbaMedium text-4xl flex items-center">
                        فروشگاه<span class="text-blue-500">{{config('project.project_name')}}</span>
                    </span>
                <p class="font-DanaMedium text-gray-400"> خرید موبایل و لپ‌تاپ</p>
            </a>
            <!--  Action -->
            <div class="flex items-center gap-x-3">
                <!-- LOGIN -->
                @if(auth()->check())
                    <!-- Account Btn -->
                    <button class="group relative flex-center py-2 px-4 app-border rounded-full app-hover delay-75">
                        <a href="{{route('account.profile.index')}}"  class="flex items-center gap-x-1">
                            <svg class="size-5">
                                <use href="#user" />
                            </svg>
                            <p>حساب کاربری</p>
                        </a>
                        <div
                            class="absolute dark:border-none border border-gray-100 w-52 p-2 bg-white text-gray-900 dark:text-gray-100 flex flex-col gap-y-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:top-12 transition-all delay-100 dark:bg-gray-700 top-20 rounded-lg text-base shadow child:transition-all duration-300 child:py-1.5 child:px-2 z-30 child:rounded-lg child:w-full">
                            <a href="{{route('account.orders.index')}}"
                               class="flex items-center gap-x-2  hover:bg-blue-500 hover:text-gray-100">
                                <svg class="h-5 w-5">
                                    <use href="#user"></use>
                                </svg>
                                سفارشات من
                            </a>
                            <a href="{{route('account.profile.index')}}"
                               class="flex items-center gap-x-2  hover:bg-blue-500 hover:text-gray-100">
                                <svg class="h-5 w-5">
                                    <use href="#cog"></use>
                                </svg>
                                اطلاعات کاربری
                            </a>
                            <a href="{{route('auth.logout.index')}}"
                               class="flex items-center gap-x-2  hover:bg-red-500 dark:hover:bg-red-500 hover:text-gray-100">
                                <svg class="h-5 w-5">
                                    <use href="#arrow-left-end"></use>
                                </svg>
                                خروج از حساب
                            </a>
                        </div>
                    </button>
                @else()
                    <button class=" flex-center py-2 px-4  app-border rounded-full app-hover">
                        <a href="{{route('auth.login.index')}}" class="flex items-center gap-x-2">
                            <p>ورود | ثبت‌نام</p>
                            <svg class="size-5">
                                <use href="#arrow-left-end" />
                            </svg>
                        </a>
                    </button>
                @endif

                <!-- Toggle theme -->
                <button class="toggle-theme flex-center p-2 app-border rounded-full app-hover">
                    <svg class="inline-block dark:hidden size-6">
                        <use href="#moon" />
                    </svg>
                    <svg class="hidden dark:inline size-6">
                        <use href="#sun" />
                    </svg>
                </button>
                <!-- Shopping cart -->
                <a href="{{route('cart.index')}}" class="flex-center p-2 bg-blue-600 text-gray-100 rounded-full open-cart relative">
                    <svg class="size-6">
                        <use href="#shopping-bag" />
                    </svg>
                    @if(getCartProductsCount() > 0)
                        <span class="absolute -top-1 -right-1 flex h-4 w-4">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-600 opacity-75">

                            </span>
                            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500 text-xs pt-1 flex-center text-white">
                                {{getCartProductsCount()}}
                            </span>
                        </span>
                    @endif
                </a>
            </div>
        </div>
        <!-- NAVBAR -->
        <div class="relative flex-between h-16 bg-gray-900 dark:bg-gray-800 rounded-full text-gray-200 px-10">
            <!-- MENU -->
            <ul class="flex items-center gap-x-8">
                <li class="menu-item">
                    <a href="{{route('index')}}" class="menu-item_link">
                        صفحه اصلی
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{route('products.index')}}" class="menu-item_link">
                        فروشگاه
                    </a>
                </li>

                <li class="menu-item">
                    <a href="index.html" class="menu-item_link">
                       دسته بندی ها
                    </a>
                </li>

                <li class="menu-item">
                    <a href="shop.html" class="menu-item_link">
                        درباره ما
                    </a>
                </li>

                <li class="menu-item">
                    <a href="shop.html" class="menu-item_link">
                        سوالات متداول
                    </a>
                </li>

                <li class="menu-item">
                    <a href="shop.html" class="menu-item_link">
                        تماس با ما
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Mobile -->
    <div class="flex justify-center lg:hidden">
        <!-- Top Navbar -->
        <nav
            class="absolute top-0 inset-x-0 w-full h-16 px-4 shadow-sm dark:bg-gray-800 flex items-center justify-between">
            <!-- Menu -->
            <button class="open-menu-mobile flex-center p-2 app-border rounded-full">
                <svg class=" size-6">
                    <use href="#bars" />
                </svg>
            </button>
            <div class="mobile-menu z-50 flex flex-col">
                <!--  MENU MOBILE header -->
                <div class="flex w-full items-center justify-between border-b-normal pb-4">
                    <a href="index.html" class="text-xl font-MorabbaMedium">
                         فروشگاه <span class="text-blue-500">{{config('project.project_name')}}</span>
                    </a>
                    <button class="close-menu-mobile">
                        <svg class="size-5 text-gray-500 dark:text-gray-200">
                            <use href="#x-mark" />
                        </svg>
                    </button>
                </div>
                <!-- MENU MOBILE CATEGORY & ACTION  -->
                <ul class="flex flex-col gap-y-2 text-gray-800 dark:text-gray-100 mt-4">
                    <li class="mobile-menu-item">
                        <svg class="size-5">
                            <use href="#user" />
                        </svg>
                        <a href="dashboard.html">حساب کاربری</a>
                    </li>
                    <li class="mobile-menu-item">
                        <svg class="size-5">
                            <use href="#squares" />
                        </svg>
                        <a href="#">دسته بندی</a>
                    </li>
                    <li class="mobile-menu-item">
                        <svg class="size-5">
                            <use href="#shopping-cart" />
                        </svg>
                        <a href="shopping-cart.html">سبد خرید</a>
                    </li>
                    <li class="mobile-menu-item">
                        <svg class="size-5">
                            <use href="#check-badge" />
                        </svg>
                        <a href="#">دربـاره مـا</a>
                    </li>
                    <li class="mobile-menu-item">
                        <svg class="size-5">
                            <use href="#phone" />
                        </svg>
                        <a href="contact-us.html">تـماس بـا مـا</a>
                    </li>
                </ul>
            </div>
            <!-- Logo -->
            <a href="index.html" class="flex flex-col text-center">
                    <span class="font-MorabbaMedium text-3xl flex items-center">
                         فروشگاه<span class="text-blue-500">{{config('project.project_name')}}</span>
                    </span>
            </a>
            <!-- Toggle theme -->
            <button class="toggle-theme flex-center p-2 app-border rounded-full ">
                <svg class="inline-block dark:hidden size-6">
                    <use href="#moon" />
                </svg>
                <svg class="hidden dark:inline size-6">
                    <use href="#sun" />
                </svg>
            </button>
        </nav>
        <!-- Search baer -->
        <button class="open-mobile_search-modal">
            <svg class=" size-6">
                <use href="#search" />
            </svg>
            <p>جستجو در <span class="font-MorabbaMedium">محصولات</span></p>
        </button>
        <!-- Search Moadal -->
        <div class="mobile_search-modal">
            <!-- TOP -->
            <div class="w-full flex items-center gap-x-2">
                <button
                    class="w-full flex items-center gap-x-1 bg-gray-200 dark:bg-gray-800 text-gray-500 py-2 px-4 rounded-3xl">
                    <svg class="size-6">
                        <use href="#search" />
                    </svg>
                    <input type="text" placeholder="جستجو در همه کالاها">
                </button>
                <svg class="size-6 close-mobile_search-modal">
                    <use href="#x-mark" />
                </svg>
            </div>
            <div class="w-full space-y-4">
                <!-- Result -->
                <div>
                <span class=" flex items-center text-sm gap-x-1 text-gray-600 dark:text-gray-200">
                        <p>نتیجه جستجو : <span class="font-DanaMedium text-blue-400">iphone</span></p>
                        </span>
                <ul
                    class="pt-4 text-gray-500 dark:text-gray-300 flex flex-col gap-y-4 child:flex-between child:cursor-pointer">
                    <li>
                        <a href="#" class="flex items-center gap-x-2">
                            <svg class="size-5">
                                <use href="#search" />
                            </svg>
                            آیفون 14
                        </a>
                        <svg class="size-4">
                            <use href="#arrow-up-right" />
                        </svg>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-x-2">
                            <svg class="size-5">
                                <use href="#search" />
                            </svg>
                            قاب آیفون
                        </a>
                        <svg class="size-4">
                            <use href="#arrow-up-right" />
                        </svg>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-x-2">
                            <svg class="size-5">
                                <use href="#search" />
                            </svg>
                            کاور ایفون 16
                        </a>
                        <svg class="size-4">
                            <use href="#arrow-up-right" />
                        </svg>
                    </li>
                </ul>
            </div>
            <!-- Trend -->
            <div class="pt-4">
                        <span class="flex items-center gap-x-1 text-sm text-gray-500 dark:text-gray-200">
                            <svg class="size-4">
                                <use href="#fire" />
                            </svg>
                            <p>جستجو های پرطرفدار :</p>
                        </span>
                <ul class="w-full flex items-center gap-1.5 mt-3 child:search-modal-list-item">
                    <li>
                        <a href="#">#آیفون</a>
                    </li>
                    <li>
                        <a href="#">#لپ تاپ</a>
                    </li>
                    <li>
                        <a href="#">#هدفون</a>
                    </li>
                    <li>
                        <a href="#">#هلدر</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- bottom Navbar-->
    <ul class="bottom-navbar">
        <li class="dark:text-sky-400 text-blue-500 font-DanaMedium">
            <svg class="size-5">
                <use href="#home" />
            </svg>
            <a href="index.html">خانه</a>
        </li>
        <li>
            <svg class="size-5">
                <use href="#squares" />
            </svg>
            <a href="shop.html">فروشگاه</a>
        </li>
        <li>
            <svg class="size-5">
                <use href="#shopping-bag" />
            </svg>
            <a href="shopping-cart.html">سبد خرید</a>
        </li>
        <li>
            <svg class="size-5">
                <use href="#user" />
            </svg>
            <a href="dashboard.html">حساب من</a>
        </li>
    </ul>
    </div>
</header>
