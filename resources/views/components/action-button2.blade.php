@foreach ($actions as $action)
	@if (!empty($action['url']))
		@if (!empty($action['can']))
			@if (Gate::allows($action['can']))
				<a class="{{ $action['class'] ?? '' }}" href="{{ $action['url'] }}" target="{{ (!empty($action['target'])) ? $action['target'] : '' }}">
					{{ $action['label'] }}
				</a>
			@endif
		@else
			<a class="{{ $action['class'] ?? '' }}" href="{{ $action['url'] }}" target="{{ (!empty($action['target'])) ? $action['target'] : '' }}">
				{{ $action['label'] }}
			</a>
		@endif
	@else

		@if (!empty($action['can']))
			@if (Gate::allows($action['can']))
				<button onclick="{{ (!empty($action['onclick'])) ? $action['onclick'] : '' }}" class="{{ $action['class'] ?? '' }}" type="button">
					{{ $action['label'] }}
				</button>
			@endif
		@else

			<button onclick="{{ (!empty($action['onclick'])) ? $action['onclick'] : '' }}" class="{{ $action['class'] ?? '' }}" type="button">
				{{ $action['label'] }}
			</button>
		@endif
	@endif
@endforeach
