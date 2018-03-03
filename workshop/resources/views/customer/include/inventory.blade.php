@if (count($inventories) > 0)
    @foreach($inventories as $inventory )
    @if($inventory->quantity_ready > 0) 
        <div class="col-sm-6 col-md-4 sm-margin-b-20">
            <div class="thumbnail height-500">
                <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                    <?php $img_dir = (new \App\Http\Controllers\Controller)->unspace($inventory->name); ?>
                    <img class="img-catalog" style="display:block; height:200px; width:auto; margin-left:auto; margin-right:auto;" 
                    src="{{asset('customer_assets/img/inventory/'.$img_dir.'.png') }}" alt="">
                </div>
                <div class="caption">
                <h3 style="text-align: center;"><a href="#">{{$inventory ->name}}</a> <span class="text-uppercase margin-l-20"></span></h3>
                <p> <?php echo '<p>'.$inventory->meta .'</p>'?><br>
                <?php echo (new \App\Http\Controllers\CatalogController)->showRentPrice($inventory->id);?>
                
                </p>
                </div>
            </div>
            <!--<a class="link" href="#"></a>-->
        </div>
    @endif
    @endforeach
@else
    <p> No Catalog Found</p>
@endif