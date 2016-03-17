<?php
function monthemeperso_debug($arg, $mode = 1)
{
	if($mode === 1)
	{
		print '<div><pre>'; var_dump($arg); print '</pre></div>';
	}
	else {
		print '<div><pre>'; print_r($arg); print '</pre></div>';
	}
	$trace = debug_backtrace();
	$trace = array_shift($trace);
	print 'Debug demandé dans le fichier ' . $trace['file'] . ' à la ligne ' . $trace['line'] . '<br />';
}