<article class="hreview open special">
    <link rel="stylesheet" href="/css/style.css">

    <div>
        <img src="/<?= $blog->picture ?>" />
    </div>
    <div>
        <h1>Comments:</h1>
    </div>
    <?php if (empty($comments)): ?>
        <div class="dhd">
            <h2 class="item title">Hoopla! no comments found.</h2>
        </div>

    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><?= $comment->user->email ?>: <?= $comment->comment ?></p>
            </div>

        <?php endforeach ?>
    <?php endif ?>
</article>
