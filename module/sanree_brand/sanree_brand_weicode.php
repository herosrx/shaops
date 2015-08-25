<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_brand_show2code.php sanree $
 */
if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
session_start();
$bid = intval($_G['sr_tid']);
$brandresult = C::t('#sanree_brand#sanree_brand_businesses')->getbusinesses_by_bid($bid);
$gotourl = '';
if (!$brandresult) {

	showmessage(srlang('nodengji'));
	
}
$backgroundimage = empty($brandresult['weixinimg']) ? $defaultwxcodeimg : $_G['setting']['attachurl'].'category/'.$brandresult['weixinimg'].'?'.random(6);				
$weixintitle = str_replace('{name}', $brandresult['name'], srlang('weixintitle'));
$_G['style']['tplfile'] = $template = templateEx($plugin['identifier'].':'.$template.'/weicode');
include $template;

?>