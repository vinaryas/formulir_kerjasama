@extends('adminlte::page')

@section('title', 'User')

@section('content_header')

<h1 class="m-0 text-dark">Tambah User</h1>
@stop

@section('content')

<div class="card">
	<select name="test" id="test" style="width: 100%;"></select>
</div>
@stop

@section('css')
@stop

@section('js')
@include('components.select2')
<script>
	$(document).ready(function () {
		$('#test').select2({
			placeholder: '...',
			allowClear: true,
			ajax: {
				url: "{{ route('role.select2') }}",
				dataType: 'json',
			}
		});
	});
</script>

@stop