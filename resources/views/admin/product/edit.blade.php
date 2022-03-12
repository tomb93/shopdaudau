@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtTenSP">Tên sản phẩm</label>
                        <input type="text" name="txtTenSP" value="{{ $product->name }}" class="form-control"
                            id="txtTenSP" placeholder="Enter name product">
                    </div>
                    <div class="form-group">
                        <label for="txtGiaSP">Giá</label>
                        <input type="number" name="txtGiaSP" value="{{ $product->price }}" class="form-control"
                            id="txtGiaSP" placeholder="Enter price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selDMmenu">Thuộc danh mục (menu)</label>
                        <select class="form-control" name="selDMmenu">
                            @foreach ($menus as $item)
                                <option value="{{ $item->id }}"
                                    {{ $product->menu_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtGiaSaleSP">Giá sale</label>
                        <input type="number" name="txtGiaSaleSP" value="{{ $product->price_sale }}" class="form-control"
                            id="txtGiaSaleSP" placeholder="Enter price sale">
                    </div>
                </div>
            </div>
            <div class="  form-group">
                <label for="txtDesc">Mô tả</label>
                <textarea type="text" name='txtDesc' class="form-control" id="txtDesc"
                    placeholder="Enter decription">{{ $product->decription }}</textarea>
            </div>
            <div class="form-group">
                <label for="txtContent">Mô tả chi tiết</label>
                <textarea type="text" name='txtContent' class="form-control"
                    id="txtContent">{{ $product->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="upload">Ảnh sản phẩm</label>
                <input type="file" name='upload' class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $product->thumb }}" target="_blank">
                        <img src="{{ $product->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
            </div>
            <div class="form-check-inline">
                <label for="txtContent">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" name="active"
                        {{ $product->active == 1 ? 'checked' : '' }}>
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" name="active"
                        {{ $product->active == 0 ? 'checked' : '' }}>
                    <label class="form-check-label">Không</label>
                </div>
            </div>

            @csrf
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('txtContent');
    </script>
@endsection
