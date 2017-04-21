<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
<!-- HTML Code for generation of the upload form -->
<form class="form-horizontal" action="/blog/create" method="post" enctype="multipart/form-data">
    <div class="component" data-html="true">
        <p><?php echo Message::get("upload")?></p>
        <div class="form-group">
            <label class="col-md-2 control-label" for="picture">Picture</label>
            <div class="col-md-4">
                <input id="picture" name="picture" type="file" placeholder="Picture" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Title</label>
            <div class="col-md-4">
                <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" required>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="private">Private</label>
            <div class="col-md-4">
                <input id="private" name="private" type="checkbox" value="true" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="send">&nbsp;</label>
            <div class="col-md-4">
                <input id="send" name="send" type="submit" class="btn btn-primary" value="upload">
            </div>
        </div>
    </div>
</form>
