<article class="hreview open special">
	<?php if (empty($users)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine User gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($users as $user): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $user->firstName;?> <?= $user->lastName;?></div>
				<div class="panel-body">
					<p class="description">In der Datenbank existiert ein User mit dem Namen <?= $user->firstName;?> <?= $user->lastName;?>. Dieser hat die EMail-Adresse: <a href="mailto:<?= $user->email;?>"><?= $user->email;?></a></p>
					<?php if(Security::isAdmin()): ?>
                    <p><a title="delete_user" href="/user/delete?id=<?= $user->id ?>">delete User</a></p>
                    <?php endif ?>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</article>
