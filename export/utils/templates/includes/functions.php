<?php

function page_header($page_title='', $subtitle='', $page_code='HOME')
{
	global $template, $config;
	
	$template->assign_vars(array(
		'S_USER_LANG'	=> 'fr',
		'S_CONTENT_ENCODING'	=> 'iso-8859-15',
		'SITENAME'	=> 'monsiteweb.fr',
		'PAGE_TITLE'	=> htmlentities($page_title),
		'PAGE_SUBTITLE'	=> htmlentities($subtitle),
		'MENU_LIST'	=> isset($config['MENU']) ? true : false));
	
	// ajout des liens de toutes les feuilles de style
	if(isset($config['CSS']) && is_array($config['CSS']))
	{
		foreach($config['CSS'] as $value)
			$template->assign_block_vars('addstyle', array(
				'HEAD_STYLESHEET' => $value));
	}
	
	if(isset($config['MENU']))
	{
		foreach($config['MENU'] as $key => $value)
		{
			$template->assign_block_vars('menuloop', array(
				'CURRENT'	=> ($key == $page_code),
				'TEXT'	=> htmlentities($value['TEXT']),
				'INFO'	=> htmlentities($value['INFO']),
				'U_HREF'	=> $value['HREF']));
		}
	}
		
	header('Content-type: text/html; charset=iso-8859-15');
	header('Cache-Control: private, no-cache="set-cookie"');
	header('Expires: 0');
	header('Pragma: no-cache');
}

function page_footer()
{
	global $template;
	
	$template->assign_var('C_DATE', date("d/m/Y"));
}