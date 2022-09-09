{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item text-dark">Role</li>
</ol>
<h1 class="m-0 text-dark">Role</h1>
@stop

@section('content')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="card card-default">
    <div class="card-header">

        <button href="#" onclick="addForm()" class="btn btn-primary btn-sm" {{ (Laratrust::isAbleTo('add-role')) ? '' : 'disabled' }}>
            <i class="fas fa-plus"></i> Role
        </button>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-sm dt-responsive nowrap" id="t_role">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-center">ACTION</th>
                    <th class="text-center">ID</th>
                    <th class="text-center">NAME</th>
                    <th class="text-center">DISPLAY NAME</th>
                    <th class="text-center">DESCRIPTION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('rbac.role.create')
@include('rbac.role.permissionrole')
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/jstree/dist/themes/default/style.min.css') }}" />
<style>
    .vl {
        border-left: 1px solid grey;
    }
</style>
@stop

@section('js')
<script src="{{ asset('vendor/jstree/dist/jstree.min.js') }}"></script>
<script>
    function addForm() {
        save_method = 'add';
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#id').val("");
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Role');
    }

    function editForm(id) {

        save_method = 'edit';
        $('input[name=_method]').val('PUT');
        $('#modal-form form')[0].reset();

        $.ajax({
            type: "GET",
            url: '{{ url('role') }}/' + id + '/edit',
            dataType: "JSON",
            success: function (response) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Role');

                $('#id').val(response.id);
                $('#name').val(response.name);
                $('#display_name').val(response.display_name);
                $('#description').val(response.description);
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    }

    function submitForm(){
        $('.feedback').addClass('d-none');
        var id = $('#id').val();
        if (save_method == 'add') url = '{{ url('role') }}';
        else url = '{{ url('role') }}/' + id;

        $data = $('#modal-form form').serialize();

        $.ajax({
            type: "POST",
            url: url,
            data: $('#modal-form form').serialize(),
            success: function (response) {
                toast(response, 'modal-form');

                $('#t_role').DataTable().ajax.reload();
            },
            error: function(xhr){
                // console.log(xhr);

                if (xhr.status == 422) {
                    var errors = JSON.parse(xhr.responseText);
                    // console.log(errors.errors.name[0]);

                    $.each(errors.errors, function (i, v) {
                        $("#feedback_" + i).html('<i class="fas fa-exclamation-triangle"></i>' + v[0]);
                        $("#feedback_" + i).removeClass('d-none');
                    });

                }
            }
        });
    }

    function submitPermissionRole(){
        var permission_id = [];

        $.each($("#list_permission").jstree("get_checked",true),function(){
            permission_id.push(this.id);
        });

        if (save_method == 'add') url = '{{ url('permission_role') }}';

        var data = {
            '_token': $('#_token').val(),
            'role_id': $('#role_id').val(),
            'permission_id': permission_id
        };

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function (response) {
                // console.log(response);

                toast(response, 'modal-permission-role');

            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    }

    function editPermission(role_id) {
        $("#cb_permission_all").prop('checked', false);
        save_method = 'add';
        $('#role_id').val(role_id);
        $('input[name=_method]').val('POST');
        $('#modal-permission-role').modal('show');
        $('.modal-title').text('Edit Permission');

        var url = '{{ url('permission_role/list') }}/' + role_id;

        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                // console.log(response);

                $('#mymenu').html(response);

            }
        });

        /* var url = '{{ url('permission_role/dt') }}/' + role_id;

        var t_permissionrole = $('#t_permissionrole').DataTable({
            processing: true,
            ajax: url,
            paging: false,
            columns: [
            {data: 'action', name: 'action', orderable: false, searchable: false, className:'text-left'},
            {data: 'parent', name: 'parent'},
            {data: 'display_name', name: 'display_name'}
            ]
        }); */

    }

    $(document).ready(function () {
        var t_role = $('#t_role').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('role.dt') }}',
            columns: [
            {data: 'action', name: 'action', orderable: false, searchable: false, className:'text-center'},
            {data: 'id', name: 'id', className:'text-center'},
            {data: 'name', name: 'name', className:'text-center'},
            {data: 'display_name', name: 'display_name', className:'text-center'},
            {data: 'description', name: 'description', className:'text-center'},
            ]
        });

        $('#modal-form form').on('submit', function (e) {
            e.preventDefault();

            submitForm();

            return false;
        });

        $('#modal-permission-role form').on('submit', function (e) {
            e.preventDefault();

            submitPermissionRole();

            return false;
        });

        $("#cb_permission_all").change(function(){ //"select all" change
            $(".cb_permission").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });

        $('#modal-permission-role').on('hidden.bs.modal', function () {
            $(".cb_permission").prop('checked', false);
            $('#t_permissionrole').DataTable().destroy();
        });

        // $('#role_id').select2({
        //     placeholder: 'Input role',
        //     allowClear: true,
        //     ajax: {
        //         url: '{{ route('role.select2') }}',
        //         dataType: 'json',
        //         data: function (params) {
        //             return {
        //                 input: $.trim(params.term),
        //             };
        //         },
        //         processResults: function (data) {
        //             return {
        //                 results: data
        //             };
        //         },
        //         cache: true
        //     }
        // });

    });
</script>
@stop
