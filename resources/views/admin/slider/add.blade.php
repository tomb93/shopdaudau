@extends('admin.main')
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="txtTenSP"
                            placeholder="Enter name title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Đường dẫn</label>
                        <input type="text" name="url" value="{{ old('url') }}" class="form-control" id="url"
                            placeholder="Enter url">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="upload">Ảnh sản phẩm</label>
                <input type="file" name='upload' class="form-control" id="upload">
                <div id="image_show">
                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
            <div class="form-group">
                <label for="sort_by">Sắp Xếp</label>
                <input type="number" name="sort_by" value="1" class="form-control" id="sort_by">
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
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Slider</button>
        </div>
        @csrf
    </form>
@endsection
