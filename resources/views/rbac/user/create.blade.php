@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
{{-- <ol class="breadcrumb float-sm-right">
	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	<li class="breadcrumb-item text-dark">User</li>
</ol> --}}
<h1 class="m-0 text-dark">Tambah User</h1>
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
		
		<form action="{{ route('user.store') }}" method="post">
			@csrf
			
			<div class="form-group">
				<label for="level">Name</label>
				<div class="input-value">
					<input type="text" class="form-control form-control-sm" id="name" name="name">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="level">Username</label>
				<div class="input-value">
					<input type="text" class="form-control form-control-sm" id="username" name="username">
					<div id="feedback_username" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="level">Email</label>
				<div class="input-value">
					<input type="email" class="form-control form-control-sm" id="email" name="email">
					<div id="feedback_email" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="level">Role</label>
				<div class="input-value">
					<select name="role_id" id="role_id" class="select2" style="width: 100%;">
						<option value=""></option>
						@foreach ($roles as $role)
							<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endforeach
					</select>
					<div id="feedback_role_id" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div id="form_password">
				<div class="form-group">
					<label for="level">Password <small class="text-muted">(Min. 8 karakter)</small></label>
					<div class="input-value">
						<input type="password" class="form-control form-control-sm" id="password" name="password">
						<div id="feedback_password" class="feedback text-danger d-none"></div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="level">Retype Password</label>
					<div class="input-value">
						<input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation">
						<div id="feedback_username" class="feedback text-danger d-none"></div>
					</div>
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
@include('components.select2')
<script>
</script>

@stop