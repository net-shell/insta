<div class="row">
	<div class="medium-5 columns ng-cloak" ng-controller="ServersController">
		<div class="clearfix">
			<h2>
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-server fa-stack-1x"></i>
				</span>
				{{ trans('server.title') }}
			</h2>

			<p>
				<a ng-click="create()">
					<i class="fa fa-plus"></i> {{ trans('server.create') }}
				</a>
			</p>
		</div>
		<accordion>
			<accordion-group is-open="server.selected" ng-repeat="server in servers" ng-class="{ 'disabled' : server.deleted_at }">
				<accordion-heading>
					<div ng-click="$root.selectedServer = !server.selected ? server : null">
						<i class="fa" ng-class="{ 'fa-circle': !server.selected.deleted_at, 'fa-circle-o-notch': server.deleted_at }"></i>
						@{{ server.name }}
						<i class="right" ng-class="{'fa fa-chevron-down': server.selected, 'fa fa-chevron-right': !server.selected}"></i>
					</div>
				</accordion-heading>
				
				<div class="row collapse" ng-if="server.deleted_at">
					<div class="small-4 columns">
						{{ trans('server.disabled_info') }}
					</div>
					<div class="small-8 columns">
						<a class="button expand" ng-click="enable(server)">
							<i class="fa fa-power-off"></i>
							{{ trans('server.enable') }}
						</a>
						<a class="small button expand" ng-click="delete(server)">
							<i class="fa fa-remove"></i>
							{{ trans('server.delete') }}
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
						<a class="small button expand" ng-click="disable(server)">
							<i class="fa fa-power-off"></i> {{ trans('server.disable') }}
						</a>
					</div>
				</div>

				<ul class="button-group even-3" ng-if="!server.deleted_at">
					<li>
						<a class="small button" ng-click="details(server)">
							<i class="fa fa-2x fa-server"></i>
							<div>{{ trans('server.system') }}</div>
						</a>
					</li>
					<li>
						<a class="small button">
							<i class="fa fa-2x fa-unlock-alt"></i>
							<div>{{ trans('server.credentials') }}</div>
						</a>
					</li>
					<li>
						<a class="small button">
							<i class="fa fa-2x fa-cog"></i>
							<div>{{ trans('server.settings') }}</div>
						</a>
					</li>
				</ul>
			</accordion-group>
		</accordion>
	</div>
	<div class="medium-7 columns details ng-cloak" ng-controller="ServerDetailsController" ng-if="$root.selectedServer">
		@include('partials.server.details')
	</div>
</div>

<script type="text/ng-template" id="serverForm.html">@include('partials.server.form')</script>
<script type="text/ng-template" id="serverSystem.html">@include('partials.server.system')</script>