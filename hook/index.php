<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config.inc.php sanree $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$appVer = 'X2.5';//$_G['setting']['version'];
define(SANREE_BRAND_APPHOOK, SANREE_BRAND_APPH.$appVer.'/');
$actfile = SANREE_BRAND_APPHOOK.'hook.class.php';
require_once $actfile;
?>