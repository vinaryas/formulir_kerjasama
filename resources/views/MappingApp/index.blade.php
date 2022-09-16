@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('mapping.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label> Role </label>
                <select name="role_id" id="role_id" class="select2 form-control form-control-sm" required>
                    <option value=""></option>
                    @foreach ($role as $role)
                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> Position </label>
                <input type="text" id="position" name="position" class="form-control form-control-sm" required>
            </div>
        </div>
        <br>
        <div class="float-right">
            <button type="submit" class="btn btn-info" name="submit" id="submit" >
                <i class="fas fa-save"></i> Submit
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Role </th>
                    <th> Position </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mappingApps as $mappingApp)
                    <tr>
                        <td>{{ $mappingApp->id }}</td>
                        <td>{{ $mappingApp->role->display_name }}</td>
                        <td>{{ $mappingApp->position }}</td>
                        <td><a href="{{ route('mapping.detail', $mappingApp->id) }}"
                            class="btn btn-info btn-sm"> Detail <i class="fas fa-angle-right"></i>
                        </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
