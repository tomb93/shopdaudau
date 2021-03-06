<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Tomb</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                {{-- menu --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tasks"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menu/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Th??m</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menu/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh s??ch</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- San pham --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon	fa fa-shopping-bag"></i>
                        <p>
                            S???n Ph???m
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/products/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Th??m S???n ph???m</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/products/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh s??ch SP</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- slider --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-images"></i>
                        <p>
                            Sliders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Th??m Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh s??ch Slider</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- CArt --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cart-plus"></i>
                        <p>
                            Carts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/cart/order-list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>????n h??ng</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/admin/cart/customer-list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kh??ch h??ng</p>
                            </a>
                        </li> --}}

                    </ul>
                </li>

                {{-- Blog/Tin-Tuc --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Blogs/Tin T???c
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/blogs/menu" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh M???c</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/blogs/post" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>B??i Vi???t</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
