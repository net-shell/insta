@extends('layouts/app')

@section('title', 'Dashboard')

@section('css')
.ng-enter {
	-webkit-animation: fadeIn .3s;
	-moz-animation: fadeIn .3s;
	-ms-animation: fadeIn .3s;
	animation: fadeIn .3s;
}
.details.ng-leave {
	-webkit-animation: fadeOut .3s;
	-moz-animation: fadeOut .3s;
	-ms-animation: fadeOut .3s;
	animation: fadeOut .3s;
}
@stop

@section('content')
<div class="row">
	<div class="medium-5 columns ng-cloak">
		<div ng-controller="ServerIndexController">
			<div class="clearfix">
				<a class="button right" ng-click="create()">
					<i class="fa fa-plus"></i>
				</a>
				<h2>{{ trans('servers.title') }}</h2>
			</div>
			<accordion>
				<accordion-group is-open="isopen" ng-repeat="server in servers">
					<accordion-heading>
						<div ng-click="$root.selectedServer = !isopen ? server : null">
							<i class="fa" ng-class="{ 'fa-circle': !server.deleted_at, 'fa-circle-o-notch': server.deleted_at }"></i>
							@{{ server.name }}
							<i class="right" ng-class="{'fa fa-chevron-down': isopen, 'fa fa-chevron-right': !isopen}"></i>
						</div>
					</accordion-heading>
					
					<div class="row collapse" ng-if="server.deleted_at">
						<div class="small-6 columns">
							{{ trans('servers.disabled_info') }}
						</div>
						<div class="small-6 columns">
							<a class="button expand">
								<i class="fa fa-power-off"></i>
								{{ trans('servers.enable') }}
							</a>
						</div>
					</div>
					
					<div class="row collapse" ng-if="!server.deleted_at">
						<div class="small-8 columns">
							<a href="#">
								<i class="fa fa-bell"></i>
								Pending updates
							</a>
							<br /> CentOS 7 Bla bla bla
						</div>
						<div class="small-4 columns">
							<a class="small button expand" ng-click="delete(server)">
								<i class="fa fa-power-off"></i> {{ trans('servers.disable') }}
							</a>
						</div>
					</div>

					<ul class="button-group even-3" ng-if="!server.deleted_at">
						<li>
							<a class="small button" ng-click="details(server)">
								<i class="fa fa-2x fa-server"></i>
								<div>{{ trans('servers.system') }}</div>
							</a>
						</li>
						<li>
							<a class="small button">
								<i class="fa fa-2x fa-refresh"></i>
								<div>{{ trans('servers.refresh') }}</div>
							</a>
						</li>
						<li>
							<a class="small button">
								<i class="fa fa-2x fa-cog"></i>
								<div>{{ trans('servers.settings') }}</div>
							</a>
						</li>
					</ul>
				</accordion-group>
			</accordion>
		</div>
	</div>
	<div class="medium-7 columns details ng-cloak" ng-controller="ServerDetailsController" ng-if="$root.selectedServer">
		@include('partials.server.details')
	</div>
</div>

<script type="text/ng-template" id="serverForm.html">@include('partials.server.form')</script>
<script type="text/ng-template" id="serverSystem.html">@include('partials.server.system')</script>
@stop