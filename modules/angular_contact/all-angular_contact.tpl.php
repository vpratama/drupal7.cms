<div id="content" role="main">
	<div ng-app="myApp" ng-controller="formCtrl" >
	  <form name="FormValidation" novalidate ng-submit="processForm()">
	    Your name:<br>
	    <input type="text" ng-model="user.name">
	    <span style="color:red" ng-show="FormValidation.user.name.$dirty && FormValidation.user.name.$invalid">
			<span ng-show="FormValidation.user.name.$error.required">Required.</span>
		</span>
		<br>
	    Your e-mail address:<br>	    
		<input type="text" ng-model="user.email">
		<span style="color:red" ng-show="FormValidation.user.email.$dirty && FormValidation.user.email.$invalid">
	  		<span ng-show="FormValidation.user.email.$error.required">Required.</span>
	  		<span ng-show="FormValidation.user.email.$error.email">Invalid Email Format.</span>
	  	</span>
	  	<br>
	    Subject:<br>
	    <input type="text" ng-model="user.subject"><br>
	    Message:<br>
	    <textarea cols="50" rows="20" ng-model="user.message"></textarea><br>
	    <input type="submit" /> 
	  </form>
	  <br />
	  <br />
	  <code>{{ user }}</code>
	</div>
</div>