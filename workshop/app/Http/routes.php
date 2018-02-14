<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Customer Web Routes
|--------------------------------------------------------------------------
|
| All routes below this are for customer website
|
*/

Route::get('/', function () {
    $data = [
        'title' => 'WS HME'
    ];

    return view('customer/home', $data);
})->name('home');

Route::get('/projects', function () {
    $data = [
        'title' => 'Projects'
    ];

    return view('customer/projects', $data);
})->name('projects');

Route::get('/catalog', 'CatalogController@index')->name('catalog');

Route::resource('rent', 'RentController');

Route::get('/about', function () {
    $data = [
        'title' => 'About Us'
    ];

    return view('customer/about', $data);
})->name('about');

Route::get('/admin_dashboard', function () {
    $data = [
        'title' => 'Dashboard'
    ];

    return view('admin/dashboard', $data);
})->name('admin_dashboard');


Route::get('/test', function() {
//    $data = \App\Inventory::all();
//
//    foreach ($data as $single) {
//        echo $single->price[0]->price_per_day;
//        echo '<br>';
//    }

//    return \App\Inventory::find(1)->price[0]->price_per_day;

//    $date1 = strtotime('2018-01-21');
//    $date1 = date('Y-m-d', $date1);
//
//    $date2 = strtotime('2018-01-22');
//    $date2 = date('Y-m-d', $date2);
//
//    $date3 = $date2 - $date1;

    // $datetime1 = date_create('2009-10-14 16:00');
    // $datetime2 = date_create('2009-10-15 17:00');
    // $interval = date_diff($datetime1, $datetime2);

    // $num = (int) $interval->format('%h');
    // echo $num;

    // $num = (int) date_diff(date_create('2009-10-14 16:00'), date_create('2009-10-15 17:00'))->format('%a');

    echo (int) date_diff(date_create('2009-10-14 16:00'), date_create('2009-10-16 17:00'))->format('%a');

});

Route::get('/load_available_inventory', function () {
    if(Request::ajax()) {

        $pickup_time = $_GET['pt'];
        $return_time = $_GET['rt'];

        $data = \App\Inventory::getAvailableInventory($pickup_time, $return_time);

        // Initialize the html
        $html = '';
        $temp = 0;

        foreach ($data['qty_av'] as $single) {

            $available_html = '';

           if ($single != 0) {
               // get the number of available inventory
               for ($i = 0; $i <= $single; $i++) {
                   $available_html .= '<option value = "'.$i.'">'.$i.'</option>';
               }

               $html .= '<div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img style="width: 100px; height: 100px;" src="'.asset('customer_assets/img/inventory/'.str_replace(' ', '_', $data['inventories'][$temp]->name).'.png').'" alt="...">
                            <div class="caption custom-center-inventory-title">
                                <h5>'.$data['inventories'][$temp]->name.'</h5>

                                <div class="custom-right-text-align">
                                    <select class= "selectpicker" data-width="fit" id="'.str_replace(' ', '_', $data['inventories'][$temp]->name).'_Qty" name="'.str_replace(' ', '_', $data['inventories'][$temp]->name).'_Qty" class="custom-inventory-quantity">'.
                   $available_html
                   .'</select>
                                </div>
                            </div>
                        </div>
                     </div>';
           }

            $temp++;
        }

        return $html;
    }
});

