<h2>@{{ $root.selectedServer.name }}</h2>

<div ng-if="!$root.selectedServer.deleted_at">
	<b>{{ trans('app.created_at') }}:</b>
	@{{ $root.selectedServer.created_at }}
</div>

<div ng-if="$root.selectedServer.deleted_at">
	<i class="fa fa-power-off"></i>
	@{{ $root.selectedServer.deleted_at }}
</div>