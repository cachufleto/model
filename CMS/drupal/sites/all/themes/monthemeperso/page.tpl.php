		<header>
			<div class="conteneur">
				<div class="haut-gauche">
				<?php print render($page['haut-gauche']); ?>
				</div>
				<div class="haut-milieu">
				<?php print render($page['haut-milieu']); ?>
				</div>
				<div class="haut-droite">
				<?php print render($page['haut-droite']); ?>
				</div>
				<div class="clear"></div>
			</div>
		</header>
		<nav>
			<div class="conteneur">
			<?php print render($page['menu']); ?>
			<?php // var_dump($page); ?>
			<?php // print $breadcrumb; ?>
			<?php // if($is_admin) echo 'Tu es Admin !'; ?>
			</div>
		</nav>
		<section>
			<div class="conteneur">
				<div class="en-avant">
					<?php print render($page['en-avant']); ?>
					<?php print $breadcrumb; ?>
					<?php // monthemeperso_debug($base_url); ?>
					<hr />
				</div>
				<main <?php if(!render($page['aside'])) { echo 'class="pleine-largeur"'; } ?> >
				<h1><?php print $title; // le titre du contenu ?></h1>
				<?php echo $messages; // les mesages pour l'internaute ?>
				
			<?php if($tabs) : print render($tabs); endif; 
			 // les liens voir / modifier / resultat ...
			?>
				
				<?php print render($page['content']); ?>
				</main>
				<?php if(render($page['aside'])) : ?>
				<aside>
					<?php print render($page['aside']); ?>
				</aside>
				<?php endif; ?>
				<div class="clear"></div>
			</div>
		</section>
		<footer>
			<div class="conteneur">
				<div class="bas-gauche">
				<?php print render($page['bas-gauche']); ?>
				</div>
				<div class="bas-milieu">
				<?php print render($page['bas-milieu']); ?>
				</div>
				<div class="bas-droite">
				<?php print render($page['bas-droite']); ?>
				</div>
				<div class="clear"></div>
				<div class="bas-bas">
				<?php print render($page['bas-bas']); ?>
				</div>
				<div class="clear"></div>
			</div>
		</footer>