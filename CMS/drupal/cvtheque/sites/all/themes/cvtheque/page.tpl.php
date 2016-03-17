<div id="conteneur">
    <div id="entete">
        <div class="logo">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
        </div>
        <div class="slogan">
            <h2><?php print $site_slogan; ?></h2>
        </div>
        <div class="connexion">
            <?php print render($page['connexion']); ?>
        </div>
    </div>
    <?php print render($page['header']); ?>
    <div id="navigation">
        <div class="section">
            <div id="main-menu" class="navigation">
                <?php
                // Appel de la fonction menuDeroulant_menu du module via la fonction theme() de drupal
                print theme("menuDeroulant_menu",$menuDeroulant_menu);
                ?>
            </div> <!-- /#main-menu -->
            <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
        </div>
    </div>
    <div id="fil-ariane">
        <?php print $breadcrumb; ?>
        <div class="breadcrumb"> :: <?php print $title; ?></div>
    </div>
    <div id="main-wrapper">
        <div id="main" class="clearfix">
            <div id="content" class="column">
                <div class="section">
                    <?php print render($page['content']); ?>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="section">
            <?php print render($page['footer']); ?>
        </div>
    </div>
</div>