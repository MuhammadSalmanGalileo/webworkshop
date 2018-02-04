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
            @foreach ($return_log as $key=>$return)
                <tr>
                    <td><span data-toggle="tooltip" data-html="true" data-placement="bottom" title="HP : {{ $return['hp'] }}<br/>Pickup by : {{ $return['pickup'] }}">{{ $return['name'] }}</span></td>
                    <td>{{ $return['org'] }}</td>
                    <td>{{ $return['rent'] }}</td>
                    <td>{{ $return['from'] }}</td>
                    <td>{{ $return['until'] }}</td>
                    <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal{{ $key }}">Return</button></td>
                </tr>
            @endforeach
        </table>
        @foreach ($return_log as $key=>$return)
            <!-- Modal -->
            <div id="modal{{ $key }}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <form action="returnpost" method="post">
                            
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Pengembalian Barang</h4>
                            </div>
                            <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    <input type="hidden" name="id" value="{{ $return['id'] }}" />
                                    <p>Pengembalian barang atas nama {{ $return['name'] }}</p>
                                    <p>NIM penerima: </p><input type="string" name="nim" id="nim"/>
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