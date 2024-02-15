  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              {{-- {{dd(request()->segment(1))}} --}}
              <a class="nav-link {{ request()->segment(1) == 'home' ? '' : 'collapsed' }}" href="{{ route('home') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          @if (auth()->user()->role == 'admin')
              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'users' ? '' : 'collapsed' }}"
                      href="{{ route('users.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>User</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              {{-- <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'desiners' ? '' : 'collapsed' }}"
                      href="{{ route('desiners.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Desiner</span>
                  </a>
              </li><!-- End Dashboard Nav --> --}}

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'products' ? '' : 'collapsed' }}"
                      href="{{ route('products.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Products</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'products-categories' ? '' : 'collapsed' }}"
                      href="{{ route('product-subcategories.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Category</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'tags' ? '' : 'collapsed' }}"
                      href="{{ route('tags.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Tags</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'sidebar' ? '' : 'collapsed' }}"
                      href="{{ route('sidebar.create') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Frontend Side Bar</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'orders' ? '' : 'collapsed' }}"
                      href="{{ route('orders.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Orders</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'pages' ? '' : 'collapsed' }}"
                      href="{{ route('pages.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Pages</span>
                  </a>
              </li><!-- End Dashboard Nav -->


              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'blog' ? '' : 'collapsed' }}"
                      href="{{ route('blog.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Blogs</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'pages-images' ? '' : 'collapsed' }}"
                      href="{{ route('pages-images.create') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Pages Images</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  {{-- {{dd(request()->segment(1))}} --}}
                  <a class="nav-link {{ request()->segment(1) == 'home-slider' ? '' : 'collapsed' }}"
                      href="{{ route('home-slider.create') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Home Pages Slider</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  {{-- {{dd(request()->segment(1))}} --}}
                  <a class="nav-link {{ request()->segment(1) == 'shop' ? '' : 'collapsed' }}"
                      href="{{ route('slider.create') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Shop Pages Slider</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'footer-image' ? '' : 'collapsed' }}"
                      href="{{ route('footer.image') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Footer Images</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'contactform-index' ? '' : 'collapsed' }}"
                      href="{{ route('contactform.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Contact Form</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              {{-- <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'vendor-index' ? '' : 'collapsed' }}"
                      href="{{ route('vendor.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Vendor</span>
                  </a>
              </li><!-- End Dashboard Nav --> --}}

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'bulkproduct-index' ? '' : 'collapsed' }}"
                      href="{{ route('bulkproduct.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>Bulk Product</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <li class="nav-item">
                  <a class="nav-link {{ request()->segment(1) == 'newsletter' ? '' : 'collapsed' }}"
                      href="{{ route('newsletter.index') }}">
                      <i class="bi bi-journal-text"></i>
                      <span>NewsLetters</span>
                  </a>
              </li><!-- End Dashboard Nav -->
          @endif

          @if (auth()->user()->role == 'user')
              <ul id="side-main-menu" class="side-menu list-unstyled">
                  <li class="nav-item">
                      <a class="nav-link {{ request()->segment(1) == 'home' ? '' : 'collapsed' }}"
                          href="{{ route('home') }}">
                          <i class="bi bi-journal-text"></i>
                          <span>Home</span>
                      </a>
                  </li><!-- End Dashboard Nav -->
                  <li class="nav-item">
                      <a class="nav-link {{ request()->segment(1) == 'userorders' ? '' : 'collapsed' }}"
                          href="{{ route('userorders') }}">
                          <i class="bi bi-journal-text"></i>
                          <span>Home</span>
                      </a>
                  </li><!-- End Dashboard Nav -->


                  </li>
              </ul>
          @endif
          </div>

  </aside><!-- End Sidebar-->
