<div class="row">
	<div class="small-4 columns">
		<h3>
			<span class="fa-stack">
				<i class="fa fa-square-o fa-stack-2x"></i>
				<i class="fa fa-plus fa-stack-1x"></i>
			</span>
			{{ trans('server.create') }}
		</h3>
		<alert ng-repeat="alert in alerts" type="alert.type" close="closeAlert($index)">
			@{{ alert.message }}
		</alert>
		<a class="button expand" ng-click="save(server)">
			<i class="fa fa-check"></i>
			{{ trans('app.save') }}
		</a>
		<a class="secondary button expand" ng-click="test(server)">
			<i class="fa fa-cog"></i>
			{{ trans('server.test') }}
		</a>
	</div>
	<div class="small-8 columns">
  		<label>
			{{ trans('server.name') }}
			<input type="text" ng-model="server.name" />
		</label>
		<div class="row">
			<div class="small-8 columns">
				<label>
					{{ trans('server.host') }}
					<input type="text" ng-model="server.host" />
				</label>
			</div>
			<div class="small-4 columns">
				<label>
					{{ trans('server.port') }}
					<input type="text" ng-model="server.port" />
				</label>
			</div>
		</div>
		<label>
			{{ trans('server.user') }}
			<input type="text" ng-model="server.user" />
		</label>
		<label>
			{{ trans('server.password') }}
			<input type="password" ng-model="server.password" />
		</label>
	</div>
</div>