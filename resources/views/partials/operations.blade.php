<div class="row">
	<div class="medium-7 columns ng-cloak">
		<div class="clearfix">
			<h2>
				<span class="fa-stack">
					<i class="fa fa-square-o fa-stack-2x"></i>
					<i class="fa fa-cubes fa-stack-1x"></i>
				</span>
				{{ trans('operation.title') }}
			</h2>
		
			<p>
				<a ng-click="create()">
					<i class="fa fa-plus"></i> {{ trans('operation.create') }}
				</a>
			</p>
		</div>
	</div>
	<div class="medium-5 columns ng-cloak" ng-controller="JobsController">
		<h2>
			<span class="fa-stack">
				<i class="fa fa-square-o fa-stack-2x"></i>
				<i class="fa fa-terminal fa-stack-1x"></i>
			</span>
			{{ trans('job.title') }}
		</h2>
		
		<p>
			<a ng-click="create()">
				<i class="fa fa-plus"></i> {{ trans('job.create') }}
			</a>
		</p>

		<ul>
			<li ng-repeat="job in jobs">
				<b>@{{ job.name }}</b>
				<div>
					<code>@{{ job.command }}</code>
				</div>
			</li>
		</ul>
	</div>
</div>