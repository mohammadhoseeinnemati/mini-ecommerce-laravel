<div class="swiper-slide product-card group">
    <!-- product header -->
    <div class="product-card_header">
        <div class="flex items-center gap-x-2">
            @if($product->qty > 0)
                <form method="post" action="{{route('cart.add')}}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="qty" value="1">
                    <div class="tooltip">
                        <button
                            type="submit"
                            class="rounded-full p-1.5 app-border app-hover">
                            <svg class="size-4">
                                <use href="#shopping-cart"></use>
                            </svg>
                        </button>
                        <div class="tooltiptext">
                            سبد خرید
                        </div>
                    </div>
                </form>
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
