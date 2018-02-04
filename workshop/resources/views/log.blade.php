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
                <th>Status</th>
            </tr>
            @foreach ($logs as $key=>$log)
                <tr>
                    <td>{{ $log['name'] }}</td>
                    <td>{{ $log['org'] }}</td>
                    <td>{{ $log['rent'] }}</td>
                    <td>{{ $log['from'] }}</td>
                    <td>{{ $log['until'] }}</td>
                    <td><span data-toggle="tooltip" data-html="true" data-placement="bottom" title="Last updated : {{ $log['update'] }}<br/>Pickup/Return : {{ $log['pickup'] }}/{{ $log['return'] }}">{{ $log['status'] }}</span></td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection