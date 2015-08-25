<?php

/**
 *      [Sanree] (C)2012-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_brand_updatecache.php $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
$cachearray = array('category', 'menu', 'help', 'hotbrandlist', 'newbrandlist', 'recommendlist', 'slidelist');
foreach($cachearray as $name) {
	sanreeupdatecache($name);
}	
showsubmenu($menustr);
cpmsg($langs['updatecachesucceed'], 'action=plugins&operation=config&act=base&identifier=sanree_brand&pmod=admincp', 'succeed');		
?>