<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prashast</title>
    <!--Favicons-->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!--Bootstrap and Other Vendors-->
    <link rel="stylesheet" href="{{ asset('prashast/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('prashast/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('prashast/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('prashast/vendors/owl.carousel/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('prashast/vendors/flexslider/flexslider.css') }}" media="screen" />

    <link href="https://fonts.googleapis.com/css2?family=Domine:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <!--Mechanic Styles-->
    <link rel="stylesheet" href="{{ asset('prashast/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('prashast/css/responsive.css') }}">
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <header class="row" id="header">
        <div class="row m0 logo_line">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 logo">
                        <a href="{{ route('frontend.home') }}" class="logo_a">
                            <img src="{{ asset('prashast/images/Regalia-logo-2.png') }}" alt="Regalia">

                        </a>
                    </div>
                    <div class="col-sm-9 searchSec">
                        <div class="col-sm-12 col-lg-12 pull-right">
                            <div class="fright wishlistCompare">
                                <ul class="nav">
                                    <li class="searchSec_li">
                                        <div class="fright searchForm">
                                            <form action="#" method="get">
                                                <div class="input-group">
                                                    <input type="hidden" name="search_param" value="all" id="search_param">
                                                    <input type="search" class="form-control" placeholder="Search Products">
                                                    <span class="input-group-btn searchIco">
                                                        <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </form>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('login') }}">
                                            Login/Signup
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header-->
    <!--Slider-->
    @yield('content')
    <!--Testimonial Tabs-->
    <!-- <section id="brands" class="row contentRowPad pt-0">
         <div class="container">
            <div class="row sectionTitle">
               <h3>our brands</h3>
               <h5>choose best with our favorite brands</h5>
            </div>
            <div class="row brands">
               <ul class="nav navbar-nav">
                  <li><a href="#"><img src="images/brands/1.png" alt=""></a></li>
                  <li><a href="#"><img src="images/brands/2.png" alt=""></a></li>
                  <li><a href="#"><img src="images/brands/3.png" alt=""></a></li>
                  <li><a href="#"><img src="images/brands/4.png" alt=""></a></li>
                  <li><a href="#"><img src="images/brands/5.png" alt=""></a></li>
                  <li><a href="#"><img src="images/brands/2.png" alt=""></a></li>
               </ul>
            </div>
         </div>
      </section> -->
    <!-- <section id="homeBlog" class="pt-0">
         <div class="container blog_j">
            <div class="row sectionTitle">
               <h3>Blog Updates</h3>
               <h5>we satisfied more than 700 customers</h5>
            </div>
            <div class="row m0">
               <div class="col-sm-12">
                  <div class="blog_inner single d-flex">
                     <div class="blog_j_img">
                        <img alt="" class="img-responsive"  src="images/blog/blog6.png">
                        
                     </div>
                     <div class="blog_j_text">
                        <div class="blog_j_text_inner">
                           <h3><span>December 2021</span> Lovely Necklaces</h3>
                           <p>The DiamondShop Lovely Necklaces collection is a varied and vibrant selection of exceptionally designed pieces adorned with the brand’s renowned precision cut clear and color crystals. Our necklaces can be perfectly matched with a singular selection of earrings and bracelets.</p>
                           

                           <div class="btn_readmore">
                              <a  href="blog.html">Read more</a>
                           </div>

                        </div>
                        
                     </div>
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="blog_inner d-flex">
                           <div class="blog_j_img">
                              <img alt="" class="img-responsive"  src="images/blog/blog1.png">
                              
                           </div>
                           <div class="blog_j_text">
                              <div class="blog_j_text_inner">
                           <h3><span>December 2021</span> Lovely Necklaces</h3>
                           <p>The DiamondShop Lovely Necklaces collection is a varied and .</p>
                           

                           <div class="btn_readmore">
                              <a  href="blog.html">Read more</a>
                           </div>

                        </div>
                           </div>
                        </div>
                        <div class="blog_inner d-flex">
                           <div class="blog_j_img">
                              <img alt="" class="img-responsive"  src="images/blog/blog5.png">
                              
                           </div>
                           <div class="blog_j_text">
                              <div class="blog_j_text_inner">
                           <h3><span>December 2021</span> Lovely Necklaces</h3>
                           <p>The DiamondShop Lovely Necklaces collection is a varied and .</p>
                           

                           <div class="btn_readmore">
                              <a  href="blog.html">Read more</a>
                           </div>

                        </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="blog_inner d-flex">
                           <div class="blog_j_img">
                              <img alt="" class="img-responsive"  src="images/blog/blog7.png">
                              
                           </div>
                           <div class="blog_j_text">
                              <div class="blog_j_text_inner">
                           <h3><span>December 2021</span> Lovely Necklaces</h3>
                           <p>The DiamondShop Lovely Necklaces collection is a varied and .</p>
                           

                           <div class="btn_readmore">
                              <a  href="blog.html">Read more</a>
                           </div>

                        </div>
                           </div>
                        </div>
                        <div class="blog_inner d-flex">
                           <div class="blog_j_img">
                              <img alt="" class="img-responsive"  src="images/blog/blog3.png">
                              
                           </div>
                           <div class="blog_j_text">
                              <div class="blog_j_text_inner">
                           <h3><span>December 2021</span> Lovely Necklaces</h3>
                           <p>The DiamondShop Lovely Necklaces collection is a varied and .</p>
                           

                           <div class="btn_readmore">
                              <a  href="blog.html">Read more</a>
                           </div>

                        </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
    <footer class="row footer2">
        <div class="row m0 topFooter">
            <div class="line1">
                <div class="container">
                    <div class="row footFeatures">
                        <div class="col-sm-4 footFeature">
                            <div class="media">
                                <div class="media-left icon"><img src="images/icons/car3.png" alt=""></div>
                                <div class="media-body texts">
                                    <h4>ePrashast Helpline</h4>
                                    <h2>+91-77018 60046</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 footFeature">
                            <div class="media m0">
                                <div class="media-left icon"><img src="images/icons/tel24-7_2.png" alt=""></div>
                                <div class="media-body texts">
                                    <h4>Become a Vendor</h4>
                                    <a href="{{ route('vendor.page') }}">
                                        <h2 style="color:white"> Contact Us</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 footFeature">
                            <div class="media m0">
                                <div class="media-left icon"><img src="images/icons/shopping-bag2.png" alt=""></div>
                                <div class="media-body texts">
                                    <h4>Place a Bulk Order</h4>
                                    <a href="{{ route('bulk.order.page') }}">
                                        <h2 style="color:white">Inquire Here</h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container line2">
                <div class="row">
                    {{-- <div class="col-sm-3 widget">
                        <div class="row m0">
                            <h4>About Prashast</h4>
                            <p>We provide the best Quality of products to you.We are always here to help our lovely
                                customers.</p>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="col-sm-4 widget">
                        <div class="row m0">
                            <h4>important links</h4>
                            <ul class="nav collumn-2">
                                @php
                                $pages = App\Models\backend\Pages::all();
                                @endphp
                                <li><a href="{{ route('frontend.home') }}">Home</a>
                                </li>

                                <li><a href="{{ route('dynamic.categories', 'accessories') }}">Accessories</a>
                                </li>
                                <li><a href="{{ route('dynamic.categories', 'home-lifestyle') }}">Home &lifestyle</a>
                                </li>
                                <li><a href="{{ route('vendor.page') }}">Become a Vendor</a>
                                </li>

                                <li><a href="{{ route('bulk.order.page') }}">Place a Bulk
                                        Order</a>
                                </li>
                                @foreach ($pages as $item)
                                <li><a href="{{ route('dynamic.page', $item->slug) }}">{{ $item->name }}</a>
                                </li>
                                @endforeach

                                <li><a href="{{ route('frontend.contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 widget">
                        <div class="row m0">
                            <h4>other links</h4>
                            <ul class="tags">
                                <li><a href="https://www.facebook.com/ePrashast.co.in/">Facebook page</a></li>
                                <li><a href="https://www.instagram.com/shop.prashast">Instagram page</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 widget">
                        <div class="row m0">
                            <h4>Address</h4>
                            <a href="https://goo.gl/maps/JyU9byk1YRUhx9Z36">
                                <p style="color:azure;">Map</p>
                            </a>
                            <p>Prashast innovation Private Limited
                                C-98, Sector 10, Noida, Uttar Pradesh - 201301</p>
                            <p>+91-77018 60046</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row m0 copyRight">
            <div class="container">
                <div class="row">
                    <div class="fleft">&copy; 2021 <a href="index2.html">Prashast</a> All Rights Reserved.
                    </div>
                    <ul class="nav nav-pills fright">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li><a href="{{ route('dynamic.page', 'about-prashast') }}">about</a></li>
                        <li><a href="{{ route('frontend.contact') }}">contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--jQuery, Bootstrap and other vendor JS-->
    <!--jQuery-->
    <script src="{{ asset('prashast/js/jquery-2.1.3.min.js') }}"></script>
    <!--Google Maps-->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <!--Bootstrap JS-->
    <script src="{{ asset('prashast/js/bootstrap.min.js') }}"></script>
    <!--Owl Carousel-->
    <script src="{{ asset('prashast/vendors/owl.carousel/js/owl.carousel.min.js') }}"></script>
    <!--Isotope-->
    <script src="{{ asset('prashast/vendors/isotope/isotope-custom.js') }}"></script>
    <!--FlexSlider-->
    <script src="{{ asset('prashast/vendors/flexslider/jquery.flexslider-min.js') }}"></script>
    <!--Regalia JS-->
    <script src="{{ asset('prashast/js/regalia.js') }}"></script>
</body>

<!-- Mirrored from veepixel.com/tf/html/regalia/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Dec 2021 18:22:14 GMT -->

</html>