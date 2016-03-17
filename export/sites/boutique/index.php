<?php
require_once("inc/init.inc.php");


require_once("inc/header.inc.php");
require_once("inc/nav.inc.php");

if(file_exists($page.".inc.php") )
	require_once($page.".inc.php");
else require_once("inc/erreur.inc.php");

if(!empty($_debug)) debug();

require_once("inc/footer.inc.php");
