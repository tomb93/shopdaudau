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
                        <input type="text" name="txtTenSP" class="form-control" id="txtTenSP"
                            placeholder="Enter name product">
                    </div>
                    <div class="form-group">
                        <label for="txtGiaSP">Giá</label>
                        <input type="text" name="txtGiaSP" class="form-control" id="txtGiaSP" placeholder="Enter price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selDMcha">Thuộc danh mục</label>
                        <select class="form-control" name="selParent_id">
                            <option value="0">Danh mục cha</option>
                            {{-- @foreach ($menus as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtGiaSaleSP">Giá sale</label>
                        <input type="text" name="txtGiaSaleSP" class="form-control" id="txtGiaSaleSP"
                            placeholder="Enter price sale">
                    </div>
                </div>
            </div>
            <div class="  form-group">
                <label for="txtDesc">Mô tả</label>
                <textarea type="text" name='txtDesc' class="form-control" id="txtDesc"
                    placeholder="Enter decription"></textarea>
            </div>
            <div class="form-group">
                <label for="txtContent">Mô tả chi tiết</label>
                <textarea type="text" name='txtContent' class="form-control" id="txtContent"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name='fileImage' class="custom-file-input" id="imgSP">
                        <label class="custom-file-label" for="imgSP">Tải ảnh lên</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-check-inline">
                <label for="txtContent">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" name="active" checked="">
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" name="active">
                    <label class="form-check-label">Không</label>
                </div>
            </div>

            @csrf
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('txtContent');
    </script>
@endsection
