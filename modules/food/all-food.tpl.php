<div id="content" role="main">
	<div ng-app="myApp" ng-controller="customersCtrl"> 
		<div ng-repeat="nodes in result"> 
		  <div ng-repeat="node in nodes">
			
		    <h2 class="node__title node-title">{{ node.title }}</h2>
			<div ng-repeat="image in node">
			    <img alt="{{ image.alt }}" src="{{ image.src }}" width="200px" />	
			</div>
			<b>Price :</b> {{ node.Price }}
			<br />
			<br />
			<br />
			<br />
		  </div>
		</div>
	</div>
</div>