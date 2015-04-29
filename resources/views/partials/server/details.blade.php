<h2>@{{ $root.selectedServer.name }}</h2>

<div ng-if="!$root.selectedServer.deleted_at">
	<div>
		<b>{{ trans('app.created_at') }}:</b>
		@{{ $root.selectedServer.created_at }}
	</div>
	<div>
		<b>{{ trans('app.updated_at') }}:</b>
		@{{ $root.selectedServer.updated_at }}
	</div>
</div>

<div ng-if="$root.selectedServer.deleted_at">
	<i class="fa fa-power-off"></i>
	@{{ $root.selectedServer.deleted_at }}
</div>