<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        <div class='mb-2'>
            <i style="color:red;font-size: 12px">
                (*) Click vào hình để xóa sản phẩm
            </i>
        </div>
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @php $sumPrice = 0; @endphp
                @if (isset($products))
                    @foreach ($products as $item)
                        @php
                            $sumPrice += ($item->price_sale != 0 ? $item->price_sale : $item->price) * $carts[$item->id];
                        @endphp
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <a href="/gio-hang/delete/{{ $item->id }}">
                                <div class="header-cart-item-img">
                                    <img src="{{ $item->thumb }}" alt="IMG">
                                </div>
                            </a>
                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{ $item->name }}
                                </a>

                                <span class="header-cart-item-info">
                                    {{ $carts[$item->id] }} x {!! \App\Helpers\helper::price($item->price, $item->price_sale) !!}
                                </span>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: {!! \App\Helpers\helper::FormatVND($sumPrice) !!}
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="/gio-hang"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Giỏ Hàng
                    </a>

                    <a href="/check-out"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Thanh Toán
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
