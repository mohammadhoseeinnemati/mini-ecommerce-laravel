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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm  text-gray-500 md:ms-2 dark:text-gray-400">فروشگاه</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row gap-4 mt-5">
            <!-- SIDE FILTER BOX -->
            <div
                class="lg:sticky top-1 h-fit lg:w-1/4 hidden lg:flex flex-col gap-y-4 items-center shadow rounded-lg py-4 dark:bg-gray-800 bg-white">
                <!-- TITLE -->
                <div class="flex items-center justify-between w-full px-2 xl:px-4">
                    <span class="flex items-center gap-x-1">
                        <p class="font-DanaMedium text-gray-700 dark:text-gray-200 text-lg">فیلترها
                        </p>
                    </span>
                    <a href="{{route('products.remove-filter')}}"
                       class="text-blue-500 dark:text-blue-400 text-sm cursor-pointer"> حذف فیلتر‌ها</a>
                </div>
                <!-- FILTERS -->
                <form action="" style="width: 100%;padding: 10px">
                    @csrf
                    <div class="w-full divide-y divide-slate-200 dark:divide-gray-700/20">
                        <!-- Accordion -->
                        <div class="">
                            <button type="button" onclick="toggleAccordion(1)"
                                    class="w-full flex justify-between items-center px-2 xl:px-4 pt-4 mb-4 text-gray-800 dark:text-gray-100">
                                <span>دسته بندی </span>
                                <span id="icon-1" class="text-gray-800 dark:text-gray-100">
                                <svg class="size-4 transition-transform duration-300">
                                    <use href="#chevron-left"></use>
                                </svg>
                            </span>
                            </button>
                            <div id="content-1" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                <div class="pb-3 text-gray-700 dark:text-gray-300 w-full flex flex-col gap-y-1.5">
                                    <!-- item -->
                                    <div class="inline-flex items-center mr-2.5 mt-1">
                                        <label class="relative flex cursor-pointer items-center rounded-full p-3"
                                               for="ripple-on" data-ripple-dark="true">
                                            <input id="ripple-on" type="checkbox"
                                                   class="peer relative h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow hover:shadow-md transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-slate-400 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-slate-400 hover:before:opacity-10 dark:bg-gray-600 dark:checked:bg-blue-500 darKchecked:bg-blue-500  "/>
                                            <span
                                                class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                 viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                 stroke-width="1">
                                                <path fill-rule="evenodd"
                                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        </label>
                                        <label class="cursor-pointer text-gray-800 dark:text-gray-400 mr-1"
                                               for="ripple-on">
                                            همه کالاها
                                        </label>
                                    </div>
                                    @foreach($categories as $category)
                                        <!-- item -->
                                        <div class="inline-flex items-center mr-2.5">
                                            <label
                                                class="relative flex cursor-pointer items-center rounded-full p-3"
                                                for="ripple-2" data-ripple-dark="true">
                                                <input
                                                    id="category-{{$category->id}}"
                                                    type="checkbox"
                                                    @checked(in_array($category->id, $filteredCategory ??[]))
                                                    name="category_id[{{$category->id}}]"
                                                    class="peer relative h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow hover:shadow-md transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-slate-400 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-slate-400 hover:before:opacity-10 dark:bg-gray-600 dark:checked:bg-blue-500 darKchecked:bg-blue-500  "/>
                                                <span
                                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-3.5 w-3.5"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    stroke="currentColor"
                                                    stroke-width="1">
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd">
                                                    </path>
                                                </svg>
                                            </span>
                                            </label>
                                            <label class="cursor-pointer text-gray-800 dark:text-gray-400 mr-1"
                                                   for="category-{{$category->id}}">
                                                {{$category->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- TOGGLE SWITCH -->
                        <div class="w-full justify-between flex items-center gap-x-3 px-2 xl:px-4 py-4" dir="ltr">
                            <label for="hs-valid-toggle-switch" class="relative inline-block w-11 h-6 cursor-pointer">
                                <input
                                    name="exists"
                                    type="checkbox"
                                    id="hs-valid-toggle-switch"
                                    class="peer sr-only"
                                    @checked(request()->filled('exists'))
                                >
                                <span
                                    class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-blue-500 dark:bg-neutral-700 dark:peer-checked:bg-blue-500 peer-disabled:opacity-50 peer-disabled:pointer-events-none"></span>
                                <span
                                    class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-xs transition-transform duration-200 ease-in-out peer-checked:translate-x-full dark:bg-neutral-400 dark:peer-checked:bg-white"></span>
                            </label>
                            <label for="hs-valid-toggle-switch" class="text-gray-800 dark:text-gray-100">
                                فقط کالا های موجود
                            </label>
                        </div>

                        @foreach(request()->only(['page','sort']) as $name => $value)
                            @if(!request()->filled($name))
                                @continue
                            @endif
                            <input type="hidden" name="{{$name}}" value="{{$value}}">
                        @endforeach

                    </div>
                    <div style="width: 100%; padding: 10px">
                        <button type="submit" tabindex="3" class="submit-btn">فیلتر</button>
                    </div>
                </form>
            </div>
            <!-- TOP FILTER BOX & PRODUCT & PAGINATION -->
            <div class="lg:w-3/4">
                <!-- MOBILE FILTERS -->
                <div class="flex lg:hidden items-center gap-x-2">
                    <!-- SORT BTN -->
                    <button
                        class="sort-modal-open text-sm mb-4 py-1.5 px-3 app-border rounded-full flex items-center gap-x-1">
                        <svg class="size-4 text-gray-400">
                            <use href="#sort-list"></use>
                        </svg>
                        <p>مرتبط ترین</p>
                    </button>
                    <!-- SORT MODAL -->
                    <div class="sort-modal">
                        <div class="flex justify-between sort-modal-close">
                            <p>مرتب سازی بر اساس </p>
                            <svg class="size-5 text-gray-800 dark:text-gray-300">
                                <use href="#x-mark"></use>
                            </svg>
                        </div>
                        <ul class="flex w-full child:w-full child:text-center flex-col items-center justify-center divide-y divide-gray-300 dark:divide-gray-200/20 child:py-3">
                            <li>مرتبط‌ترین</li>
                            <li>پربازدیدترین</li>
                            <li>جدیدترین</li>
                            <li>گران‌ترین</li>
                            <li>
                                منتخب
                            </li>
                            <li>پیشنهاد خریداران</li>
                            <li>
                                سریع‌ترین ارسال
                            </li>
                        </ul>
                    </div>
                    <!-- FILTER BTN -->
                    <button
                        class="filter-modal-open text-sm mb-4 py-1.5 px-3 app-border rounded-full flex items-center gap-x-1">
                        <svg class="size-4 text-gray-400">
                            <use href="#filter"></use>
                        </svg>
                        <p>فیلتر</p>
                    </button>
                    <!-- Filter MODAL -->
                    <div class="filter-modal">
                        <div class="flex justify-between filter-modal-close">
                            <p>فیلتر</p>
                            <svg class="size-5 text-gray-800 dark:text-gray-300">
                                <use href="#x-mark"></use>
                            </svg>
                        </div>
                        <!-- FILTERS -->
                        <div class="w-full divide-y divide-slate-200 dark:divide-gray-700/20">
                            <!-- Accordion -->
                            <div class="">
                                <button onclick="toggleAccordion(3)"
                                        class="w-full flex justify-between items-center px-2 xl:px-4 pt-4 mb-4 text-gray-800 dark:text-gray-100">
                                    <span>دسته بندی </span>
                                    <span id="icon-1" class="text-gray-800 dark:text-gray-100">
                                <svg class="size-4 transition-transform duration-300">
                                    <use href="#chevron-left"></use>
                                </svg>
                            </span>
                                </button>
                                <div id="content-3"
                                     class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <div class="pb-3 text-gray-700 dark:text-gray-300 w-full flex flex-col gap-y-1.5">
                                        <!-- item -->
                                        <div class="inline-flex items-center mr-2.5 mt-1">
                                            <label class="relative flex cursor-pointer items-center rounded-full p-3"
                                                   for="ripple-5" data-ripple-dark="true">
                                                <input id="ripple-5" type="checkbox"
                                                       class="peer relative h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow hover:shadow-md transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-slate-400 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-slate-400 hover:before:opacity-10 dark:bg-gray-600 dark:checked:bg-blue-500 darKchecked:bg-blue-500  "/>
                                                <span
                                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                 viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                 stroke-width="1">
                                                <path fill-rule="evenodd"
                                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                            </label>
                                            <label class="cursor-pointer text-gray-800 dark:text-gray-400 mr-1"
                                                   for="ripple-5">
                                                همه کالاها
                                            </label>
                                        </div>
                                        <!-- item -->
                                        <div class="inline-flex items-center mr-2.5">
                                            <label class="relative flex cursor-pointer items-center rounded-full p-3"
                                                   for="ripple-6" data-ripple-dark="true">
                                                <input id="ripple-6" type="checkbox"
                                                       class="peer relative h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow hover:shadow-md transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-slate-400 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-slate-400 hover:before:opacity-10 dark:bg-gray-600 dark:checked:bg-blue-500 darKchecked:bg-blue-500  "/>
                                                <span
                                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                 viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                 stroke-width="1">
                                                <path fill-rule="evenodd"
                                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                            </label>
                                            <label class="cursor-pointer text-gray-800 dark:text-gray-400 mr-1"
                                                   for="ripple-6">
                                                موبایل
                                            </label>
                                        </div>
                                        <!-- item -->
                                        <div class="inline-flex items-center mr-2.5">
                                            <label class="relative flex cursor-pointer items-center rounded-full p-3"
                                                   for="ripple-7" data-ripple-dark="true">
                                                <input id="ripple-7" type="checkbox"
                                                       class="peer relative h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow hover:shadow-md transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-slate-400 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-slate-400 hover:before:opacity-10 dark:bg-gray-600 dark:checked:bg-blue-500 darKchecked:bg-blue-500  "/>
                                                <span
                                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                 viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                 stroke-width="1">
                                                <path fill-rule="evenodd"
                                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                            </label>
                                            <label class="cursor-pointer text-gray-800 dark:text-gray-400 mr-1"
                                                   for="ripple-7">
                                                لپ تاپ
                                            </label>
                                        </div>
                                        <!-- item -->
                                        <div class="inline-flex items-center mr-2.5">
                                            <label class="relative flex cursor-pointer items-center rounded-full p-3"
                                                   for="ripple-8" data-ripple-dark="true">
                                                <input id="ripple-8" type="checkbox"
                                                       class="peer relative h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow hover:shadow-md transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-slate-400 before:opacity-0 before:transition-opacity checked:border-blue-500 checked:bg-blue-500 checked:before:bg-slate-400 hover:before:opacity-10 dark:bg-gray-600 dark:checked:bg-blue-500 darKchecked:bg-blue-500  "/>
                                                <span
                                                    class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                 viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                 stroke-width="1">
                                                <path fill-rule="evenodd"
                                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                            </label>
                                            <label class="cursor-pointer text-gray-800 dark:text-gray-400 mr-1"
                                                   for="ripple-8">
                                                هدفون، هدست
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- TOGGLE SWITCH -->
                            <div class="w-full justify-between flex items-center gap-x-3 px-2 xl:px-4 py-4" dir="ltr">
                                <label for="hs-valid-toggle-switch5"
                                       class="relative inline-block w-11 h-6 cursor-pointer">
                                    <input type="checkbox" id="hs-valid-toggle-switch5" class="peer sr-only">
                                    <span
                                        class="absolute inset-0 bg-gray-200 rounded-full transition-colors duration-200 ease-in-out peer-checked:bg-blue-500 dark:bg-neutral-700 dark:peer-checked:bg-blue-500 peer-disabled:opacity-50 peer-disabled:pointer-events-none"></span>
                                    <span
                                        class="absolute top-1/2 start-0.5 -translate-y-1/2 size-5 bg-white rounded-full shadow-xs transition-transform duration-200 ease-in-out peer-checked:translate-x-full dark:bg-neutral-400 dark:peer-checked:bg-white"></span>
                                </label>
                                <label for="hs-valid-toggle-switch5" class="text-gray-800 dark:text-gray-100">
                                    فقط کالا های موجود
                                </label>
                            </div>
                            <!-- TOGGLE SWITCH -->

                        </div>
                    </div>
                    <span class="text-sm text-gray-400 ms-auto py-1.5 px-4">
                        {{number_format($productsCount)}}
                        کالا
                    </span>
                </div>
                <!-- TOP FILTER BOX -->
                <div class="hidden lg:flex items-center justify-between  mb-6">
                    <div class="flex items-center gap-x-5">
                        <div class="flex items-center gap-x-2">
                            <svg class="size-6 text-gray-400">
                                <use href="#sort-list"></use>
                            </svg>
                            <h2 class="font-DanaDemiBold text-gray-400">مرتب سازی :</h2>
                        </div>

                        <form class="max-w-sm mx-auto" style="display: flex;gap: 20px">
                            <div style="width: 50%">
                                <button
                                    type="submit"
                                    style="padding: 9px 20px" tabindex="3" class="submit-btn">
                                    اعمال
                                </button>
                            </div>
                            <select
                                id="sort"
                                name="sort"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                                <option value="newest" selected>جدید ترین</option>
                                <option value="most_wanted">پرفروش ترین</option>
                                <option value="lowest">ارزان ترین</option>
                                <option value="highest">گران ترین</option>
                            </select>

                            @foreach(request()->only(['page','exists']) as $name => $value)
                                @if(!request()->filled($name))
                                    @continue
                                @endif
                                <input type="hidden" name="{{$name}}" value="{{$value}}">
                            @endforeach

                            @foreach(request()->input('$category_id')??[] as $name => $value)

                                <input type="hidden" name="$category_id[{{$name}}]" value="{{$value}}">
                            @endforeach
                        </form>
                    </div>
                    <span class="text-sm text-gray-400 end">
                        {{number_format($productsCount)}}
                        کالا
                    </span>
                </div>

                <!-- PRODUCTS -->
                <div
                    class="grid grid-cols-1 xxs:grid-cols-2 xs:grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 gap-3 xs:gap-2 sm:gap-4">
                    <!-- PRODUCT ITEM -->
                    @forelse($products as $product)
                        <div class=" product-card group">
                            <!-- product header -->
                            <div class="product-card_header">
                                <div class="flex items-center gap-x-2">
                                    @if($product->qty > 0)
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
                                    @endif
                                </div>
                                <!-- badge offer -->
                                @if($product->discount > 0)
                                    <span class="product-card_badge">
                                    {{getProductDiscount($product->price , $product->discount)}}
                                    %
                                    تخفیف
                                </span>
                                @endif
                            </div>
                            <!-- product img -->
                            <a href="{{route('products.show', $product->id)}}">
                                <img class="product-card_img group-hover:opacity-0 absolute"
                                     src="{{asset('assets/images/products/2.png')}}"
                                     alt="">
                                <img class="product-card_img opacity-0 group-hover:opacity-100"
                                     src="{{asset('assets/images/products/2.png')}}" alt="">
                            </a>
                            <!--  product footer -->
                            <div class="space-y-2">
                                <a href="{{route('products.show', $product->id)}}" class="product-card_link">
                                    {{$product->name . ' | '.$product->name_en}}
                                </a>
                                <!-- Rate and Price -->
                                <div class="product-card_price-wrapper">
                                    <!-- Price -->
                                    <div class="product-card_price">
                                        @if($product->qty > 0)
                                            @if($product->discount > 0)
                                                <del>{{number_format($product->price)}}<h6>تومان</h6></del>
                                                <p>{{number_format($product->discount - $product->price)}}</p>
                                            @else
                                                <p>{{number_format($product->price)}}</p>
                                            @endif
                                            <span>تومان</span>
                                        @else
                                            <span style="background-color: red">ناموجود</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            محصولی یافت نشد
                        </div>
                    @endforelse
                </div>
                <!-- PAGINATION -->
                <div class="mt-10 w-full ">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </main>

@endsection
