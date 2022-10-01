@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('jenisKerjasama.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>Role Name</label>
                <input type="text" id="name" name="name" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-6">
                <label>Display Name</label>
                <input type="text" id="display_name" name="display_name" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-12">
                <label>Description</label>
                <input type="text" id="description" name="description" class="form-control form-control-sm" required>
            </div>
        </div>
        </div>
        <br>
        <div class="float-right">
            <button type="submit" class="btn btn-info" name="submit" id="submit" >
                <i class="fas fa-save"></i> Submit
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
