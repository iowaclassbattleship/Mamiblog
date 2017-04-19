<article class="hreview open special">
	<?php if (empty($entry)): ?>
    <div class="dhd">
        <h2 class="item title">Hoopla! no entries found.</h2>
    </div>
<?php else: ?>
    <?php foreach ($entry as $entries): ?>
            <?php if (!$entries->private): ?>
        <div class="panel panel-default">
            <div class="panel-heading"> <?= $entries->title ;?>  <p>Date: <?= $entries->date ?></p></div>
            <div class="panel-body">
                <img src="<?php echo $entries->picture ?>" alt="image" >
                <p>uploaded by: <?= $entries->creator ;?> </p>

                <?php if((Security::isAuthenticated() && Security::getUser()->email == $entries->creator) || Security::isAdmin()){ ?>
                <p>
                    <a title='delete' href='/blog/delete?id=<?=$entries->id?>'>delete</a>
                </p>
                <?php } ?>
            </div>
        </div>
                <?php endif; ?>
    <?php endforeach ?>
<?php endif ?>
</article>
