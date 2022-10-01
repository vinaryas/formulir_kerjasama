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
			
			{{-- <div class="form-group">
				<label for="level">Email</label>
				<div class="input-value">
					<input type="email" class="form-control form-control-sm" id="email" name="email" >
					<div id="feedback_email" class="feedback text-danger d-none"></div>
				</div>
			</div> --}}
			
			<div class="form-group">
				<label for="level">Role</label>
				<div class="input-value">
					<select name="jabatan_id" id="jabatan_id" class="" style="width: 100%;"></select>
					<div id="feedback_jabatan_id" class="feedback text-danger d-none"></div>
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
	$(document).ready(function () {
		let user = {!! $user !!};

		console.log(user);

		$('#jenis_kelamin').select2({
			placeholder: '...',
			allowClear: true
		});

		setSelect2('#jabatan_id', '{{ route('role.select2') }}', '...', _data = function (params) {
			return {
				nama: $.trim(params.term)
			};
		});

		setSelectedSelect2('#jabatan_id', user.jabatan, 'id', 'nama');
	});
</script>

@stop