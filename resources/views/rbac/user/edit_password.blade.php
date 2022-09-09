@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
{{-- <ol class="breadcrumb float-sm-right">
	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	<li class="breadcrumb-item text-dark">User</li>
</ol> --}}
<h1 class="m-0 text-dark">Ubah Passoword</h1>
@stop

@section('content')

<div class="card">
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		
		<form action="{{ route('update.password', $id) }}" method="POST">
			@csrf
			@method('PUT')
			
			<div class="form-group">
				<label for="level">Password</label>
				<div class="input-value">
					<input type="password" class="form-control form-control-sm" id="password" name="password" value="{{ old('password') }}">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="level">Ulangi Password</label>
				<div class="input-value">
					<input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-sm" value="Simpan">
				<a href="{{ route('user.index') }}" class="btn btn-danger float-right">Batal</a>
			</div>
		</form>
	</div>
</div>
@stop

@section('css')
@stop

@section('js')
<script>
</script>

@stop