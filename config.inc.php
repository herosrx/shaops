<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config.inc.php 2014-07-29 10:20:00 sanree checkedby liuhuan $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
$langs = $scriptlang['sanree_brand'];
define('APPC',DISCUZ_ROOT.'./source/plugin/'.$plugin['identifier'].'/condition/');
$modfile = APPC.'index.php';
@require_once($modfile);
$langs['module']= C::t('#sanree_brand#sanree_brand_language')->fetch_all();
$newcount = C::t('#sanree_brand#sanree_brand_businesses')->count_by_where(' AND status<>1');
$rightlink='<div style="float:right;font-size:12px;">';
$rightlink.='<a style="color:red" href="'.ADMINSCRIPT.'?action=plugins&operation=config&act=businesseslist&do=businessesaudit&identifier=sanree_brand&pmod=admincp">'.$langs['businessesnew'].'('.$newcount.')</a>';
$rightlink.='|<a href="'.ADMINSCRIPT.'?action=plugins&operation=config&act=businesseslist&do=upgrading&identifier=sanree_brand&pmod=admincp">'.$langs['addbusinesses'].'</a>';
$rightlink.='|<a href="plugin.php?id='.$plugin['identifier'].'" target="_blank">'.$langs['manage_nav_pluginshow'].'</a>';
$rightlink.='|<a href="http://dx.sanree.com/" target="_blank">'.$langs['sanree'].'</a></div>';
?>