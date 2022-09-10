@extends('adminlte::page')

@section('title', 'Master')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop

@section('content')
<form class="card" action="{{ route('kategoriMitra.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label> Kategori Mitra </label>
                <input type="text" id="kategori" name="kategori" class="form-control" required>
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
                    <th> Kategor iMitra </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoriMitra as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->kategori }}</td>
                        <td><a href="{{ route('kategoriMitra.detail', $kategori->id) }}"
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
