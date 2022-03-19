@extends('admin.main')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3">
                <!-- /.card -->
                <!-- About Me Box -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Khách hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <span class="text-muted">
                            <i class="fas fa-book mr-1"></i> Tên
                        </span>
                        <p><strong>{{ $customer->name }}</strong></p>
                        <hr>

                        <span class="text-muted"><strong><i class="fas fa-map-marker-alt mr-1"></i>Địa
                                chỉ</strong></span>

                        <p>
                            @php
                                $diachi = explode('/', $customer->address);
                            @endphp
                            <span class="text-muted">Tỉnh/Thành phố: </span>{{ $diachi[3] }}<br>
                            <span class="text-muted">Quận/Huyện: </span>{{ $diachi[2] }}<br>
                            <span class="text-muted">Phường/Xã: </span>{{ $diachi[1] }}<br>
                            {{ $diachi[0] }}
                        </p>

                        <hr>

                        <span class="text-muted"><i class="fas fa-pencil-alt mr-1"></i> Email</span>

                        <p>
                            <strong>{{ $customer->email }}</strong>
                        </p>

                        <hr>

                        <span class="text-muted"><i class="far fa-file-alt mr-1"></i>Ghi chú</span>

                        <p> <strong>{{ $customer->content }}</strong></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">

                {{-- thông tin đặt hàng --}}
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm đã đặt</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 30%">
                                        #
                                    </th>
                                    <th style="width: 15%">
                                        phân loại
                                    </th>
                                    <th style="width: 15%">
                                        Số lượng
                                    </th>
                                    <th style="width: 15%">
                                        Giá
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Tổng
                                    </th>
                                    <th style="width: 5%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $tamtinh = 0;
                                @endphp
                                @foreach ($carts as $key => $item)
                                    @php
                                        $sumProduct = $item->qty * $item->price;
                                        $tamtinh += $sumProduct;
                                    @endphp
                                    <tr>
                                        <td class="text-center">
                                            <a target="_blank"
                                                href="/san-pham/{{ $item->product->id . '-' . $item->product->slug }}">
                                                <img alt="Avatar" class="table-avatar"
                                                    src="{{ $item->product->thumb }}"><br>
                                                <small>{{ $item->product->name }}</small>
                                            </a>
                                        </td>
                                        <td><small>Không có<small></td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->price, '0', ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($sumProduct, '0', ',', '.') }}</td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-xs" href="#">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a><br>
                                            <a class="btn btn-danger btn-xs" href="#">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </td>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-weight-bold h6">
                                    <td colspan="4" class="text-md-right">Tạm tính: </td>
                                    <td colspan="2" class="text-left">{{ number_format($tamtinh, '0', ',', '.') }}
                                        VND
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

                {{-- thông tin thanh toán --}}
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-4">
                                <p class="lead">Phương thức thanh toán:</p>
                                <div class="custom-control custom-radio">
                                    <input id="radcod" class="custom-control-input custom-control-input-danger" type="radio"
                                        value="cod" name="methodPayment" checked="checked">
                                    <label for="radcod" class="custom-control-label">COD</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="radmomo" class="custom-control-input custom-control-input-danger"
                                        type="radio" value="momo" name="methodPayment">
                                    <label for="radmomo" class="custom-control-label">Momo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="radzlp" class="custom-control-input custom-control-input-danger" type="radio"
                                        value="zalopay" name="methodPayment">
                                    <label for="radzlp" class="custom-control-label">Zalopay</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="radvnp" class="custom-control-input custom-control-input-danger" type="radio"
                                        value="vnpay" name="methodPayment">
                                    <label for='radvnp' class="custom-control-label">VNpay</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="radck" class="custom-control-input custom-control-input-danger" type="radio"
                                        value="ck" name="methodPayment">
                                    <label for="radck" class="custom-control-label">Chuyển khoản</label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-8">
                                <p class="lead">Đơn ngày 2/22/2014</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @php
                                                $shipping = 0;
                                                $coupon = 0;
                                                $tongThanhtoan = $tamtinh + $shipping + $coupon;
                                            @endphp
                                            <tr>
                                                <th style="width:50%">
                                                    Tạm tính: </th>
                                                <td class="text-right"> {{ number_format($tamtinh, '0', ',', '.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Mã giảm giá: </th>
                                                <td class="text-right">- {{ number_format($coupon, '0', ',', '.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Vận chuyển:</th>
                                                <td class="text-right">-
                                                    {{ number_format($shipping, '0', ',', '.') }}</td>
                                            </tr>
                                            <tr class="h4">
                                                <th>Total:</th>
                                                <td class='font-weight-normal text-danger text-right'>
                                                    {{ number_format($tongThanhtoan, '0', ',', '.') }} VND</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row no-print">
            <div class="col-12">
                <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> In hóa
                    đơn</a>
                <button type="button" class="btn btn-success float-right">
                    Cập nhật trạng thái
                </button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    Sửa TT Khách Hàng
                </button>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
