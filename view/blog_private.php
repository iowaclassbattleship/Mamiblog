<article class="hreview open special">
    <link rel="stylesheet" href="/css/style.css">
	<?php if (empty($entry)): ?>
    <div class="dhd">
        <h2 class="item title">Hoopla! no entries found.</h2>
    </div>
<?php else: ?>
    <?php foreach ($entry as $entries): ?>
            <?php if(Security::isAuthenticated() && Security::getUser()->email == $entries->creator) : ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1><?= $entries->title ;?></h1>
                    <?php if((Security::isAuthenticated() && Security::getUser()->email == $entries->creator) || Security::isAdmin()){ ?>
                        <a title='comment' href='/blog/changeTitle?id=<?=$entries->id?>'>Change title</a>
                    <?php } ?>
                    <p class="poster_date">Date: <?= $entries->date ?></p>
                </div>
                <div class="panel-body">
                    <img src="../<?php echo $entries->picture ?>" alt="image" >
                    <p class="poster_date">uploaded by: <?= $entries->creator ;?> </p>
                        <p>
                            <a title='delete' href='/blog/delete?id=<?=$entries->id?>'>delete</a>
                        </p>

                </div>
            </div>
            <?php endif; ?>
    <?php endforeach ?>
    <?php endif ?>
</article>
