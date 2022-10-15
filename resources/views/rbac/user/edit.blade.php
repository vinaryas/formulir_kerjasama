@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
{{-- <ol class="breadcrumb float-sm-right">
	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	<li class="breadcrumb-item text-dark">User</li>
</ol> --}}
<h1 class="m-0 text-dark">Ubah User</h1>
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
		
		<form action="{{ route('user.update', $user->id) }}" method="POST">
			@csrf
			@method('PUT')
			
			<div class="form-group">
				<label for="level">Name</label>
				<div class="input-value">
					<input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $user->name }}">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="level">User ID</label>
				<div class="input-value">
					<input type="text" class="form-control form-control-sm" id="username" name="username" value="{{ $user->username }}">
					<div id="feedback_username" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="level">Email</label>
				<div class="input-value">
					<input type="email" class="form-control form-control-sm" id="email" name="email" value="{{ $user->email }}">
					<div id="feedback_email" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="level">Role</label>
				<div class="input-value">
					<select name="role_id" id="role_id" class="select2" style="width: 100%;">
						<option value=""></option>
						@foreach ($roles as $role)
							<option value="{{ $role->id }}" {{ ($role->id == $user->RoleUser->role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
						@endforeach
					</select>
					<div id="feedback_role_id" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-primary btn-sm float-right" value="Simpan">
				<a href="{{ route('user.index') }}" class="btn btn-danger">Batal</a>
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
	$(document).ready(function () {
		$('#jenis_kelamin').select2({
			placeholder: '...',
			allowClear: true
		});
	});
</script>

@stop