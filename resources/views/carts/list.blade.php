@extends('main')
@section('content')
    @php $total = 0; @endphp
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Giỏ hàng
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <form class="bg0 p-t-25 p-b-25" method="post">
        <div class="container">
            @if (count($products) != 0)
                <div class="row">
                    <div class="col-12 m-l-30">
                        <i style="color:red;font-size: 12px">
                            (*) Click vào hình để xóa sản phẩm
                        </i>
                    </div>
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Sản phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Giá</th>
                                        <th class="column-4">Số lượng</th>
                                        <th class="column-5">Tổng</th>
                                    </tr>
                                    @foreach ($products as $item)
                                        @php
                                            $price = $item->price_sale != 0 ? $item->price_sale : $item->price;
                                            $price_end = $price * $carts[$item->id];
                                            $total += $price_end;
                                        @endphp
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <a href="/delete/{{ $item->id }}">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ $item->thumb }}" classalt="IMG">
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="column-2"><a
                                                    href="/san-pham/{{ $item->id . '-' . $item->slug }}">{{ $item->name }}</a>
                                            </td>
                                            <td class="column-3">
                                                {{ $item->price_sale != 0 ? $item->price_sale : $item->price }}</td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        name="num-product[{{ $item->id }}]"
                                                        value="{{ $carts[$item->id] }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5">{{ $price_end }}</td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                        name="coupon" placeholder="Coupon Code">

                                    <div
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Apply coupon
                                    </div>
                                </div>

                                <input type="submit" formaction="/update-cart"
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10"
                                    value="Update Cart">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>
                            {{-- tạm tính --}}
                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Tạm tính:
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2">
                                        {{ $total }}
                                    </span>
                                </div>
                            </div>
                            {{-- shipping --}}
                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                <div class="size-208 w-full-ssm">
                                    <span class="stext-110 cl2">
                                        Vận chuyển:
                                    </span>
                                </div>
                                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                    <span class="mtext-110 cl2">
                                        0
                                    </span>
                                </div>
                            </div>
                            {{-- coupon --}}
                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                <div class="size-208 w-full-ssm">
                                    <span class="stext-110 cl2">
                                        Mã giảm giá:
                                    </span>
                                </div>

                                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                    <span class="mtext-110 cl2">
                                        0
                                    </span>
                                </div>
                            </div>
                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{ $total }}
                                    </span>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                THANH TOÁN
                            </button>
                        </div>
                    </div>

                </div>
            @else
                <div class="text-center">
                    <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                    <a href="/" class="btn btn-outline-danger mt-3">TIẾP TỤC MUA
                        SẮM</a>
                </div>
            @endif
        </div>
    </form>
@endsection
