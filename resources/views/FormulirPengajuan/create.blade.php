@extends('adminlte::page')

@section('title', 'ID Management')

@section('content_header')
@stop

@section('content')
<form class="card" action="{{ route('form_pembuatan.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="form-group row">
            <div class="row">
                @foreach ( $apps as $app)
                    <div class="col-md-2">
                        <div>
                            <input class="form-check-inline" type="checkbox" name="aplikasi_id[]" value="{{ $app->id }}">
                            <label class="form-check-inline">{{ $app->name }}</label>
                        </div>
                    </div>
                    @if ($app->id == config('setting_app.aplikasi_id.vega'))
                        <div class="col-md-10">
                            <input type="text" class="form-control form-group" aria-label="Text input with checkbox" placeholder="ID" style="display: inline-flex" name="id_app[]" minlength="10" maxlength="10">
                            <input type="text" class="form-control form-group" aria-label="Text input with checkbox" placeholder="password" style="display: inline-flex" name="pass[]" minlength="8" maxlength="8">
                        </div>
                    @elseif ($app->id == config('setting_app.aplikasi_id.rjserver'))
                    <div class="col-md-10">
                        <input type="text" class="form-control form-group" aria-label="Text input with checkbox" placeholder="password" style="display: inline-flex" name="pass[]" minlength="6" maxlength="6">
                    </div>
                    @else
                    <div class="col-md-10"><input type="hidden" dissable></div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="float-left">
            <a href="{{ route('form_pembuatan.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
                <i class="fas fa-save"></i> Simpan
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
