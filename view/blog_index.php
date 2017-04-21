<article class="hreview open special">
    <p><?= Message::get("logout")?></p>
    <link rel="stylesheet" href="/css/style.css">
	<?php if (empty($entry)): ?>
    <div class="dhd">
        <h2 class="item title">Hoopla! no entries found.</h2>
    </div>
<?php else: ?>
    <?php foreach ($entry as $entries): ?>
            <?php if (!$entries->private): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><h1><?= $entries->title ;?></h1><p class="poster_date">Date: <?= $entries->date ?></p></div>
                    <div class="panel-body">
                        <img src="<?php echo $entries->picture ?>" alt="image" >
                        <p class="poster_date">uploaded by: <?= $entries->creator ;?> </p>

                        <?php if((Security::isAuthenticated() && Security::getUser()->email == $entries->creator) || Security::isAdmin()){ ?>
                        <p>
                            <a title='delete' href='/blog/delete?id=<?=$entries->id?>'>delete</a>
                        </p>
                        <?php } ?>

                        <?php if(Security::isAuthenticated()):?>
                            <p>
                                <a title='comment' href='/comment/showComments?id=<?=$entries->id?>'>show all comments / create comment</a>
                            </p>
                        <?php else :?>
                            <p>
                                <a title='comment' href="/comment/showComments?id=<?=$entries->id?>">show all comments</a>
                            </p>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
    <?php endforeach ?>
<?php endif ?>
</article>
