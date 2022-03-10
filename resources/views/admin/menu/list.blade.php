@extends('admin.main')

@section('content')
<table class="table table-sm">
    <thead>
      <tr>
        <th style="width: 50px">Id</th>
        <th>Name</th>
        <th>Active</th>
        <th>Update</th>
        <th style="width: 100px">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
        {!! \App\Helpers\Helper::menu($menus) !!}
    </tbody>
  </table>
@endsection