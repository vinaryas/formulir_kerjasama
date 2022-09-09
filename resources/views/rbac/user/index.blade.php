{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
{{-- <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item text-dark">User</li>
</ol> --}}
<h1 class="m-0 text-dark">User</h1>
@stop

@section('content')
<div class="card card-default">
    <div class="card-header">
        {{-- <button type="button" href="#" onclick="addForm()" class="btn btn-primary btn-sm" {{ (Laratrust::isAbleTo('add-user')) ? '' : 'disabled' }}>
            <i class="fas fa-plus"></i> User
        </button> --}}

		<a href="{{ route('user.create') }}" class="btn btn-primary btn-sm" {{ (Laratrust::isAbleTo('add-user')) ? '' : 'disabled' }}><i class="fas fa-plus"></i> User</a>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped dt-responsive nowrap table-sm" id="t_user" style="width:100%">
            <thead>
                <tr>
					<th class="text-center">ID</th>
                    <th class="text-center">NAME</th>
                    <th class="text-center">USERNAME</th>
                    <th class="text-center">JABATAN</th>
                    <th style="width: 5%;" class="text-center">ACTION</th>
                    {{-- <th class="text-center">ROLE</th> --}}
                </tr>
            </thead>
        </table>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
<script src="{{ asset('js/mySelect.js') }}"></script>
<script>
    function deleteData(id){
        Swal.fire({
            title: 'Yakin ini menghapus user ini?',
            text: "User yang sudah dihapus tidak dapat dikembalikan lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: '{{ url('user') }}/' + id,
                    data: {
                        '_method': 'delete',
                        '_token': '{!! csrf_token() !!}'
                    },
                    success: function (response) {
                        toast(response, 'modal-form');

                        $('#t_user').DataTable().ajax.reload();
                    }
                });
            }
        })

    }

    $(document).ready(function () {
        var t_user = $('#t_user').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('user.dt') }}',
            columns: [
				{data: 'id', name: 'id', className:'text-center'},
				{data: 'name', name: 'name'},
				{data: 'username', name: 'username', className:'text-center'},
				{data: 'role_user.role.name', name: 'role_user.role.name', className:'text-center'},
				{data: 'action', name: 'action', orderable: false, searchable: false, className:'text-center'},
            // {data: 'role_user.role.name', name: 'role_user.role.name'},
            ]
        });

        // setSelect2('#role_id', '{{ route('role.select2') }}', 'Pilih Role');
        // setSelect2('#role_id2', '{{ route('role.select2') }}', 'Pilih Role');

    });
</script>

@stop
