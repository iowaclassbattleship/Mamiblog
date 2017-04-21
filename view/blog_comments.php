<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">

<article class="hreview open special">
    <div class="panel panel-default">
    <div>
        <img src="/<?= $blog->picture ?>" />
    </div>
    <?php if(Security::isAuthenticated()):?>
        <div class="panel-heading">

            <h1></h1>
        </div>

        <div class="panel-body">
            <form action="/comment/doCreate?blogid=<?= $blog->id ?>" method="post" >
                <div class="component" data-html="true">
                    <div class="form-group">
                        <div class="col-md-8">
                            <textarea name="commentarea" class="form-control input-md"required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <input id="submitComment" name="send" type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php endif ?>
        <div class="panel-body">
        <?php if (empty($comments)): ?>
            <div class="panel-body">
                <h2 class="item title">Hoopla! no comments found.</h2>
            </div>

        <?php else: ?>
            <h2>Comments:</h2>
            <?php foreach ($comments as $comment): ?>
                <div class="panel-body">
                    <p class="col-md-0"><?= $comment->time ?></p> <p class="col-md-0"><?= $comment->user->email ?>:</p><p class="col-md-12 comment"> <?= $comment->comment ?></p>
                        <?php if ((Security::getUserId() == $comment->userid)||Security::isAdmin()) : ?>
                            <a title="delete" href="/comment/commentDelete?id=<?= $comment->id ?>">delete</a>
                        <?php endif ?>
                    </p>
                </div>

            <?php endforeach ?>
        <?php endif ?>
        </div>
    </div>
</article>
