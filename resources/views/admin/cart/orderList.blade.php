@extends('admin.main')
@section('content')
    <table class="table table-sm">
        <thead>
            <tr>
                <th style="width: 50px">Id</th>
                <th>Tên KH</th>
                <th>SDT</th>
                <th>Email</th>
                <th>Ngày đặt</th>
                <th>Active</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::orders($orders) !!}
        </tbody>
    </table>
    {!! $orders->links() !!}
@endsection
