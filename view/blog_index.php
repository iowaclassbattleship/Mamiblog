<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">
<article class="hreview open special">
	<?php if (empty($entry)): ?>
    <div class="dhd">
        <h2 class="item title">Hoopla! no entries found.</h2>
    </div>
<?php else: ?>
    <?php foreach ($entry as $entries): ?>
            <?php if (!$entries->private): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1><?= $entries->title ;?></h1>
                        <?php if((Security::isAuthenticated() && Security::getUser()->email == $entries->creator) || Security::isAdmin()){ ?>
                            <a title='comment' href='/blog/changeTitle?id=<?=$entries->id?>'>Change title</a>
                        <?php } ?>
                        <p class="poster_date">Date: <?= $entries->date ?></p>
                    </div>
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
