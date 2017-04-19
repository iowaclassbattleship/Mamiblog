<form class="form-horizontal" action="/user/doCreate" method="post" onsubmit="validate_registration()">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="firstName">First name</label>
		  <div class="col-md-4">
		  	<input id="firstName" name="firstName" type="text" placeholder="First name" class="form-control input-md" required >
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="lastName">Last name</label>
		  <div class="col-md-4">
		  	<input id="lastName" name="lastName" type="text" placeholder="Last name" class="form-control input-md" required>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="email">E-Mail</label>
		  <div class="col-md-4">
		  	<input id="email" name="email" type="email" placeholder="E-Mail" class="form-control input-md" required>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="password">Password</label>
		  <div class="col-md-4">
		  	<input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required>
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" value="Submit" name="send" type="submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/javascript_validation.js"></script>
