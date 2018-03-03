$(document).ready(function () {
    var rent_date = $('#rent_date');
    var rent_hour = $('#rent_hour');
    var return_date = $('#return_date');
    var return_hour = $('#return_hour');
    var available_inventory = $('#available_inventory');

    rent_date.change(checkIfAllFilled);
    rent_hour.change(checkIfAllFilled);
    return_date.change(checkIfAllFilled);
    return_hour.change(checkIfAllFilled);

    available_inventory.css('opacity', '0');

    function checkIfAllFilled() {
        if (rent_date.val() && rent_hour.val() && return_date.val() && return_hour.val())
        {
            // Get the available inventory


            // Show the inventory
            available_inventory.css('opacity', '0');
            available_inventory.animate({opacity: 1});
        }
    }



});