Route::get('/show_form_info', function() {
    if (Request::ajax()) {

        // Get the ajax data
        $name = $_GET['name'];
        $nim = $_GET['nim'];
        $organization = $_GET['organization'];
        $email = $_GET['email'];
        $no_tlp = $_GET['no_tlp'];
        $pickup_time = $_GET['pickup_time'];
        $return_time = $_GET['return_time'];
        $tagged_qty = array();

        // Modal rent price html
        $tagged_html = '';

        // Total price
        $total_price = 0;
        // Get the inventory quantity
        foreach (\App\Inventory::all() as $single) {

            // Get the tagged quantity of a particular inventory
            $qty = $_GET[$single->id];

            if ($qty != 0) {

                if ((int) date_diff(date_create($pickup_time), date_create($return_time))->format('%a') > 0) {
                    // Calculate the rent duration in days
                    $rent_duration = (int) date_diff(date_create($pickup_time), date_create($return_time))->format('%a');

                    // Create the tagged hmtl
                    $tagged_html .= '<p><span class="custom-modal-field">'.$single->name.' :</span> '.$qty.' x '.$rent_duration.' hari x Rp '.$single->price[0]->price_per_day.'/hari = Rp '.$qty * $rent_duration * $single->price[0]->price_per_day.'</p>';

                    // Add the inventory price to the total price
                    $total_price += $qty * $rent_duration * $single->price[0]->price_per_day;
                } else {

                    if ($single->price[0]->price_per_3hour != 0) {
                        // Calculate the rent duration in hours
                        $rent_duration = (int) date_diff(date_create($pickup_time), date_create($return_time))->format('%h');

                        if ($rent_duration % 3 == 0) {
                            $rent_duration = (int) ($rent_duration / 3);
                        } else {
                            $rent_duration = (int) ($rent_duration / 3) + 1;
                        }

                        // Create the tagged hmtl
                        $tagged_html .= '<p><span class="custom-modal-field">'.$single->name.' :</span> '.$qty.' x Rp '.$single->price[0]->price_per_3hour.'/3 jam = Rp '.$qty * $rent_duration * $single->price[0]->price_per_3hour.'</p>';

                        // Add the inventory price to the total price
                        $total_price += $qty * $rent_duration * $single->price[0]->price_per_3hour;
                    } else {
                        // Create the tagged hmtl
                        $tagged_html .= '<p><span class="custom-modal-field">'.$single->name.' :</span> '.$qty.' x Rp '.$single->price[0]->price_per_day.' = Rp '.$qty * $rent_duration * $single->price[0]->price_per_day.'</p>';

                        // Add the inventory price to the total price
                        $total_price += $qty * $single->price[0]->price_per_day;
                    }
                    
                }
            }
        }

        $tagged_html .= '<p><span class="custom-modal-field">Total Harga : </span> Rp '.$total_price.'</p>';

        // Create the modal body html
        $html =
            '
                <h5>Personal Information</h5>
                <p><span class="custom-modal-field">Nama :</span> '.$name.'</p>
                <p><span class="custom-modal-field">NIM :</span> '.$nim.'</p>
                <p><span class="custom-modal-field">Organisasi :</span> '.$organization.'</p>
                <p><span class="custom-modal-field">Email :</span> '.$email.'</p>
                <p><span class="custom-modal-field">No Telepon :</span> '.$no_tlp.'</p>
                
                <hr>
                
                <h5>Rent Duration</h5>
                <p><span class="custom-modal-field">Pickup Time :</span> '.date_format(date_create($pickup_time), 'd M Y - H:i').'</p>
                <p><span class="custom-modal-field">Return Time :</span> '.date_format(date_create($return_time), 'd M Y - H:i').'</p>
                
                <hr>
                
                <h5>Rent Price</h5>'.
                $tagged_html.'
            ';

        return $html;
    }
});

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| All routes below this are for admin website
|
*/

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->name('dashboard');

Route::get('/charts', function () {
    return view('admin/charts');
})->name('charts');

Route::get('/tables', function () {
    return view('admin/tables');
})->name('tables');

Route::get('/navbar', function () {
    return view('admin/navbar');
})->name('navbar');

Route::get('/cards', function () {
    return view('admin/cards');
})->name('cards');

Route::get('/login', function () {
    return view('admin/login');
})->name('login');

Route::get('/register', function () {
    return view('admin/register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('admin/forgot-password');
})->name('forgot-password');

Route::get('/blank', function () {
    return view('admin/blank');
})->name('blank');