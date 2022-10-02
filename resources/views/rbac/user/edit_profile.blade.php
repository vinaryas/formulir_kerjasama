@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
{{-- <ol class="breadcrumb float-sm-right">
	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	<li class="breadcrumb-item text-dark">User</li>
</ol> --}}
<h1 class="m-0 text-dark">{{ __('submission.user.edit_profile.title') }}</h1>
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
		
		<form action="{{ route('update.profile2', $user->id) }}" method="POST">
			@csrf
			@method('PUT')

			<div class="form-group">
				<label for="level">{{ __('submission.user.edit_profile.name') }}</label>
				<div class="input-value">
					<input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ (old('name') == null) ? $user->name : old('name') }}">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="level">{{ __('submission.user.edit_profile.username') }}</label>
				<div class="input-value">
					<input type="text" class="form-control form-control-sm" id="username" name="username" value="{{ (old('username') == null) ? $user->username : old('username') }}">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="level">{{ __('submission.user.edit_profile.language') }}</label>
				<div class="input-value">
					@php
						$selectedId = '';
						$selectedEn = '';
						if(old('lang') == null){
							if($user->lang == 'id'){
								$selectedId = 'selected';
							}else{
								$selectedEn = 'selected';
							}
						}else{
							if(old('lang') == 'id'){
								$selectedId = 'selected';
							}else{
								$selectedEn = 'selected';
							}
						}
					@endphp
					<select name="lang" id="lang" class="form-control form-control-sm">
						<option value=""></option>
						<option value="id" {{ $selectedId }}>Indonesia</option>
						<option value="en" {{ $selectedEn }}>English</option>
					</select>
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="level">{{ __('submission.user.edit_profile.password') }}</label>
				<div class="input-value">
					<input type="password" class="form-control form-control-sm" id="password" name="password" value="{{ old('password') }}">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="level">{{ __('submission.user.edit_profile.password_confirmation') }}</label>
				<div class="input-value">
					<input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
					<div id="feedback_name" class="feedback text-danger d-none"></div>
				</div>
			</div>
			
			<div class="form-group">
				<a href="{{ route('user.index') }}" class="btn btn-danger">{{ __('submission.user.edit_profile.btn_back') }}</a>
				<input type="submit" class="btn btn-primary btn-sm float-right" value="{{ __('submission.user.edit_profile.btn_save') }}">
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