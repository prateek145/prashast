      <header class="row" id="header3">
          <style>
              #blink {
                  font-size: 10px;
                  font-weight: bold;
                  color: #d32947;
                  transition: 0.5s;
              }
          </style>
          <div class="row m0 logo_line">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-3 logo">
                          <a href="{{ route('frontend.home') }}" class="logo_a">
                              <img src="{{ asset('prashast/images/Regalia-logo-light.png') }}" alt="Regalia">

                          </a>
                      </div>
                      <div class="col-sm-9 searchSec">
                          <div class="col-sm-12 col-lg-12 pull-right">
                              <div class="fright wishlistCompare">
                                  <ul class="nav">
                                      <li class="searchSec_li">
                                          <div class="fright searchForm">
                                              <form action="{{ 'searchproduct' }}" method="POST">
                                                  @csrf
                                                  <div class="input-group">
                                                      <input type="search" name="search"
                                                          onkeyup="searchproducts(this.value)" class="form-control"
                                                          placeholder="Search Products" list="datalistname">

                                                      {{-- <span class="input-group-btn searchIco">
                                                          <button class="btn btn-default" type="submit"><i
                                                                  class="fas fa-search"></i></button>
                                                      </span> --}}

                                                      <datalist id="datalistname"></datalist>
                                                  </div>
                                                  <!-- /input-group -->
                                              </form>
                                          </div>
                                      </li>
                                      <li>
                                          @if (Auth::check() == true)
                                              <a href="{{ route('orders.page') }}">
                                                  {{ auth()->user()->name }}
                                              </a>
                                          @else
                                              <a href="{{ route('login') }}">
                                                  Login/Signup
                                              </a>
                                          @endif
                                      </li>

                                      <li class="w_cart">
                                          <a href="{{ route('wishlist') }}">
                                              @php
                                                  $wishlist = App\Models\wishlist::where(['user_id' => auth()->id()])->get();
                                                  $wishlistcount = count($wishlist);
                                              @endphp

                                              <span class="wish">
                                                  <i class="fas fa-heart"></i>
                                                  @if ($wishlistcount > 0)
                                                      <sup class="wsessioncount">{{ $wishlistcount++ }}</sup>
                                                  @else
                                                      <sup class="wsessioncount">0</sup>
                                                  @endif
                                              </span>
                                              <span>My wishlist</span>


                                          </a>

                                      </li>

                                      <li class="h_cart">
                                          <a href="{{ route('cart') }}">
                                              @if (session()->has('cart'))
                                                  @php
                                                      $session_count = count(session()->get('cart'));
                                                      //    dd($session_count);
                                                  @endphp
                                              @endif

                                              <span class="wish">
                                                  <i class="fas fa-shopping-cart"></i>
                                                  @if (isset($session_count))
                                                      <sup class="sessioncount">{{ $session_count++ }}</sup>
                                                  @else
                                                      <sup class="sessioncount">0</sup>
                                                  @endif
                                              </span>
                                              <span>My cart</span>
                                          </a>
                                          {{-- @if (session('cart'))
                                              <div class="hclist">
                                                  <div class="table-responsive">
                                                      <table class="table">

                                                          <thead>
                                                              <tr>
                                                                  <th class="productImage">Product image</th>
                                                                  <th>Product sku</th>
                                                                  <th class="productName">Product name</th>
                                                                  <th class="productName">Product qty</th>
                                                                  <th class="productName">Action</th>
                                                              </tr>
                                                          </thead>

                                                          <tbody class="addptocart">
                                                              @foreach (session('cart') as $id => $details)
                                                                  @php
                                                                      //    dd($details);
                                                                  @endphp
                                                                  <tr class="alert parentclass" role="alert">
                                                                      <td class="productImage"><img
                                                                              src="{{ asset($details['image']) }}"
                                                                              alt="" width="90%" height="90%">
                                                                      </td>

                                                                      <td class="skucheck">
                                                                          {{ $details['sku'] }}
                                                                      </td>

                                                                      <td class="productName">
                                                                          <h6>
                                                                              {{ $details['name'] }}
                                                                          </h6>
                                                                      </td>

                                                                      <td>
                                                                          <div class="input-group spinner">
                                                                              <input class="form-control setquantity"
                                                                                  value="{{ $details['quantity'] }}"
                                                                                  type="text" readonly>
                                                                          </div>
                                                                      </td>
                                                                      <td><button class="edit"
                                                                              aria-label="Close"><i
                                                                                  class="far fa-trash-alt"
                                                                                  onclick="delete1('delete', '{{ $details['sku'] }}')"></i></button>
                                                                      </td>
                                                                  </tr>
                                                              @endforeach

                                                          </tbody>

                                                      </table>
                                                  </div>
                                              </div>
                                          @endif --}}


                                      </li>

                                      @if (auth()->user())
                                          <li>
                                              <form action="{{ route('logout') }}" method="post">
                                                  @csrf
                                          <li><button class="btn btn-danger btn-xs"
                                                  style="background-color:#c1a89f">Logout</button>
                                          </li>

                                          </form>
                                          </li>
                                      @endif

                                  </ul>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <nav class="navbar navbar-default m0 navbar-static-top">
                                  <div>
                                      <!-- Brand and toggle get grouped for better mobile display -->
                                      <div class="navbar-header">
                                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                              data-target="#mainNav">
                                              <i class="fas fa-bars"></i> MENU
                                          </button>
                                      </div>
                                      <!-- Collect the nav links, forms, and other content for toggling -->
                                      <div class="collapse navbar-collapse" id="mainNav">
                                          <ul class="nav navbar-nav">
                                              <li><a href="{{ route('frontend.home') }}">Home</a></li>
                                              <!-- <li><a href="about.html">About</a></li> -->
                                              <!-- <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pages</a>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="blog.html">Blog</a></li>
                                             <li><a href="single-post.html">Single Post</a></li>
                                             <li><a href="shortcodes.html">Shortcodes</a></li>
                                             <li><a href="innerpage-dark.html">Inner Page Dark</a></li>
                                             <li><a href="404.html">404</a></li>
                                          </ul>
                                       </li> -->
                                              <li class="dropdown megaMenu">
                                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                      role="button" aria-expanded="false">SHOP</a>
                                                  <ul class="dropdown-menu row m0" role="menu">
                                                      @php
                                                          $categories = App\Models\backend\ProductCategories::all();
                                                          //   dd($categories);
                                                      @endphp
                                                      @foreach ($categories as $item)
                                                          <li class="listMenu">
                                                              <a href="{{ route('dynamic.categories', $item->slug) }}">
                                                                  <div class="row listTitle">{{ $item->name }}</div>

                                                              </a>
                                                              @php
                                                                  $subcategories = $item->subcategories()->get();
                                                                  //   dd($subcategories);
                                                              @endphp

                                                              @if ($subcategories != null)
                                                                  <ul class="nav megaInnerMenu">
                                                                      @foreach ($subcategories as $item1)
                                                                          @if ($item1 != null)
                                                                              <li class="d-flex">
                                                                                  <a
                                                                                      href="{{ route('dynamic.subcategories', $item1->slug) }}">{{ $item1->name }}</a>
                                                                                  @if ($item1->name == 'Handcrafted Rakhis')
                                                                                      <p class="mt-3" id="blink">
                                                                                          Limited </p>
                                                                                  @endif
                                                                              </li>
                                                                          @endif
                                                                      @endforeach
                                                                  </ul>
                                                              @endif
                                                          </li>
                                                      @endforeach

                                                  </ul>
                                              </li>
                                              <!-- <li class="dropdown">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Shop</a>
                                          <ul class="dropdown-menu" role="menu">
                                             <li><a href="product2.html">Products</a></li>
                                             <li><a href="product2.html">Products 2</a></li>
                                             <li><a href="single-product2.html">Single Product</a></li>
                                             <li><a href="catalog.html">Catalog</a></li>
                                             <li><a href="cart.html">Cart</a></li>
                                             <li><a href="checkout.html">Checkout</a></li>
                                          </ul>
                                       </li> -->
                                              <li><a href="{{ route('dynamic.page', 'about-prashast') }}">About
                                                      Prashast</a></li>
                                              <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                                              <!-- <li class="offers_navbtn" ><a href="#"><i class="fas fa-gift"></i><span>Offers</span></a></li> -->
                                          </ul>
                                      </div>
                                      <!-- /.navbar-collapse -->
                                  </div>
                                  <!-- /.container-fluid -->
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <script>
              function delete1(work, sku) {
                  console.log(work, sku);
                  $.ajax({
                      url: "{{ route('remove.cart') }}",
                      method: "POST",
                      data: {
                          '_token': "{{ csrf_token() }}",
                          "sku": sku
                      },
                      success: function(response) {
                          console.log(response);
                          var skuf = document.getElementsByClassName('skucheck');
                          for (let index = 0; index < skuf.length; index++) {
                              if (skuf[index].innerText == sku) {
                                  document.getElementsByClassName('parentclass')[index].remove();
                                  break;
                              }

                          }

                          var sessioncount = document.getElementsByClassName('sessioncount')[0];
                          var session_count = parseInt(sessioncount.innerText);
                          var value = session_count - 1;
                          // console.log(typeof(value), value);
                          sessioncount.innerText = value;

                      }
                  });
              }

              function searchproducts(keyword) {
                  //   console.log(keyword);

                  $.ajax({
                      url: "{{ route('product.search') }}",
                      method: "POST",
                      data: {
                          '_token': "{{ csrf_token() }}",
                          "keyword": keyword
                      },
                      success: function(response) {
                          console.log(response);
                          var listname = document.getElementById('datalistname');
                          listname.innerHTML = '';
                          for (let index = 0; index < response.length; index++) {
                              const option = document.createElement('option');
                              option.setAttribute('id', response[index].id);
                              option.innerHTML = response[index].name;
                              // option.onselect = selectinput(this.value_);
                              // console.log(option);
                              listname.appendChild(option);
                          }
                      }
                  });


              }

              var blink = document.getElementById('blink');
              //   setInterval(function() {
              //       blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
              //   }, 1500);
          </script>

      </header>
