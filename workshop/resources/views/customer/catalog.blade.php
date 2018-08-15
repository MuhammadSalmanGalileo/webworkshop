@include('customer.include.header.base_header')

    @include('customer.include.header.navbar',
             ['home_is_active'      => '',
              'projects_is_active' => '',
              'catalog_is_active'   => 'active',
              'rent_is_active'      => '',
              'about_is_active'     => ''])

    <img class="img-responsive" src="{{ asset('customer_assets/img/1920x1080/rent.jpg') }}" alt="Slider Image">
    <div class="container">
        <div class="carousel-centered">
            <div class="margin-b-40">
                <h3 class="carousel-title">Catalog</h3>
                <p>WS HME menyediakan penyewaan barang-barang elektronik untuk keperluan penyelenggaraan acara.<br>
                     Pesan sekarang juga melalui website ini.</p>
            </div>
            <a href="{{ route('rent.index') }}" class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Rent</a>
        </div>
    </div>

    <!--========== PAGE LAYOUT ==========-->
    <!-- Our Exceptional Solutions -->
    <div class="content-lg container">
        <div class="row margin-b-40">
            <div class="col-sm-6">
                <h2>Our Rent</h2>
                <p>WS HME menyediakan penyewaan barang-barang elektronik untuk keperluan penyelenggaraan acara. Pesan sekarang juga melalui website ini.</p>
            </div>
        </div>
        <!--// end row -->

        <div class="row margin-b-50">
            <!-- Our Exceptional Solutions -->
            @include('customer.include.inventory')
            <!-- End Our Exceptional Solutions -->
        </div>
        <!--// end row -->
    </div>
    <!-- End Our Exceptional Solutions -->

    <!--========== END PAGE LAYOUT ==========-->

    @include('customer.include.footer.base_footer')

    <script src="{{ asset('customer_assets/vendor/jquery.parallax.min.js') }}" type="text/javascript"></script>

@include('customer.include.footer.closing_tag')