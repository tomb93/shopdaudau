@extends('admin.main')
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tiêu đề</label>
                        <input type="text" name="name" value="{{ $slider->name }}" id="name" placeholder=""
                            class="form-control" id="txtTenSP" placeholder="Enter name title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="url">Đường dẫn</label>
                        <input type="text" name="url" value="{{ $slider->url }}" class="form-control" id="url"
                            placeholder="Enter url">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="upload">Ảnh sản phẩm</label>
                <input type="file" name='upload' class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $slider->thumb }}" target="_blank">
                        <img src="{{ $slider->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $slider->thumb }}" id="thumb">
            </div>
            <div class="form-group">
                <label for="sort_by">Sắp Xếp</label>
                <input type="number" name="sort_by" value="{{ $slider->sort_by }}" class="form-control" id="sort_by">
            </div>
            <div class="form-check-inline">
                <label for="txtContent">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" name="active"
                        {{ $slider->active == 1 ? 'checked' : '' }}>
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" name="active"
                        {{ $slider->active == 0 ? 'checked' : '' }}>
                    <label class="form-check-label">Không</label>
                </div>
            </div>
        </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Slider</button>
        </div>
        @csrf
    </form>
@endsection
