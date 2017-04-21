<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
<p><?= Message::get("update")?></p>
<!-- Form to edit the Title of certain Blogs gets generates here-->
<form class="form-horizontal" action="/blog/changeTitle?id=<?php echo $id?>" method="post">
    <div class="component" data-html="true">
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">New title</label>
            <div class="col-md-4">
                <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="send">&nbsp;</label>
            <div class="col-md-4">
                <input id="send" name="send" type="submit" class="btn btn-primary" value="update">
            </div>
        </div>
    </div>
</form>
