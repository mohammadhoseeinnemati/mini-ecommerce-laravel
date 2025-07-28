@extends('layouts.app')

@section('content')
    <!-- Main -->
    <main class="relative">
        <!-- CATEGORY -->
        <section class="mx-4 lg:container mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#squares"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">دسـته بندی
                            هـای
                            <span class="text-blue-600 dark:text-blue-500">محبوب</span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین دسته بندی ها</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-center items-center gap-x-2">
                    <a href="shop.html"
                       class="group shadow-xl text-sm md:text-base flex gap-x-1.5 items-center px-2 h-10 md:px-3 text-white bg-blue-600 rounded-xl">
                        <p>مشاهده همه</p>
                        <span
                            class="w-7 h-7 rounded-full bg-blue-500 flex-center md:group-hover:-translate-x-1 transition-transform duration-300">
                            <svg class="size-5">
                                <use href="#arrow" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
            <!-- ITEMS -->
            <div
                class="flex items-center justify-evenly flex-wrap mt-12 child:mb-8 gap-x-8 child:items-center child:flex-col child:duration-300 child:cursor-pointer child:gap-y-1 child:text-gray-800 child:dark:text-gray-300 child:relative">
                <a href="shop.html" class="group flex">
                    <img src="./assets/images/category/5.png"
                         class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                         alt="category1" />
                    <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                        موبایل
                    </p>
                </a>
                <a href="shop.html" class="group flex">
                    <img src="./assets/images/category/6.png"
                         class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                         alt="category1" />
                    <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                        کالای دیجیتال
                    </p>
                </a>
                <a href="shop.html" class="group flex">
                    <img src="./assets/images/category/7.png"
                         class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                         alt="category1" />
                    <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                        خانه و آشپزخانه
                    </p>
                </a>
                <a href="shop.html" class="group flex">
                    <img src="./assets/images/category/8.png"
                         class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                         alt="category1" />
                    <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                        آرایشی بهداشتی
                    </p>
                </a>
                <a href="shop.html" class="group flex">
                    <img src="./assets/images/category/9.png"
                         class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                         alt="category1" />
                    <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                        لوازم تحریر
                    </p>

                </a>
                <a href="shop.html" class="group flex">
                    <img src="./assets/images/category/10.png"
                         class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                         alt="category1" />
                    <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                        گیفت کارت
                    </p>
                    <a href="shop.html" class="group hidden md:flex">
                        <img src="./assets/images/category/11.png"
                             class="w-[100px] h-[100px] lg:w-[120px] lg:h-[120px] object-cover group-hover:grayscale group-hover:opacity-90 duration-300"
                             alt="category1" />
                        <p class="pt-1 text-sm lg:text-lg line-clamp-1">
                            ابزار آلات
                        </p>
                    </a>
            </div>
        </section>

        <!-- AMAZING SLIDER -->
        <section class="mx-4 lg:container mt-20">
            <div class="w-full h-80 rounded-xl bg-blue-500 dark:bg-blue-700 p-4 relative">
                <!-- AmazingSlider products Slider -->
                <div class="swiper AmazingSlider w-full rounded-xl">
                    <div class="swiper-wrapper">
                        <!-- item -->
                        <div class="swiper-slide amazing-card">
                            <img class="w-28 h-28" src="./assets/images/slider/Amazings.svg" alt="">
                            <!-- TIMER -->
                            <div class="flex items-center gap-x-2">
                                <span class="timer-box" id="seconds">00</span>
                                <p class="text-white">:</p>
                                <span class="timer-box" id="minutes">00</span>
                                <p class="text-white">:</p>
                                <span class="timer-box" id="hours">03</span>
                            </div>

                            <a href="shop.html" class="flex items-center gap-x-.5 text-gray-100 cursor-pointer">
                                <p>مشاهده همه</p>
                                <svg class="size-4 rotate-90">
                                    <use href="#chevron"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="swiper-slide small-card group">
                            <!-- product header -->
                            <div class="w-full flex items-center justify-between">
                                <span class="flex items-center gap-x-0.5 text-blue-400">
                                    <svg class="size-4 mb-1">
                                        <use href="#rocket"></use>
                                    </svg>
                                    <p class="text-xs">ارسال امروز</p>
                                </span>
                                <span class="text-gray-400 flex items-center justify-end text-sm gap-x-0.5">
                                    <p> 5.0 </p>
                                    <svg class="size-4 mb-1">
                                        <use href="#star"></use>
                                    </svg>
                                </span>
                            </div>
                            <!-- product img -->
                            <a href="product-details.html">
                                <img class="small-card_img" src="./assets/images/products/3.png" alt="">
                            </a>
                            <!--  product footer -->
                            <div class="space-y-2">
                                <a href="product-details.html" class="small-card_link">
                                    لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                                </a>
                                <!-- Rate and Price -->
                                <div class="product-card_price-wrapper">
                                    <!-- Price -->
                                    <div class="small-card_price justify-between">
                                        <span class="pt-1">70%</span>
                                        <h4 class="flex items-center gap-x-1 text-lg">130,000,000 <p
                                                class="text-xs font-DanaMedium">تومان</p>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide small-card group">
                            <!-- product header -->
                            <div class="w-full flex items-center justify-between">
                                <span class="flex items-center gap-x-0.5 text-blue-400">
                                    <svg class="size-4 mb-1">
                                        <use href="#rocket"></use>
                                    </svg>
                                    <p class="text-xs">ارسال امروز</p>
                                </span>
                                <span class="text-gray-400 flex items-center justify-end text-sm gap-x-0.5">
                                    <p> 5.0 </p>
                                    <svg class="size-4 mb-1">
                                        <use href="#star"></use>
                                    </svg>
                                </span>
                            </div>
                            <!-- product img -->
                            <a href="product-details.html">
                                <img class="small-card_img" src="./assets/images/products/5.webp" alt="">
                            </a>
                            <!--  product footer -->
                            <div class="space-y-2">
                                <a href="product-details.html" class="small-card_link">
                                    لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                                </a>
                                <!-- Rate and Price -->
                                <div class="product-card_price-wrapper">
                                    <!-- Price -->
                                    <div class="small-card_price justify-between">
                                        <span class="pt-1">70%</span>
                                        <h4 class="flex items-center gap-x-1 text-lg">130,000,000 <p
                                                class="text-xs font-DanaMedium">تومان</p>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide small-card group">
                            <!-- product header -->
                            <span class="w-full text-gray-400 flex items-center justify-end text-sm gap-x-0.5">
                                <p> 5.0 </p>
                                <svg class="size-4 mb-1">
                                    <use href="#star"></use>
                                </svg>
                            </span>
                            <!-- product img -->
                            <a href="product-details.html">
                                <img class="small-card_img" src="./assets/images/products/1.png" alt="">
                            </a>
                            <!--  product footer -->
                            <div class="space-y-2">
                                <a href="product-details.html" class="small-card_link">
                                    لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                                </a>
                                <!-- Rate and Price -->
                                <div class="product-card_price-wrapper">
                                    <!-- Price -->
                                    <div class="small-card_price justify-between">
                                        <span class="pt-1">70%</span>
                                        <h4 class="flex items-center gap-x-1 text-lg">130,000,000 <p
                                                class="text-xs font-DanaMedium">تومان</p>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide small-card group">
                            <!-- product header -->
                            <span class="w-full text-gray-400 flex items-center justify-end text-sm gap-x-0.5">
                                <p> 5.0 </p>
                                <svg class="size-4 mb-1">
                                    <use href="#star"></use>
                                </svg>
                            </span>
                            <!-- product img -->
                            <a href="product-details.html">
                                <img class="small-card_img" src="./assets/images/products/7.webp" alt="">
                            </a>
                            <!--  product footer -->
                            <div class="space-y-2">
                                <a href="product-details.html" class="small-card_link">
                                    لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                                </a>
                                <!-- Rate and Price -->
                                <div class="product-card_price-wrapper">
                                    <!-- Price -->
                                    <div class="small-card_price justify-between">
                                        <span class="pt-1">70%</span>
                                        <h4 class="flex items-center gap-x-1 text-lg">130,000,000 <p
                                                class="text-xs font-DanaMedium">تومان</p>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide small-card group">
                            <!-- product header -->
                            <span class="w-full text-gray-400 flex items-center justify-end text-sm gap-x-0.5">
                                <p> 5.0 </p>
                                <svg class="size-4 mb-1">
                                    <use href="#star"></use>
                                </svg>
                            </span>
                            <!-- product img -->
                            <a href="product-details.html">
                                <img class="small-card_img" src="./assets/images/products/3.png" alt="">
                            </a>
                            <!--  product footer -->
                            <div class="space-y-2">
                                <a href="product-details.html" class="small-card_link">
                                    لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                                </a>
                                <!-- Rate and Price -->
                                <div class="product-card_price-wrapper">
                                    <!-- Price -->
                                    <div class="small-card_price justify-between">
                                        <span class="pt-1">70%</span>
                                        <h4 class="flex items-center gap-x-1 text-lg">130,000,000 <p
                                                class="text-xs font-DanaMedium">تومان</p>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide small-card group">
                            <!-- product header -->
                            <span class="w-full text-gray-400 flex items-center justify-end text-sm gap-x-0.5">
                                <p> 5.0 </p>
                                <svg class="size-4 mb-1">
                                    <use href="#star"></use>
                                </svg>
                            </span>
                            <!-- product img -->
                            <a href="product-details.html">
                                <img class="small-card_img" src="./assets/images/products/3.png" alt="">
                            </a>
                            <!--  product footer -->
                            <div class="space-y-2">
                                <a href="product-details.html" class="small-card_link">
                                    لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                                </a>
                                <!-- Rate and Price -->
                                <div class="product-card_price-wrapper">
                                    <!-- Price -->
                                    <div class="small-card_price justify-between">
                                        <span class="pt-1">70%</span>
                                        <h4 class="flex items-center gap-x-1 text-lg">130,000,000 <p
                                                class="text-xs font-DanaMedium">تومان</p>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="shop.html" class="swiper-slide amazing-card_last ">
                            <svg class="size-10 ">
                                <use href="#arrow-left-circle"></use>
                            </svg>
                            <h2>مشاهده همه</h2>
                        </a>
                    </div>
                </div>
                <button
                    class="slider-navigate_btn absolute right-1 top-36 border dark:border-gray-700 border-gray-200 AmazingSlider-prev-slide z-10">
                    <svg class="size-6 -rotate-90">
                        <use href="#chevron" />
                    </svg>
                </button>
                <button
                    class="slider-navigate_btn absolute left-1 top-36 border dark:border-gray-700 border-gray-200 AmazingSlider-next-slide z-10">
                    <svg class="size-6 rotate-90">
                        <use href="#chevron" />
                    </svg>
                </button>
            </div>
            </div>
        </section>

        <!-- Latest products -->
        <section class="mx-4 lg:container mt-10 lg:mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#mobile"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">جدید ترین
                            <span class="text-blue-600 dark:text-blue-500">محصولات</span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین محصولات</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-between xs:justify-end  items-center gap-x-2">
                    <div class="flex items-center gap-x-2">
                        <button class="slider-navigate_btn LatestProducts-prev-slide">
                            <svg class="size-6 -rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                        <button class="slider-navigate_btn LatestProducts-next-slide">
                            <svg class="size-6 rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                    </div>
                    <a href="shop.html"
                       class="group shadow-xl text-sm md:text-base flex gap-x-1.5 items-center px-2 h-10 md:px-3 text-white bg-blue-600 rounded-xl">
                        <p>مشاهده همه</p>
                        <span
                            class="w-7 h-7 rounded-full bg-blue-500 flex-center md:group-hover:-translate-x-1 transition-transform duration-300">
                            <svg class="size-5">
                                <use href="#arrow" />
                            </svg>
                        </span>
                    </a>
                </div>

            </div>
            <!-- Latest products Slider -->
            <div class="swiper LatestProducts mt-5 w-full">
                <div class="swiper-wrapper py-5">
                    <!-- PRODUCT ITEM -->
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/1.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/2.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/3.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/4.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/5.webp"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/6.webp" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/7.webp"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/8.webp" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/1.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/2.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/3.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/4.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BANNER -->
        <section
            class="mx-4 lg:container mt-10 lg:mt-20 flex flex-col lg:flex-row items-center gap-5 child:rounded-xl child:overflow-hidden">
            <a href="shop.html" class="group">
                <img src="./assets/images/banner/1.webp" class="group-hover:scale-105 transition-transform duration-300"
                     alt="">
            </a>
            <a href="shop.html" class="group">
                <img src="./assets/images/banner/2.webp" class="group-hover:scale-105 transition-transform duration-300"
                     alt="">
            </a>
        </section>

        <!-- Best-selling products -->
        <section class="mx-4 lg:container mt-10 lg:mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#mobile"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">محصولات
                            <span class="text-blue-600 dark:text-blue-500">پرفروش </span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین محصولات</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-between xs:justify-end  items-center gap-x-2">
                    <div class="flex items-center gap-x-2">
                        <button class="slider-navigate_btn BestSelling-prev-slide">
                            <svg class="size-6 -rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                        <button class="slider-navigate_btn BestSelling-next-slide">
                            <svg class="size-6 rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                    </div>
                    <a href="index.html"
                       class="group shadow-xl text-sm md:text-base flex gap-x-1.5 items-center px-2 h-10 md:px-3 text-white bg-blue-600 rounded-xl">
                        <p>مشاهده همه</p>
                        <span
                            class="w-7 h-7 rounded-full bg-blue-500 flex-center md:group-hover:-translate-x-1 transition-transform duration-300">
                            <svg class="size-5">
                                <use href="#arrow" />
                            </svg>
                        </span>
                    </a>
                </div>

            </div>
            <!-- Latest products Slider -->
            <div class="swiper BestSelling mt-5 w-full">
                <div class="swiper-wrapper py-5">
                    <!-- PRODUCT ITEM -->
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/1.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/2.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/3.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/4.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/5.webp"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/6.webp" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/7.webp"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/8.webp" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/1.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/2.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide product-card group">
                        <!-- product header -->
                        <div class="product-card_header">
                            <div class="flex items-center gap-x-2">
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#shopping-cart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        سبد خرید
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#heart"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        علاقه مندی
                                    </div>
                                </div>
                                <div class="tooltip">
                                    <button class="rounded-full p-1.5 app-border app-hover">
                                        <svg class="size-4">
                                            <use href="#arrows-up-down"></use>
                                        </svg>
                                    </button>
                                    <div class="tooltiptext">
                                        مقایسه
                                    </div>
                                </div>
                            </div>
                            <!-- badge offer -->
                            <span class="product-card_badge">70% تخفیف‌</س>
                        </div>
                        <!-- product img -->
                        <a href="product-details.html">
                            <img class="product-card_img group-hover:opacity-0 absolute" src="./assets/images/products/3.png"
                                 alt="">
                            <img class="product-card_img opacity-0 group-hover:opacity-100"
                                 src="./assets/images/products/4.png" alt="">
                        </a>
                        <!--  product footer -->
                        <div class="space-y-2">
                            <a href="product-details.html" class="product-card_link">
                                لپ تاپ 15.6 اینچی ایسوس مدل Vivobook15 X515MA-BR001-Celeron N4020-8GB DDR4
                            </a>
                            <!-- Rate and Price -->
                            <div class="product-card_price-wrapper">
                                <!-- RATE -->
                                <div class="product-card_rate">
                                    <span class="flex items-center gap-x-0.5">
                                        <svg class="size-4 text-blue-500 mb-0.5">
                                            <use href="#rocket"></use>
                                        </svg>
                                        <p class="text-xs">ارسال امروز</p>
                                    </span>
                                    <span class="text-gray-400 flex items-center text-sm gap-x-0.5">
                                        <p> 5.0 </p>
                                        <svg class="size-4 mb-1">
                                            <use href="#star"></use>
                                        </svg>
                                    </span>
                                </div>
                                <!-- Price -->
                                <div class="product-card_price">
                                    <del>70,000,000 <h6>تومان</h6></del>
                                    <p>70,000,000</p>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BRAND -->
        <section class="mx-4 lg:container mt-10 lg:mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#check-badge"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">محبوب‌ترین
                            <span class="text-blue-600 dark:text-blue-500">برندها</span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین برندها</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-between xs:justify-end  items-center gap-x-2">
                    <div class="flex items-center gap-x-2">
                        <button class="slider-navigate_btn brand-prev-slide">
                            <svg class="size-6 -rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                        <button class="slider-navigate_btn brand-next-slide">
                            <svg class="size-6 rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                    </div>
                    <a href="shop.html"
                       class="group shadow-xl text-sm md:text-base flex gap-x-1.5 items-center px-2 h-10 md:px-3 text-white bg-blue-600 rounded-xl">
                        <p>مشاهده همه</p>
                        <span
                            class="w-7 h-7 rounded-full bg-blue-500 flex-center md:group-hover:-translate-x-1 transition-transform duration-300">
                            <svg class="size-5">
                                <use href="#arrow" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
            <!-- BRAND Slider -->
            <div class="swiper BrandSlider mt-5 w-full">
                <div class="swiper-wrapper py-5 w-full">
                    <!-- PRODUCT ITEM -->
                    <div class="swiper-slide brand-card group">
                        <img src="./assets/images/brand/1.png" alt="">
                    </div>
                    <div class="swiper-slide brand-card group">
                        <img src="./assets/images/brand/6.webp" alt="">
                    </div>
                    <div class="swiper-slide brand-card group">
                        <img src="./assets/images/brand/5.webp" alt="">
                    </div>
                    <div class="swiper-slide brand-card group">
                        <img src="./assets/images/brand/4.webp" alt="">
                    </div>
                    <div class="swiper-slide brand-card group">
                        <img src="./assets/images/brand/3.webp" alt="">
                    </div>
                    <div class="swiper-slide brand-card group">
                        <img src="./assets/images/brand/2.png" alt="">
                    </div>
                    <div class="swiper-slide brand-card group">
                        <img src="./assets/images/brand/7.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Hottest products -->
        <section class="mx-4 lg:container mt-10 lg:mt-20 ">
            <div class="bg-white dark:bg-gray-800 shadow rounded-xl h-[420px] p-5 flex flex-col gap-y-2 relative">
                <!-- Title -->
                <div class="flex-center gap-x-1">
                    <svg class="size-6 pb-1 text-orange-400">
                        <use href="#fire"></use>
                    </svg>
                    <h4 class="font-DanaMedium text-lg text-gray-800 dark:text-gray-200">داغ ترین چند ساعت گذشته </h4>
                </div>
                <div class="swiper HottestSlider w-full">
                    <div class="swiper-wrapper w-full">
                        <!-- PRODUCT ITEM -->
                        <div class="swiper-slide hottest-slide">
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/1.png" alt="">
                                <p class="hottest-slide_text ">
                                    مانیتور گیمینگ ایسوس مدل ROG Swift PG259QN
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/3.png" alt="">
                                <p class="hottest-slide_text ">
                                    کنسول بازی پلی استیشن 5 نسخه دیسک دار
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/7.webp" alt="">
                                <p class="hottest-slide_text ">
                                    ساعت هوشمند سامسونگ مدل Galaxy Watch 6
                                </p>
                            </a>
                        </div>
                        <div class="swiper-slide hottest-slide">
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/1.png" alt="">
                                <p class="hottest-slide_text ">
                                    لپ تاپ 14 اینچی لنوو مدل ThinkPad X1 Carbon
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/3.png" alt="">
                                <p class="hottest-slide_text ">
                                    گوشی موبایل سامسونگ مدل Galaxy S23 Ultra
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/7.webp" alt="">
                                <p class="hottest-slide_text ">
                                    هدفون بی‌سیم اپل مدل AirPods Pro 2
                                </p>
                            </a>
                        </div>
                        <div class="swiper-slide hottest-slide">
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/1.png" alt="">
                                <p class="hottest-slide_text ">
                                    مانیتور گیمینگ ایسوس مدل ROG Swift PG259QN
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/3.png" alt="">
                                <p class="hottest-slide_text ">
                                    کنسول بازی پلی استیشن 5 نسخه دیسک دار
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/7.webp" alt="">
                                <p class="hottest-slide_text ">
                                    ساعت هوشمند سامسونگ مدل Galaxy Watch 6
                                </p>
                            </a>
                        </div>
                        <div class="swiper-slide hottest-slide">
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/1.png" alt="">
                                <p class="hottest-slide_text ">
                                    لپ تاپ 14 اینچی لنوو مدل ThinkPad X1 Carbon
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/3.png" alt="">
                                <p class="hottest-slide_text ">
                                    گوشی موبایل سامسونگ مدل Galaxy S23 Ultra
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/7.webp" alt="">
                                <p class="hottest-slide_text ">
                                    هدفون بی‌سیم اپل مدل AirPods Pro 2
                                </p>
                            </a>
                        </div>
                        <div class="swiper-slide hottest-slide">
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/1.png" alt="">
                                <p class="hottest-slide_text ">
                                    مانیتور گیمینگ ایسوس مدل ROG Swift PG259QN
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/3.png" alt="">
                                <p class="hottest-slide_text ">
                                    کنسول بازی پلی استیشن 5 نسخه دیسک دار
                                </p>
                            </a>
                            <a href="product-details.html" class="hottest-slide_link ">
                                <img class="hottest-slide_img " src="./assets/images/products/7.webp" alt="">
                                <p class="hottest-slide_text ">
                                    ساعت هوشمند سامسونگ مدل Galaxy Watch 6
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <button
                    class="slider-navigate_btn absolute right-1 top-[47%] border dark:border-gray-700 border-gray-200 Hottest-prev-slide z-10">
                    <svg class="size-6 -rotate-90">
                        <use href="#chevron" />
                    </svg>
                </button>
                <button
                    class="slider-navigate_btn absolute left-1 top-[47%] border dark:border-gray-700 border-gray-200 Hottest-next-slide z-10">
                    <svg class="size-6 rotate-90">
                        <use href="#chevron" />
                    </svg>
                </button>
            </div>
        </section>

        <!-- ARTICLE -->
        <section class="mx-4 lg:container mt-10 lg:mt-20">
            <!-- SECTION TITLE -->
            <div
                class="flex flex-col gap-y-4 xs:flex-row items-center justify-between w-full text-center xs:text-start">
                <div class="flex items-center gap-x-2 sm:gap-x-4">
                    <span class="size-12 hidden xs:flex rounded-lg bg-white shadow-lg dark:bg-gray-800 flex-center">
                        <svg class="size-7 text-gray-700 dark:text-gray-100">
                            <use href="#check-badge"></use>
                        </svg>
                    </span>
                    <div class="space-y-1 md:space-y-1">
                        <h3 class="text-xl md:text-2xl font-MorabbaMedium text-gray-800 dark:text-gray-50">محبوب‌ترین
                            <span class="text-blue-600 dark:text-blue-500">مقالات</span>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">جدیدترین و بروزترین مقالات</p>
                    </div>
                </div>
                <div class="w-full xs:w-auto flex justify-between xs:justify-end  items-center gap-x-2">
                    <div class="flex items-center gap-x-2">
                        <button class="slider-navigate_btn articleSlider-prev-slide">
                            <svg class="size-6 -rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                        <button class="slider-navigate_btn articleSlider-next-slide">
                            <svg class="size-6 rotate-90">
                                <use href="#chevron" />
                            </svg>
                        </button>
                    </div>
                    <a href="articles.html"
                       class="group shadow-xl text-sm md:text-base flex gap-x-1.5 items-center px-2 h-10 md:px-3 text-white bg-blue-600 rounded-xl">
                        <p>مشاهده همه</p>
                        <span
                            class="w-7 h-7 rounded-full bg-blue-500 flex-center md:group-hover:-translate-x-1 transition-transform duration-300">
                            <svg class="size-5">
                                <use href="#arrow" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
            <div class="swiper articleSlider w-full mt-5">
                <div class="swiper-wrapper w-full py-5">
                    <!-- ITEM -->
                    <div class="swiper-slide group article-box">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="./assets/images/articles/1.webp" class="article-box_img" alt="" />
                            <div
                                class="absolute opacity-0 left-0 top-0 bottom-0 right-0 bg-black/60 flex items-center justify-center group-hover:opacity-100 duration-300 transition-all rounded-bl-3xl rounded-tr-3xl">
                                <a href="./article-details.html"
                                   class="flex items-center px-2 py-1 gap-x-1 font-DanaMedium rounded-lg border-2 border-white text-white">
                                    <p>ادامه مطالب</p>
                                    <svg class="w-4 h-4 rotate-90">
                                        <use href="#chevron"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-1 py-5 px-1">
                            <h2 class="font-DanaDemiBold">بهترین لپ تاپ های بازار ایران [دی ۱۴۰۳] </h2>
                        </div>
                        <span class="flex w-full h-1 py-1 border-t border-gray-100 dark:border-white/10"></span>
                        <div class="flex items-center justify-between text-sm px-1">
                            <span class="flex items-center gap-x-1 text-blue-500 dark:text-sky-400">
                                <svg class="w-4 h-4">
                                    <use href="#calendar"></use>
                                </svg>
                                <p class="mt-1">1403/5/1</p>
                            </span>
                            <span class="flex items-start gap-x-1 text-gray-300">
                                <p class="font-DanaDemiBold">120</p>
                                <svg class="w-4 h-4">
                                    <use href="#eye"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="swiper-slide group article-box">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="./assets/images/articles/2.webp" class="article-box_img" alt="" />
                            <div
                                class="absolute opacity-0 left-0 top-0 bottom-0 right-0 bg-black/60 flex items-center justify-center group-hover:opacity-100 duration-300 transition-all rounded-bl-3xl rounded-tr-3xl">
                                <a href="./article-details.html"
                                   class="flex items-center px-2 py-1 gap-x-1 font-DanaMedium rounded-lg border-2 border-white text-white">
                                    <p>ادامه مطالب</p>
                                    <svg class="w-4 h-4 rotate-90">
                                        <use href="#chevron"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-1 py-5 px-1">
                            <h2 class="font-DanaDemiBold">بهترین گوشی های بازار ایران [دی ۱۴۰۳] </h2>
                        </div>
                        <span class="flex w-full h-1 py-1 border-t border-gray-100 dark:border-white/10"></span>
                        <div class="flex items-center justify-between text-sm px-1">
                            <span class="flex items-center gap-x-1 text-blue-500 dark:text-sky-400">
                                <svg class="w-4 h-4">
                                    <use href="#calendar"></use>
                                </svg>
                                <p class="mt-1">1403/5/1</p>
                            </span>
                            <span class="flex items-start gap-x-1 text-gray-300">
                                <p class="font-DanaDemiBold">120</p>
                                <svg class="w-4 h-4">
                                    <use href="#eye"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="swiper-slide group article-box">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="./assets/images/articles/3.webp" class="article-box_img" alt="" />
                            <div
                                class="absolute opacity-0 left-0 top-0 bottom-0 right-0 bg-black/60 flex items-center justify-center group-hover:opacity-100 duration-300 transition-all rounded-bl-3xl rounded-tr-3xl">
                                <a href="./article-details.html"
                                   class="flex items-center px-2 py-1 gap-x-1 font-DanaMedium rounded-lg border-2 border-white text-white">
                                    <p>ادامه مطالب</p>
                                    <svg class="w-4 h-4 rotate-90">
                                        <use href="#chevron"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-1 py-5 px-1">
                            <h2 class="font-DanaDemiBold">بهترین هدیه های دیجیتال [دی ۱۴۰۳] </h2>
                        </div>
                        <span class="flex w-full h-1 py-1 border-t border-gray-100 dark:border-white/10"></span>
                        <div class="flex items-center justify-between text-sm px-1">
                            <span class="flex items-center gap-x-1 text-blue-500 dark:text-sky-400">
                                <svg class="w-4 h-4">
                                    <use href="#calendar"></use>
                                </svg>
                                <p class="mt-1">1403/5/1</p>
                            </span>
                            <span class="flex items-start gap-x-1 text-gray-300">
                                <p class="font-DanaDemiBold">120</p>
                                <svg class="w-4 h-4">
                                    <use href="#eye"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="swiper-slide group article-box">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="./assets/images/articles/4.webp" class="article-box_img" alt="" />
                            <div
                                class="absolute opacity-0 left-0 top-0 bottom-0 right-0 bg-black/60 flex items-center justify-center group-hover:opacity-100 duration-300 transition-all rounded-bl-3xl rounded-tr-3xl">
                                <a href="./article-details.html"
                                   class="flex items-center px-2 py-1 gap-x-1 font-DanaMedium rounded-lg border-2 border-white text-white">
                                    <p>ادامه مطالب</p>
                                    <svg class="w-4 h-4 rotate-90">
                                        <use href="#chevron"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-1 py-5 px-1">
                            <h2 class="font-DanaDemiBold">بهترین هارد های بازار ایران [دی ۱۴۰۳] </h2>
                        </div>
                        <span class="flex w-full h-1 py-1 border-t border-gray-100 dark:border-white/10"></span>
                        <div class="flex items-center justify-between text-sm px-1">
                            <span class="flex items-center gap-x-1 text-blue-500 dark:text-sky-400">
                                <svg class="w-4 h-4">
                                    <use href="#calendar"></use>
                                </svg>
                                <p class="mt-1">1403/5/1</p>
                            </span>
                            <span class="flex items-start gap-x-1 text-gray-300">
                                <p class="font-DanaDemiBold">120</p>
                                <svg class="w-4 h-4">
                                    <use href="#eye"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- ITEM -->
                    <div class="swiper-slide group article-box">
                        <div class="relative overflow-hidden rounded-lg">
                            <img src="./assets/images/articles/1.webp" class="article-box_img" alt="" />
                            <div
                                class="absolute opacity-0 left-0 top-0 bottom-0 right-0 bg-black/60 flex items-center justify-center group-hover:opacity-100 duration-300 transition-all rounded-bl-3xl rounded-tr-3xl">
                                <a href="./article-details.html"
                                   class="flex items-center px-2 py-1 gap-x-1 font-DanaMedium rounded-lg border-2 border-white text-white">
                                    <p>ادامه مطالب</p>
                                    <svg class="w-4 h-4 rotate-90">
                                        <use href="#chevron"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-1 py-5 px-1">
                            <h2 class="font-DanaDemiBold">بهترین هارد های بازار ایران [دی ۱۴۰۳] </h2>
                        </div>
                        <span class="flex w-full h-1 py-1 border-t border-gray-100 dark:border-white/10"></span>
                        <div class="flex items-center justify-between text-sm px-1">
                            <span class="flex items-center gap-x-1 text-blue-500 dark:text-sky-400">
                                <svg class="w-4 h-4">
                                    <use href="#calendar"></use>
                                </svg>
                                <p class="mt-1">1403/5/1</p>
                            </span>
                            <span class="flex items-start gap-x-1 text-gray-300">
                                <p class="font-DanaDemiBold">120</p>
                                <svg class="w-4 h-4">
                                    <use href="#eye"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <div
            class="container w-full mt-10 lg:mt-20 flex flex-wrap items-center justify-between gap-6 child:text-sm child:gap-y-1 child:cursor-pointer">
            <!-- item -->
            <span class="flex-col items-center justify-center hidden md:flex">
                <img class="w-14 h-14" src="./assets/images/svg/1.svg " alt="">
                <p class="text-gray-500 dark:text-gray-300">امکان تحویل اکسپرس</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="./assets/images/svg/2.svg" alt="">
                <p class="text-gray-500 dark:text-gray-300">ضمانت اصل بودن کالا</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="./assets/images/svg/3.svg" alt="">
                <p class="text-gray-500 dark:text-gray-300">ضمانت بازگشت کالا</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="./assets/images/svg/4.svg" alt="">
                <p class="text-gray-500 dark:text-gray-300">پشتیبانی 24 ساعته</p>
            </span>
            <span class="flex flex-col items-center justify-center">
                <img class="w-14 h-14" src="./assets/images/svg/5.svg" alt="">
                <p class="text-gray-500 dark:text-gray-300">امکان پرداخت در محل</p>
            </span>
        </div>
    </main>
@endsection


