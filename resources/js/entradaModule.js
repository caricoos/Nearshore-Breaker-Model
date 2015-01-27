(function() {
	var app = angular.module('entradaApp', []);

	app.controller('entradaController', function($scope, $http){
		
    	$scope.scan = "";

    	
    	$http.get('resources/beach_hazards_warning_levels_today.csv').
			  success(function(data, status, headers, config) {

			  	alert("Runned")
				var lines=data.split("\n");
				var result = [];
				var headers=lines[0].split(",");

				for(var i=1;i<lines.length;i++){
					var obj = {};
					var currentline=lines[i].split(",");
					for(var j=0;j<headers.length;j++){
						obj[headers[j]] = currentline[j];
					}
					result.push(obj);
				}

				console.log(JSON.stringify(result))
				$scope.scan = JSON.stringify(result);


			  }).
			  error(function(data, status, headers, config) {
			    alert("Error loading the data.")
			});


  	});

})();
