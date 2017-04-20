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
					<p class="description">Username: <?= $user->firstName;?> <?= $user->lastName;?>. <br/>E-Mail: <a href="mailto:<?= $user->email;?>"><?= $user->email;?></a></p>
					<?php if(Security::isAdmin()&& $user->email != "admin.mamiblog@gmail.com"): ?>
                    <p><a title="delete_user" href="/user/delete?id=<?= $user->id ?>">delete User</a></p>
                    <?php endif ?>
				</div>
			</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script language="javascript" type="text/javascript" src="/js/javascript_validation.js"></script>
    <?php endforeach ?>
	<?php endif ?>
</article>
