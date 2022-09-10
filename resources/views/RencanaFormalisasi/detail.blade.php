@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('rencanaFormalisasi.update') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="col-md-12">
            <input type="hidden" id="id" name="id"  value="{{ $rencanaFormalisasi->id }}" >
        </div>
        <div class="row">
            <div class="col-md-12">
                <label> Rencana Formalisasi </label>
                <input type="text" id="rencana" name="rencana" value="{{ $rencanaFormalisasi->rencana }}" class="form-control" required>
            </div>
        </div>
        <br>
        <div class="float-right">
            <button type="submit" class="btn btn-info" name="submit" id="submit" >
                <i class="fas fa-save"></i> Update
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
