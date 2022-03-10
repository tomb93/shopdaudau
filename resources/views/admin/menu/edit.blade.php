@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="txtTenDM">Tên danh mục</label>
                <input type="text" name='txtTenDM' class="form-control" id="txtTenDM" placeholder="Enter name"
                    value="{{ $menu->name }}">
            </div>
            <div class="form-group">
                <label for="selDMcha">Thuộc danh mục</label>
                <select class="form-control" name="selParent_id">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh mục cha</option>
                    @foreach ($menus as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $menu->parent_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="txtDesc">Mô tả</label>
                <textarea type="text" name='txtDesc' class="form-control" id="txtDesc"
                    placeholder="Enter decription">{{ $menu->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="txtContent">Mô tả chi tiết</label>
                <textarea type="text" name='txtContent' class="form-control" id="txtContent">{{ $menu->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="txtContent">Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" name="active" {{ $menu->active == 1 ? 'checked' : '' }}>
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="0" name="active" {{ $menu->active == 0 ? 'checked' : '' }}>
                    <label class="form-check-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('txtContent');
    </script>
@endsection
