    <nav class="side-navbar">
        <div class="side-navbar-wrapper">
            <!-- Sidebar Header    -->
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <!-- User Info-->
                <div class="sidenav-header-inner text-center"><img src="#" alt="person" class="img-fluid rounded-circle">
                    {{-- <h2 class="h5">Nathan Andrews</h2><span>Web Developer</span> --}}
                </div>
                <!-- Small Brand information, appears on minimized sidebar-->
                <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                        <strong>B</strong><strong class="text-primary">D</strong></a></div>
            </div>
            <!-- Sidebar Navigation Menus-->
            <div class="main-menu">
                <h5 class="sidenav-heading">Main</h5>
                @if (auth()->user()->role == 'admin')
                    <ul id="side-main-menu" class="side-menu list-unstyled">
                        <li><a href="{{ route('home') }}"> <i class="icon-home"></i>Home </a></li>
                        <li><a href="{{ route('users.index') }}"> <i class="icon-form"></i>Users </a></li>
                        <li><a href="{{ route('desiners.index') }}"> <i class="icon-form"></i>Desiners </a></li>
                        <li><a href="{{ route('products.index') }}"> <i class="icon-form"></i>Products </a></li>
                        <li><a href="{{ route('products-categories.index') }}"> <i class="icon-form"></i>Products
                                Categories</a></li>
                        <li><a href="{{ route('orders.index') }}"> <i class="icon-form"></i>Orders </a></li>
                        <li><a href="{{ route('pages.index') }}"> <i class="icon-form"></i>Pages </a></li>
                        <li><a href="{{ route('contactform.index') }}"> <i class="icon-form"></i>Contact Form
                            </a></li>
                        <li><a href="{{ route('vendor.index') }}"> <i class="icon-form"></i>Vendor Form </a></li>
                        <li><a href="{{ route('bulkproduct.index') }}"> <i class="icon-form"></i>Bulk Order Form
                            </a>
                        </li>

                    </ul>
                @endif

                @if (auth()->user()->role == 'user')
                    <ul id="side-main-menu" class="side-menu list-unstyled">
                        <li><a href="{{ route('home') }}"> <i class="icon-home"></i>Home </a></li>
                        <li><a href="{{ route('userorders') }}"> <i class="icon-form"></i>Orders </a></li>
                        </a>
                        </li>
                    </ul>
                @endif
            </div>
            {{-- <div class="admin-menu">
                <h5 class="sidenav-heading">Second menu</h5>
                <ul id="side-admin-menu" class="side-menu list-unstyled">
                    <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
                    <li> <a href="#"> <i class="icon-flask"> </i>Demo
                            <div class="badge badge-info">Special</div>
                        </a></li>
                    <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
                    <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
                </ul>
            </div> --}}
        </div>
    </nav>
