var app = angular.module('insta', ['restangular', 'mm.foundation', 'ngAnimate']);

app.controller('ServerIndexController', function ($scope, $rootScope, Restangular, $modal) {
	// the quick & dirty way:
	// $scope.servers = Restangular.all('servers').getList().$object;
	var baseServers = Restangular.all('servers');

	$scope.refresh = function() {
		baseServers.getList().then(function(servers) {
			$scope.servers = servers
		})
	}
	$scope.refresh()

	$scope.create = function() {
		$modal.open({
			templateUrl: 'serverForm.html',
			controller: 'ServerCreateController'
		}).result.then($scope.refresh)
	}

	$scope.delete = function(server) {
		if(confirm("Are you sure you want to delete " + server.name + "?")) {
			server.remove().then($scope.refresh)
		}
	}

	$scope.details = function(server) {
		$modal.open({
			templateUrl: 'serverSystem.html',
			controller: 'ServerSystemController',
			resolve: {
				server: function () { return server }
			}
		})
	}
})

app.controller('ServerSystemController', function ($scope, Restangular, $modalInstance, server) {
	$scope.server = server
	Restangular.one('servers', server.id).get().then(function(server) {
		$scope.server = server
	})
})

app.controller('ServerDetailsController', function ($scope, $rootScope, Restangular) {

})

app.controller('ServerCreateController', function ($scope, Restangular, $modalInstance) {
	
	var baseServers = Restangular.all('servers');

	$scope.server = { port: 22 }
	
	$scope.save = function(server) {
	
		baseServers.post(server).then(function(response) {
			$scope.alerts = response.errors
			if(response.success) $modalInstance.close()
		})
	}
	
	$scope.test = function(server) {
		Restangular.all('servers/test').post(server).then(function(response) {
			$scope.alerts = [response]
		})
	}
	
	$scope.closeAlert = function(index) {
		$scope.alerts.splice(index, 1)
	}
})