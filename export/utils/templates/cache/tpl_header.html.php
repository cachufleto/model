<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" xml:lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-language" content="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?> - <?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?></title>
<?php $_addstyle_count = (isset($this->_tpldata['addstyle'])) ? sizeof($this->_tpldata['addstyle']) : 0;if ($_addstyle_count) {for ($_addstyle_i = 0; $_addstyle_i < $_addstyle_count; ++$_addstyle_i){$_addstyle_val = &$this->_tpldata['addstyle'][$_addstyle_i]; ?>
<link rel="stylesheet" href="<?php echo $_addstyle_val['HEAD_STYLESHEET']; ?>" media="all" type="text/css" />
<?php }} ?>
</head>
<body>
<div id="header">
	<h1><?php echo ((isset($this->_rootref['L_LOGO'])) ? $this->_rootref['L_LOGO'] : ((isset($this->lang['LOGO'])) ? $this->lang['LOGO'] : '{ LOGO }')); ?></h1>
</div>
<div id="leftmenu">
<?php if ($this->_rootref['MENU_LIST']) {  ?>
<ul>
<?php $_menuloop_count = (isset($this->_tpldata['menuloop'])) ? sizeof($this->_tpldata['menuloop']) : 0;if ($_menuloop_count) {for ($_menuloop_i = 0; $_menuloop_i < $_menuloop_count; ++$_menuloop_i){$_menuloop_val = &$this->_tpldata['menuloop'][$_menuloop_i]; ?>
	<li><?php if ($_menuloop_val['CURRENT']) {  echo $_menuloop_val['TEXT']; } else { ?><a href="<?php echo $_menuloop_val['U_HREF']; ?>" title="<?php echo $_menuloop_val['INFO']; ?>"><?php echo $_menuloop_val['TEXT']; ?></a><?php } ?></li>
<?php }} ?>
</ul>
<?php } ?>
</div>
<div id="content">
	<h2><?php echo (isset($this->_rootref['PAGE_SUBTITLE'])) ? $this->_rootref['PAGE_SUBTITLE'] : ''; ?></h2>