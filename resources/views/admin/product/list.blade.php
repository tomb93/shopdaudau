@extends('admin.main')

@section('content')
    <table class="table table-sm">
        <thead>
            <tr>
                <th style="width: 50px">Id</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::product($products) !!}
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection
