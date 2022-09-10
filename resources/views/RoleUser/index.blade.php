@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('role_user.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label> Role </label>
                <select name="role_id" id="role_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label> User </label>
                <select name="user_id" id="user_id" class="select2 form-control form-control-sm" required>
                    <option> </option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <input type="hidden" id="user_type" name="user_type" value="{{ 'App\User' }}" class="form-control form-control-sm" required>
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
                    <th> user_id </th>
                    <th> role_id </th>
                    <th> user_type </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roleUsers as $roleUser)
                    <tr>
                        <td>{{ $roleUser->user_id }}</td>
                        <td>{{ $roleUser->role_id }}</td>
                        <td>{{ $roleUser->user_type }}</td>
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
