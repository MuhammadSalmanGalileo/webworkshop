@extends('admin.admin_template')

@section('content')
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Update Pesanan</h3>
        </div>
        <div class="box-body">
            <form action="/update" method="post">
                <div class="form-group vertical-align">
                    <label class="col-sm-2 control-label">Nama Pemesan</label>
                    <label class="col-sm-10 control-label">{{$log["name"]}}</label>
                </div>
                <div class="form-group vertical-align">
                    <label class="col-sm-2 control-label">Waktu Pemesanan</label>
                    <label class="col-sm-10 control-label">{{$log["waktu"]}}</label>
                </div>
                @foreach ($log['listLog'] as $key=>$value)
                    <div class="form-group vertical-align">
                        <label for="inputEmail3" class="col-sm-2 control-label">{{$key}}</label>
                        <div class="input-group col-sm-10">
                        <input name="{{$key}}" type="text" class="form-control" value="{{$value[0]}}">
                        <span class="input-group-addon">/{{$value[1]}}</span>
                        </div>
                    </div>
                @endforeach
                <div class="form-group vertical-align">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection