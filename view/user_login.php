<form class="form-horizontal" action="/user/doLogin" method="post">
    <div class="component" data-html="true">
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
