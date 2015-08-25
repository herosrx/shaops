<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_brand_searchword.php sanree $
 */

if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
$_G['sr_keyword'] = C::t('#sanree_brand#sanree_brand_searchword')->getkewword_by_id(intval($_G['sr_sid']));
$mod = 'hello';
require_once sanree_libfile('module/'.$plugin['identifier'].'/'.$mod, $plugin['identifier']);
?>