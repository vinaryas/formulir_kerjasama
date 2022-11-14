@extends('adminlte::page')

@section('title', 'Lingkup Kerjasama')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('lingkupKerjasama.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <label>Lingkup Kerjasama</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
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
                    <th> Lingkup Kerjasama </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lingkupKerjasama as $kerjasama)
                    <tr>
                        <td>{{ $kerjasama->id }}</td>
                        <td>{{ $kerjasama->nama }}</td>
                        <td><a href="{{ route('lingkupKerjasama.detail', $kerjasama->id) }}"
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
            $('#table').DataTable();
        });
    </script>
@stop
