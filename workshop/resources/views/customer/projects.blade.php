@include('customer.include.header.base_header')

    @include('customer.include.header.navbar',
             ['home_is_active'      => '',
              'projects_is_active' => 'active',
              'catalog_is_active'   => '',
              'rent_is_active'      => '',
              'about_is_active'     => ''])

    @include('customer.include.header.parallax')

    <!--========== PAGE LAYOUT ==========-->
    <!-- Our Exceptional Solutions -->
    <div class="content-lg container">
        <div class="row margin-b-40">
            <div class="col-sm-6">
                <h2>Our Exceptional Solutions</h2>
                <p>tes ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>
            </div>
        </div>
        <!--// end row -->

        <div class="row margin-b-50">
            <!-- Our Exceptional Solutions -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="{{ asset('customer_assets/img/970x647/01.jpg') }}" alt="Our Exceptional Solutions Image">
                    </div>
                </div>
                <h3><a href="#">Triangle Roof</a> <span class="text-uppercase margin-l-20">Management</span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="#">Read More</a>
            </div>
            <!-- End Our Exceptional Solutions -->

            <!-- Our Exceptional Solutions -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="{{ asset('customer_assets/img/970x647/02.jpg') }}" alt="Our Exceptional Solutions Image">
                    </div>
                </div>
                <h4><a href="#">Curved Corners</a> <span class="text-uppercase margin-l-20">Developmeny</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="#">Read More</a>
            </div>
            <!-- End Our Exceptional Solutions -->

            <!-- Our Exceptional Solutions -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="{{ asset('customer_assets/img/970x647/03.jpg') }}" alt="Our Exceptional Solutions Image">
                    </div>
                </div>
                <h4><a href="#">Bird On Green</a> <span class="text-uppercase margin-l-20">Design</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="#">Read More</a>
            </div>
            <!-- End Our Exceptional Solutions -->
        </div>
        <!--// end row -->

        <div class="row">
            <!-- Our Exceptional Solutions -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="{{ asset('customer_assets/img/970x647/01.jpg') }}" alt="Our Exceptional Solutions Image">
                    </div>
                </div>
                <h4><a href="#">Triangle Roof</a> <span class="text-uppercase margin-l-20">Management</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="#">Read More</a>
            </div>
            <!-- End Our Exceptional Solutions -->

            <!-- Our Exceptional Solutions -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="{{ asset('customer_assets/img/970x647/02.jpg') }}" alt="Our Exceptional Solutions Image">
                    </div>
                </div>
                <h4><a href="#">Curved Corners</a> <span class="text-uppercase margin-l-20">Developmeny</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="#">Read More</a>
            </div>
            <!-- End Our Exceptional Solutions -->

            <!-- Our Exceptional Solutions -->
            <div class="col-sm-4 sm-margin-b-50">
                <div class="margin-b-20">
                    <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="{{ asset('customer_assets/img/970x647/03.jpg') }}" alt="Our Exceptional Solutions Image">
                    </div>
                </div>
                <h4><a href="#">Bird On Green</a> <span class="text-uppercase margin-l-20">Design</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                <a class="link" href="#">Read More</a>
            </div>
            <!-- End Our Exceptional Solutions -->
        </div>
        <!--// end row -->
    </div>
    <!-- End Our Exceptional Solutions -->

    <!-- Clients -->
    <div class="bg-color-sky-light">
        <div class="content-lg container">
            <!-- Swiper Clients -->
            <div class="swiper-slider swiper-clients">
                <!-- Swiper Wrapper -->
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="{{ asset('customer_assets/img/clients/01.png') }}" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="{{ asset('customer_assets/img/clients/02.png') }}" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="{{ asset('customer_assets/img/clients/03.png') }}" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="{{ asset('customer_assets/img/clients/04.png') }}" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="{{ asset('customer_assets/img/clients/05.png') }}" alt="Clients Logo">
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-clients-img" src="{{ asset('customer_assets/img/clients/06.png') }}" alt="Clients Logo">
                    </div>
                </div>
                <!-- End Swiper Wrapper -->
            </div>
            <!-- End Swiper Clients -->
        </div>
    </div>
    <!-- End Clients -->

    <!-- Promo Section -->
    <div class="promo-section overflow-h">
        <div class="container">
            <div class="clearfix">
                <div class="ver-center">
                    <div class="ver-center-aligned">
                        <div class="promo-section-col">
                            <h2>Our Clients</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>
                            <p>Ipsum dolor sit amet consectetur adipiscing elit sed tempor incididut ut sead laboret dolore magna aliqua enim minim veniam exercitation ipsum dolor sit amet consectetur adipiscing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="promo-section-img-right">
            <img class="img-responsive" src="{{ asset('customer_assets/img/970x970/01.jpg') }}" alt="Content Image">
        </div>
    </div>
    <!-- End Promo Section -->
    <!--========== END PAGE LAYOUT ==========-->

    @include('customer.include.footer.base_footer')

    <script src="{{ asset('customer_assets/vendor/jquery.parallax.min.js') }}" type="text/javascript"></script>

@include('customer.include.footer.closing_tag')