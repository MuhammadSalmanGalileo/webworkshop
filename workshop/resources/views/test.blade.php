@extends('admin.admin_template')

@section('content')
    @foreach($barang as $key => $value)
        <h3>{{ $key.':'.$value }}</h3>
    @endforeach
@endsection