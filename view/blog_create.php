

<form class="form-horizontal" action="/blog/doCreate" method="post" enctype="multipart/form-data">
    <div class="component" data-html="true">
        <div class="form-group">
            <label class="col-md-2 control-label" for="picture">Picture</label>
            <div class="col-md-4">
                <input id="picture" name="picture" type="file" placeholder="Picture" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="comment">Title</label>
            <div class="col-md-4">
                <input id="title" name="title" type="textarea" placeholder="Title" rows="4" cols="50" required>
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
