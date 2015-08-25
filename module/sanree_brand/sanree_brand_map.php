<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_brand_map.php 2014-07-29 10:20:00 sanree checkedby liuhuan $
 */

if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}

$do = $_G['sr_do'];
$doarray = array( 'show', 'marked');
$do = !in_array($do, $doarray) ? 'show' : $do;

if ($mapapi=='google') {
	$defaultmappos = $googlemappos;
}
	
if ($do=='show') {
	$bid = intval($_G['sr_bid']);
	$brandresult = C::t('#sanree_brand#sanree_brand_businesses')->getbusinesses_by_bid($bid);
	$lng = '';
	$lat = '';
	if ($mapapi=='google') {
		$brandresult['mappos'] = $brandresult['googlemappos'];
	}	
	if ($brandresult['mappos']) {
		$info = $brandresult[name];
		list($lng , $lat) = explode(',',$brandresult['mappos']);
	} else {
		$info = srlang('nomarked');
		list($lng , $lat) = explode(',',$defaultmappos);
	}
}
elseif ($do == 'marked') {
	if (empty($_G['sr_mappoint'])){
		list($lng , $lat) = explode(',',$defaultmappos);
	} else {
		list($lng , $lat) = explode(',',$_G['sr_mappoint']);
	}
	
}
$starlist = array(1,2,3,4,5);
include templateEx($plugin['identifier'].':'.$template."/".$mod.'_'.$mapapi);
?>