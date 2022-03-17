@extends('main')
@section('content')
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            @include('filterSort')
            <div id="loadProduct">
                @include('products.list')
            </div>

            <!-- loadmore -->
            <div class="flex-c-m flex-w w-full p-t-45" id="btn-loadmore">
                <input type="hidden" id="productPage" value="1">
                <a href="#" id="loadMore" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
            </div>
        </div>
    </div>
@endsection
