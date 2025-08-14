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
                        <span class="ms-1 text-sm  text-gray-500 md:ms-2 dark:text-gray-400">سبد خرید</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- shopping cart -->
        <section
            class="flex flex-col lg:flex-row justify-between items-start gap-4 child:rounded-lg child:bg-white child:dark:bg-gray-800 child:shadow child:p-4 mt-5">
            <!-- products -->
            <div class="w-full lg:w-3/4 flex flex-col gap-y-8 ">
                <!-- shopping cart header -->
                <div class="flex items-center justify-between">
                    <span class="flex items-center gap-x-2">
                        <h2 class="font-DanaMedium text-xl">سبد خرید</h2>
                        @if(getCartProductsCount())
                            <p class="text-gray-400">
                            (
                            {{getCartProductsCount()}}
                            کالا
                            )
                        </p>
                        @endif
                    </span>
                    @if(getCartProductsCount())
                        <a href="{{route('cart.clear')}}" class="flex items-center gap-x-1 text-red-600 dark:text-white cursor-pointer">
                            <p class="mt-1 font-DanaMedium ">حذف همه</p>
                            <svg class="w-5 h-5">
                                <use href="#trash"></use>
                            </svg>
                        </a>
                    @endif
                </div>
                <!-- PRODUCT ITEMS -->
                <div
                    class="w-full flex flex-col gap-y-4 child:p-2 lg:child:p-4 ">
                    @forelse($userCartItems as $CartItem)
                        <!-- PRODUCT ITEM -->
                        <div
                            class="w-full flex justify-between relative border-b-2 border-gray-200 dark:border-white/20 ">
                            <div class="flex flex-col sm:flex-row items-center gap-6">
                                <!-- IMG AND COUNT BTN -->
                                <div class="flex w-fit flex-col">
                                    <img src="{{asset('assets/images/products/8.webp')}}" class="w-36" alt="">
                                    <button
                                        class="flex items-center justify-between gap-x-1 rounded-lg border border-gray-200 dark:border-white/20 py-1 px-2">
                                        <svg class="w-4 h-4 increment text-green-600">
                                            <use href="#plus"></use>
                                        </svg>
                                        <input
                                            type="number"
                                            name="customInput"
                                            id="customInput"
                                            min="1"
                                            max="{{$CartItem['product']->qty}}"
                                            value="{{$CartItem['qty']}}"
                                            class="custom-input mr-8 text-lg bg-transparent"
                                        >
                                        <svg class="w-4 h-4 decrement text-red-500">
                                            <use href="#minus"></use>
                                        </svg>
                                    </button>
                                </div>
                                <!-- information and name product -->
                                <div class="flex flex-col gap-y-4">
                                    <h2 class="font-DanaMedium line-clamp-1">
                                        {{$CartItem['product']->name}}
                                    </h2>
                                    <h2 class="font-DanaMedium line-clamp-1">
                                        {{$CartItem['product']->name_en }}
                                    </h2>
                                    <span
                                        class="flex items-center gap-x-1 text-gray-700 dark:text-gray-300 font-DanaMedium mt-4">
                                        <div class="product-card_price">
                                            @if($CartItem['product']->qty > 0)
                                                @if($CartItem['product']->discount > 0)
                                                    <del>{{number_format($CartItem['product']->price)}}<h6>تومان</h6></del>
                                                    <p>{{number_format($CartItem['product']->discount - $CartItem['product']->price)}}</p>
                                                @else
                                                    <p>{{number_format($CartItem['product']->price)}}</p>
                                                @endif
                                                <span>تومان</span>
                                            @else
                                                <span style="background-color: red">ناموجود</span>
                                            @endif
                                         </div>
                                    </span>
                                    <svg class=" flex sm:hidden absolute top-0 left-0 w-5 h-5">
                                        <use href="#close"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="hidden sm:flex items-end justify-between flex-col">
                                <a href="{{route('cart.remove', $CartItem['product_id'])}}">
                                    <svg class="w-5 h-5 cursor-pointer">
                                        <use href="#x-mark"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <span>در سبد خرید شما محصولی وجود ندارد</span>
                    @endforelse
                </div>
            </div>

            <!-- PRICE BOX -->
            <div class="w-full lg:w-1/4 lg:sticky top-5 flex flex-col gap-y-4">
                <!-- PRICE -->
                <ul class="child:flex child:items-center child:justify-between space-y-8">
                    <li>
                        <p>قیمت کالاها(۱)</p>
                        <p class="flex gap-x-1 text-gray-600 dark:text-gray-300 ">۱۲۵,۰۰۰,۰۰۰ <span
                                class="hidden xl:flex">تومان</span></p>
                    </li>
                    <li>
                        <p>تخفیف </p>
                        <p class="font-DanaMedium text-gray-700 dark:text-gray-200">۵۰۰,۰۰۰ تومان </p>
                    </li>
                    <li class="border-t-2 border-dashed border-gray-400 pt-8">
                        <p> مبلغ نهایی :</p>
                        <p>۱۱۹,۵۰۰,۰۰۰ تومان</p>
                    </li>
                </ul>

                <a href="./checkout.html"
                   class="w-full mt-4 flex items-center gap-x-1 justify-center bg-blue-500 text-white hover:bg-blue-600 transition-all rounded-lg shadow py-2">
                    تایید و تکمیل سفارش
                    <svg class="w-5 h-5">
                        <use href="#shopping-bag"></use>
                    </svg>
                </a>

            </div>
        </section>

    </main>
@endsection
