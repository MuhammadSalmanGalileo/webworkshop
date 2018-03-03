@include('customer.include.header.base_header')

        @include('customer.include.header.navbar',
                 ['home_is_active'      => '',
                  'projects_is_active' => '',
                  'catalog_is_active'   => '',
                  'rent_is_active'      => 'active',
                  'about_is_active'     => ''])

        @include('customer.include.header.parallax')

        <!--========== PAGE LAYOUT ==========-->

        <!-- Service -->
        <div class="bg-color-sky-light" data-auto-height="true">
            <div class="content-lg container">

                <h1 class="custom-form-title">Rental Form</h1>
                <h5 class="custom-form-title">Please fill in all fields to rent the items</h5>

                <br><br>

                <form id="rent_form" method="post" action="{{ route('rent.store') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div>
                        <div class="form form-group col col-sm-3">
                            <div class="form-group">
                                <label class="custom-form-text" for="rent_date">Tanggal Pinjam:</label>
                                <input class="form-control custom-form-date" id="rent_date" name="rent_date" type="date" >

                            </div>
                        </div>

                        <div class="form form-group col col-sm-3">
                            <div class="form-group">
                                <label class="custom-form-text" for="rent_hour">Jam Pinjam:</label>
                                <input class="form-control custom-form-date" id="rent_hour" name="rent_hour" type="time" >

                            </div>
                        </div>

                        <div class="form form-group col col-sm-3">
                            <div class="form-group">
                                <label class="custom-form-text" for="return_date">Tanggal Kembali:</label>
                                <input class="form-control custom-form-date" id="return_date" name="return_date" type="date" >

                            </div>
                        </div>

                        <div class="form form-group col col-sm-3">
                            <div class="form-group">
                                <label class="custom-form-text" for="return_hour">Jam Kembali:</label>
                                <input class="form-control custom-form-date" id="return_hour" name="return_hour" type="time" format="HH:mm">

                            </div>
                        </div>
                    </div>

                    {{--<div class="form-group col-sm-12 custom-form-divider"></div>--}}

                    <div id="form_master">
                        <div id="available_inventory">

                            {{--<div class="col-sm-6 col-md-4">--}}
                                {{--<div class="thumbnail">--}}
                                    {{--<img src="{{ asset('customer_assets/img/inventory/Proyektor.png') }}" alt="...">--}}
                                    {{--<div class="caption custom-center-inventory-title">--}}
                                        {{--<h3>Proyektor</h3>--}}

                                        {{--<div class="custom-right-text-align">--}}
                                            {{--<select class="custom-inventory-quantity">--}}
                                                {{--<option value = "0">0</option>--}}
                                                {{--<option value = "1">1</option>--}}
                                                {{--<option value = "2">2</option>--}}
                                                {{--<option value = "3">3</option>--}}
                                            {{--</select>--}}
                                        {{--</div>--}}

                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        </div>

                        {{--<div class="form-group col-sm-12 custom-form-divider"></div>--}}

                        <div id="customer_identity">
                            <div class="form form-group col col-sm-12">
                                <div class="form-group">
                                    <label class="custom-form-text" for="name">Name:</label>
                                    <input name="customer_name" type="text" class="form-control custom-form-border" id="name" placeholder="ex: Nyoman Abiwinanda">
                                </div>
                                <div class="form-group">
                                    <label class="custom-form-text" for="nim">NIM:</label>
                                    <input name="customer_nim" type="number" class="form-control custom-form-border" id="nim" placeholder="ex: 13214096">
                                </div>
                                <div class="form-group">
                                    <label class="custom-form-text" for="organization">Organisasi:</label>
                                    <input name="customer_organization" type="text" class="form-control custom-form-border" id="organization" placeholder="ex: HME">
                                </div>
                                <div class="form-group">
                                    <label class="custom-form-text" for="email">Email:</label>
                                    <input name="customer_email" type="email" class="form-control custom-form-border" id="email" placeholder="ex: abiwinanda@outlook.com">
                                </div>
                                <div class="form-group">
                                    <label class="custom-form-text" for="tlp">No Telepon:</label>
                                    <input name="customer_tlp" type="text" class="form-control custom-form-border" id="tlp" placeholder="ex: 081223405967">
                                </div>

                                <!-- Button trigger modal -->
                                <button id="rent_validation" type="button" class="btn btn-default" data-toggle="modal">
                                    Pinjam
                                </button>
                            </div>
                        </div>
                    </div>

                    

                    <!-- Modal -->
                    <div class="modal fade" id="customer_validation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Rental Information</h5>
                                </div>

                                <div id="customer_validation_modal_body" class="modal-body">
                                    
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button name="rent_btn" type="submit" class="btn btn-success">Pinjam</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- End Service -->

        <!--========== END PAGE LAYOUT ==========-->

        @include('customer.include.footer.base_footer')

        <script src="{{ asset('customer_assets/vendor/jquery.parallax.min.js') }}" type="text/javascript"></script>

        <script>
            $(document).ready(function () {
                var rent_date = $('#rent_date');
                var rent_hour = $('#rent_hour');
                var return_date = $('#return_date');
                var return_hour = $('#return_hour');
                var form_master = $('#form_master');
                var available_inventory = $('#available_inventory');
                var modal_body = $('#customer_validation_modal_body');
                var rent_validation = $('#rent_validation');
                var customer_validation_modal = $('#customer_validation_modal');

                rent_date.change(checkIfAllFilled);
                rent_hour.change(checkIfAllFilled);
                return_date.change(checkIfAllFilled);
                return_hour.change(checkIfAllFilled);
                rent_validation.on('click', validateRentForm);

                form_master.css('display', 'none');

                function checkIfAllFilled() {
                    if (rent_date.val() && rent_hour.val() && return_date.val() && return_hour.val()) {
                        var pickup_time = rent_date.val() + " " + rent_hour.val();
                        var return_time = return_date.val() + " " + return_hour.val();

                        // Show the inventory
                        form_master.css('display', 'block');
                        form_master.css('opacity', '0');

                        $.ajax({
                            url: "load_available_inventory",
                            type: "get",
                            data: {
                                pt: pickup_time,
                                rt: return_time
                            },
                            success: function(data) {

                                var available_inventory_html = data;

                                // Empty the html
                                available_inventory.empty();

                                // Fill the html
                                available_inventory.append(available_inventory_html);

                            }
                        });

                        form_master.animate({opacity: 1});
                    }
                }

                function validateRentForm() {
                    // Get the today's date, rent date, rent hour, return date, and return hour
                    var today = new Date();
                    var rent_time = new Date(rent_date.val() + " " + rent_hour.val());
                    var return_time = new Date(return_date.val() + " " + return_hour.val());

                    // Check if rent date is filled
                    if (rent_date.val() == "") {
                        alert("Mohon untuk mengisi tanggal peminjaman barang");
                        exit;
                    }

                    // Check if rent hour is filled
                    if (rent_hour.val() == "") {
                        alert("Mohon untuk mengisi jam peminjaman barang");
                        exit;
                    }

                    // Check if return date is filled
                    if (return_date.val() == "") {
                        alert("Mohon untuk mengisi tanggal pengembalian barang");
                        exit;
                    }

                    // Check if return hour is filled
                    if (return_hour.val() == "") {
                        alert("Mohon untuk mengisi jam pengembalian barang");
                        exit;
                    }

                    // Check if rent time is before current time
                    if (rent_time.getTime() - today.getTime() < 0) {
                        alert("Waktu peminjaman barang tidak bisa kurang dari waktu saat ini");
                        exit;
                    }

                    // Check if return time is before current time
                    if (return_time.getTime() - today.getTime() < 0) {
                        alert("Waktu pengembalian barang tidak bisa kurang dari waktu saat ini");
                        exit;
                    }

                    // Check if return time is before the rent date
                    if (return_time.getTime() - rent_time.getTime() < 0) {
                        alert("Waktu pengembalian barang tidak bisa lebih dulu dari waktu peminjaman");
                        exit;
                    }
                    
                    // Check if customer name is filled
                    if ($('#name').val() == "") {
                        alert("Mohon untuk mengisi nama");
                        exit;
                    }

                    // Check if customer nim is filled
                    if ($('#nim').val() == "") {
                        alert("Mohon untuk mengisi nim");
                        exit;
                    } 

                    // Check if customer organization is filled
                    if ($('#organization').val() == "") {
                        alert("Mohon untuk mengisi nama organisasi");
                        exit;
                    }

                    // Check if customer email is filled
                    if ($('#email').val() == "") {
                        alert("Mohon untuk mengisi email");
                        exit;
                    }

                    // Check if customer tlp is filled
                    if ($('#tlp').val() == "") {
                        alert("Mohon untuk mengisi nomor telepon");
                        exit;
                    }

                    // validation success. No error
                    customer_validation_modal.modal('show');
                    showFormInfo();
                }

                function showFormInfo() {
                    // Get personal information
                    var customer_name = $('#name').val();
                    var customer_nim = $('#nim').val();
                    var customer_organization = $('#organization').val();
                    var customer_email = $('#email').val();
                    var customer_no_tlp = $('#tlp').val();

                    // get rent duration
                    var customer_pickup_time = rent_date.val() + " " + rent_hour.val();
                    var customer_return_time = return_date.val() + " " + return_hour.val();

                    // Get tagged quantity
                    $qty_1 = ($('#Proyektor_Qty').val() != null) ? $('#Proyektor_Qty').val() : 0;
                    $qty_2 = ($('#Layar_Proyektor_Qty').val() != null) ? $('#Layar_Proyektor_Qty').val() : 0;
                    $qty_3 = ($('#Microphone_Kabel_Qty').val() != null) ? $('#Microphone_Kabel_Qty').val() : 0;
                    $qty_4 = ($('#Microphone_Wireless_Qty').val() != null) ? $('#Microphone_Wireless_Qty').val() : 0;
                    $qty_5 = ($('#Halogen_Qty').val() != null) ? $('#Halogen_Qty').val() : 0;
                    $qty_6 = ($('#Halogen_LED_Qty').val() != null) ? $('#Halogen_LED_Qty').val() : 0;
                    $qty_7 = ($('#Terminal_Kabel_Qty').val() != null) ? $('#Terminal_Kabel_Qty').val() : 0;
                    $qty_8 = ($('#Terminal_Kabel_Panjang_Qty').val() != null) ? $('#Terminal_Kabel_Panjang_Qty').val() : 0;
                    $qty_9 = ($('#Speaker_Indoor_Qty').val() != null) ? $('#Speaker_Indoor_Qty').val() : 0;
                    $qty_10 = ($('#Speaker_Outdoor_Qty').val() != null) ? $('#Speaker_Outdoor_Qty').val() : 0;
                    $qty_11 = ($('#Mixer_Qty').val() != null) ? $('#Mixer_Qty').val() : 0;

                    // AJAX
                    $.ajax({
                        url: "show_form_info",
                        type: "get",
                        data: {
                            name: customer_name,
                            nim: customer_nim,
                            organization: customer_organization,
                            email: customer_email,
                            no_tlp: customer_no_tlp,
                            pickup_time: customer_pickup_time,
                            return_time: customer_return_time,
                            1: $qty_1,
                            2: $qty_2,
                            3: $qty_3,
                            4: $qty_4,
                            5: $qty_5,
                            6: $qty_6,
                            7: $qty_7,
                            8: $qty_8,
                            9: $qty_9,
                            10: $qty_10,
                            11: $qty_11
                        },
                        success: function(data) {
                            // Empty the html
                            modal_body.empty();

                            // Fill the html
                            modal_body.append(data);

                        }
                    });

                }

                // Disable submitting form via enter key
                $('#rent_form').on('keyup keypress', function(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode === 13) { 
                        e.preventDefault();
                        return false;
                    }
                });

            });
        </script>

@include('customer.include.footer.closing_tag')