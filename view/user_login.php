<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
<form class="form-horizontal" action="/user/login" method="post">
    <div class="component" data-html="true">
        <p><?= Message::get("login_error") ?></p>
        <div class="form-group">
            <label class="col-md-2 control-label" for="textinput">E-Mail</label>
            <div class="col-md-4">
                <input id="email" name="email" type="email" class="form-control input-md" required placeholder="E-Mail">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="textinput">Password</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" class="form-control input-md" required placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="textinput">&nbsp;</label>
            <div class="col-md-4">
                <input id="send" name="send" type="submit" class="btn btn-primary" value="Login">
            </div>
        </div>

    </div>
</form>
