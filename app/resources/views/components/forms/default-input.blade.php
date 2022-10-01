<div class="form-group">
	<label>{{ $label }}</label>
	@if (isset($footer) and $footer != null)
		<footer class="blockquote-footer">{{ $footer }}</footer>
	@endif
	@if ($type == 'select')
		<select name="{{ $name }}" id="{{ $name }}" class="form-control select2 {{ isset($class) ? $class : '' }}">
			<option value="">...</option>
			@if (isset($option))
				@foreach ($option as $item)
				<option value="{{ $item[$key] }}" {{ (@$value == $item[$key]) ? 'selected' : '' }}>{{ $item[$text] }}</option>
				@endforeach
			@endif
		</select>
	@else
		<input type="{{ $type }}" class="form-control form-control-sm {{ isset($class) ? $class : '' }}" 
			id="{{ $name }}" 
			name="{{ $name }}" 
			@if (isset($disabled) and $disabled = 'disabled')
				disabled={{ $disabled }}
			@endif
			value="{{ (@$value != NULL) ? @$value : old($name) }}">
	@endif
</div>