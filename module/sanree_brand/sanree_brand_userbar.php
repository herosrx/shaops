<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_brand_userbar.php sanree $
 */

if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
$bid = intval($_G['sr_bid']);
$brandresult = C::t('#sanree_brand#sanree_brand_businesses')->getbusinesses_by_bid($bid);
chkbrandend($brandresult);
$bf_menu_list = array();
$menu = sanreeloadcache('footmenu');
foreach($menu as $row) {
    $row['url'] = str_replace('{tid}',$brandresult['tid'],$row['url']);
	$row['url'] = str_replace('{bid}',$brandresult['bid'],$row['url']);
	$row['url'] = str_replace('{pid}',$brandresult['pid'],$row['url']);
	$bf_menu_list[] = $row;
}
$tid = $brandresult['tid'];
$forum_thread = C::t('#sanree_brand#forum_thread')->fetch($tid);
$brandresult['favtimes'] = intval($forum_thread['favtimes']);
$brandresult['sharetimes'] = $forum_thread['sharetimes'];

include templateEx($plugin['identifier'].':'.$template."/".$mod);
?>