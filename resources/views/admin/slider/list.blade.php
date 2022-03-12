@extends('admin.main')

@section('content')
    <table class="table table-sm">
        <thead>
            <tr>
                <th style="width: 50px">Id</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Link</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::slider($sliders) !!}
        </tbody>
    </table>
    {!! $sliders->links() !!}
@endsection
