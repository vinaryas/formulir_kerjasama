@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('jenisPengajuan.update') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="col-md-12">
            <input type="hidden" id="id" name="id"  value="{{ $jenisPengajuan->id }}" >
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Jenis Pengajuan</label>
                <input type="text" id="pengajuan" name="pengajuan" value="{{ $jenisPengajuan->pengajuan }}" class="form-control" required>
            </div>
        </div>
        <br>
        <div class="float-right">
            <button type="submit" class="btn btn-info" name="update" id="update" >
                <i class="fas fa-save"></i> Update
            </button>
        </div>
        <div class="">
            <button type="submit" class="btn btn-danger" name="delete" id="delete">
                <i class="fas fa-trash"></i> Delete
            </button>
        </div>
    </div>
</form>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
@stop
