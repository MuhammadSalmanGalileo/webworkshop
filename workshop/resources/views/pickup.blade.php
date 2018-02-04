 @extends('admin.admin_template')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Daftar Tag</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <th>Organization</th>
                <th>Rent</th>
                <th>From</th>
                <th>Until</th>
                <th>Change</th>
            </tr>
            @foreach ($pickup_log as $key=>$pickup)
                <tr>
                    <td><span data-toggle="tooltip" data-html="true" data-placement="bottom" title="HP : {{ $pickup['hp'] }}">{{ $pickup['name'] }}</span></td>
                    <td>{{ $pickup['org'] }}</td>
                    <td>{{ $pickup['rent'] }}</td>
                    <td>{{ $pickup['from'] }}</td>
                    <td>{{ $pickup['until'] }}</td>
                    <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal{{ $key }}">Pickup</button></td>
                </tr>
            @endforeach
        </table>
        @foreach ($pickup_log as $key=>$pickup)
            <!-- Modal -->
            <div id="modal{{ $key }}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <form action="/pickuppost" method="post">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Pengambilan Barang</h4>
                            </div>
                            <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="id" value="{{ $pickup['id'] }}" />
                                    <p>Pengambilan barang atas nama {{ $pickup['name'] }}</p>
                                    <p>NIM pemberi : </p><input type="string" name="nim" id="nim"/>
                                    <!-- <input type=password id=password> Password </input> -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.box-body -->
</div>
@endsection