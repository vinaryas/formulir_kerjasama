{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Permission')

@section('content_header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="#">Assembly</a></li>
</ol>
<h1 class="m-0 text-dark">Assembly</h1>
@stop

@section('content')
<div class="card card-default">
    <div class="card-header">

        <a href="#" onclick="addForm()" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Permission
        </a>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped table-sm dt-responsive nowrap" id="t_permission">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">NAME</th>
                    <th class="text-center">DISPLAY NAME</th>
                    <th class="text-center">DESCRIPTION</th>
                    <th class="text-center">CREATED DATE</th>
                    <th class="text-center">UPDATED DATE</th>
                    <th class="text-center">ACTION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('rbac.permission.create')
@stop

@section('css')
@stop

@section('js')
<script>
    function addForm() {
        save_method = 'add';
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Permission');
    }

    function submitForm(){
        var id = $('#id').val();
        if (save_method == 'add') url = '{{ url('permission') }}';
        else url = '{{ url('permission') }}/' + id;

        $data = $('#modal-form form').serialize();

        $.ajax({
            type: "POST",
            url: url,
            data: $('#modal-form form').serialize(),
            success: function (response) {
                toast(response, 'modal-form');

                // if(response.success){
                //     $.toast({
                //         heading: 'Success',
                //         text: response.message,
                //         icon: 'success',
                //         position: 'bottom-right',
                //     });
                // } else{
                //     $.toast({
                //         heading: 'Failed',
                //         text: response.message,
                //         icon: 'error',
                //         position: 'bottom-right',
                //     });
                // }

                // $('#modal-form').modal('toggle');

                // $('#t_size').DataTable().ajax.reload();
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    }

    $(document).ready(function () {
        var t_permission = $('#t_permission').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('permission.dt') }}',
            columns: [
            {data: 'id', name: 'id', className:'text-center'},
            {data: 'name', name: 'name', className:'text-center'},
            {data: 'display_name', name: 'display_name', className:'text-center'},
            {data: 'description', name: 'description', className:'text-center'},
            {data: 'created_at', name: 'created_at', className:'text-center'},
            {data: 'updated_at', name: 'updated_at', className:'text-center'},
            {data: 'action', name: 'action', orderable: false, searchable: false, className:'text-center'}
            ]
        });

        $('#modal-form form').on('submit', function (e) {
            e.preventDefault();

            submitForm();

            return false;
        });
    });
</script>
@stop
