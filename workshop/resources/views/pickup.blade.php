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
            <tr>
                <td><a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">Top</a></td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td><span class="label label-success">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                <td>ganti</td>
            </tr>
        </table>
    </div>
    <!-- /.box-body -->
</div>
@endsection