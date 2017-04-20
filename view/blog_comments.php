<article class="hreview open special">
    <link rel="stylesheet" href="/css/style.css">
    <div class="panel panel-default">


    <div>
        <img src="/<?= $blog->picture ?>" />
    </div>
    <?php if(Security::isAuthenticated()):?>
        <div class="panel-heading">

            <h1>write a comment was oh immer</h1>
        </div>

        <div class="panel-body">
            <form action="/comment/doCreate?blogid=<?= $blog->id ?>" method="post" >
                <div class="component" data-html="true">
                    <div class="form-group">
                        <div class="col-md-8">
                            <textarea name="commentarea" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label" for="send">&nbsp;</label>
                        <div class="col-md-1">
                            <input id="send" name="send" type="submit" class="btn btn-primary">
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
                    <p>
                        <?= $comment->time ?> <?= $comment->user->email ?>: <?= $comment->comment ?>
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
