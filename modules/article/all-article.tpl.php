<div id="content" role="main">
	<div ng-app="myApp" ng-init="article.type='article'" ng-controller="customersCtrl"> 
		<div class="input-append">
          Filter : <input type="text" ng-model="search" autocomplete="false" style="width: 300px">
        </div>
		<a ng-click="hidden()">Post new Article</a>
		<div ng-init="hideShow = true" ng-hide="hideShow">
			<form ng-submit="submit()" ng-init="article.body.und[0].format='filtered_html'">
		        Title&nbsp;&nbsp;&nbsp;<input ng-model="article.title" type="text" /><br /><br />
		        Content&nbsp;&nbsp;&nbsp;<textarea ng-model="article.body.und[0].value"></textarea><br /><br />
		        <input type="submit" />
		    </form>
		</div>
		<div ng-repeat="nodes in result  | filter:search">
			<h2 class="node__title node-title">{{ nodes.node.title }}</h2>
		    {{ nodes.node["Post date"]}}
		    <br>
		    {{ nodes.node["Author uid"]}}
		    <br>
		    <br>
		    <p align="justify">{{ nodes.node.Body }}</p>
			<br />
			<a>Update Post</a>
			<a ng-click="delete(nodes.node.Nid )">Delete Post</a>
			<br />
		</div>
	</div>
</div>