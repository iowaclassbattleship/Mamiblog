<article class="hreview open special">
	<?php if (empty($entry)): ?>
    <div class="dhd">
        <h2 class="item title">Hoopla! no entries found.</h2>
    </div>
<?php else: ?>
    <?php foreach ($entry as $entries): ?>
        <div class="panel panel-default">
            <div class="panel-heading"> <?= $entries->title ;?> </div>
            <div class="panel-body">
                <img src="<?php echo $entries->picture ?>" alt="image" >
                <p>
                    <a title="Löschen" href="/blog/delete?id=<?= $entries->id ?>">Löschen</a>
                </p>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
</article>
