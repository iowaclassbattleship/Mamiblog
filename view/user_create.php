<form class="form-horizontal" action="/user/doCreate" method="post" onsubmit="validate_registration()">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="firstName">Vorname</label>
		  <div class="col-md-4">
		  	<input id="firstName" name="firstName" type="text" placeholder="Vorname" class="form-control input-md" required >
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="lastName">Nachname</label>
		  <div class="col-md-4">
		  	<input id="lastName" name="lastName" type="text" placeholder="Nachname" class="form-control input-md" required>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="email">Mail</label>
		  <div class="col-md-4">
		  	<input id="email" name="email" type="email" placeholder="Mail" class="form-control input-md" required>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="password">Passwort</label>
		  <div class="col-md-4">
		  	<input id="password" name="password" type="password" placeholder="Passwort" class="form-control input-md" required>
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/javascript_validation.js"></script>

<?php
/*
    echo
        "
        <script language='JavaScript'>
            function validate_registration() {
                if (document.getElementById("firstName"))
            }
        </script>
        ";
*/
?>