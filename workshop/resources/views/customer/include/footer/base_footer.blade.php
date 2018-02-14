<!--========== FOOTER ==========-->
<footer class="footer">
    <!-- Links -->
    <div class="footer-seperator">
        <div class="content-lg container">
            <div class="row">
                <div class="col-sm-2 sm-margin-b-50">
                    <!-- List -->
                    <ul class="list-unstyled footer-list">
                        <li class="footer-list-item"><a class="footer-list-link" href="#">Home</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="{{ route('projects') }}">Projects</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="{{ route('catalog') }}">Catalog</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="{{ route('rent.index') }}">Rent</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="{{ route('about') }}">About Us</a></li>
                    </ul>
                    <!-- End List -->
                </div>
                <div class="col-sm-4 sm-margin-b-30">
                    <!-- List -->
                    <ul class="list-unstyled footer-list">
                        <li class="footer-list-item"><a class="footer-list-link" href="http://line.me/ti/p/%40pao0271y">Line</a></li>
                        <li class="footer-list-item">Contact Person : 081297841393 (Fadel)</li>
                        <!--
                        <li class="footer-list-item"><a class="footer-list-link" href="#">Facebook</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="#">Instagram</a></li>
                        <li class="footer-list-item"><a class="footer-list-link" href="#">YouTube</a></li>
                        -->
                    </ul>
                    <!-- End List -->
                </div>
                <!-- 
                <div class="col-sm-5 sm-margin-b-30">
                    <h2 class="color-white">Send Us A Note</h2>
                    <input type="text" class="form-control footer-input margin-b-20" placeholder="Name" required>
                    <input type="email" class="form-control footer-input margin-b-20" placeholder="Email" required>
                    <input type="text" class="form-control footer-input margin-b-20" placeholder="Phone" required>
                    <textarea class="form-control footer-input margin-b-30" rows="6" placeholder="Message" required></textarea>
                    <button type="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase">Submit</button>
                </div>-->
            </div>
            <!--// end row -->
        </div>
    </div>
    <!-- End Links -->

    <!-- Copyright -->
    <div class="content container">
        <div class="row">
            <div class="col-xs-6">
                <img class="footer-logo" style="max-height: 50px; width: auto;" src="{{ asset('customer_assets/img/logo_ws.png') }}" alt="WS logo">
            </div>
            <div class="col-xs-6 text-right">
                <p class="margin-b-0">Created by: WS HME & Divkom HME<br> 
                    Powered by: <a class="color-base fweight-700" href="http://www.keenthemes.com/">KeenThemes</a></p>
            </div>
        </div>
        <!--// end row -->
    </div>
    <!-- End Copyright -->
</footer>
<!--========== END FOOTER ==========-->

<!-- Back To Top -->
<a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

<!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- CORE PLUGINS -->
<script src="{{ asset('customer_assets/vendor/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/vendor/jquery-migrate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/vendor/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- FORM CONTROL -->
{{--<script src="{{ asset('customer_assets/js/form_control.js') }}" type="text/javascript"></script>--}}

<!-- PAGE LEVEL PLUGINS -->
<script src="{{ asset('customer_assets/vendor/jquery.easing.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/vendor/jquery.back-to-top.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/vendor/jquery.smooth-scroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/vendor/jquery.wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/vendor/swiper/js/swiper.jquery.min.js') }}" type="text/javascript"></script>

<!-- PAGE LEVEL SCRIPTS -->
<script src="{{ asset('customer_assets/js/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/js/components/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('customer_assets/js/components/swiper.min.js') }}" type="text/javascript"></script>