@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('mapping.update') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="col-md-12">
            <input type="hidden" id="id" name="id"  value="{{ $mappingApps->id }}" >
        </div>
        <div class="row">
            <div class="col-md-6">
                <label> Role </label>
                <select name="role_id" id="role_id" class="select2 form-control form-control-sm" required>
                    <option value=""> </option>
                    @foreach ($role as $role)
                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> Position </label>
                <input type="text" id="position" name="position" value="{{ $mappingApps->position }}" class="form-control form-control-sm" required>
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
