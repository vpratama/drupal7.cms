<div id="content" role="main">
	<div ng-app="myApp" ng-controller="customersCtrl"> 
		<div ng-repeat="nodes in result"> 
		  <div ng-repeat="node in nodes">
			
		    <h2 class="node__title node-title">{{ node.title }}</h2>
		    {{ node["Post date"]}}
		    <br>
		    <br>
		    <br>
		    <p align="justify">{{ node.Body }}</p>
			<br />
			<br />
		  </div>
		</div>
	</div>
</div>