<?php

/**
 *      [Sanree] (C)2012-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: hook.class.php 2014-07-29 10:20:00 sanree checkedby liuhuan $
 */

if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
define('APPP_BRAND','sanree_brand');
define('APPC',DISCUZ_ROOT.'./source/plugin/'.APPP_BRAND.'/condition/');
define('SANREE_BRAND_APPH',DISCUZ_ROOT.'./source/plugin/'.APPP_BRAND.'/hook/');
$modfile = APPC.'index.php';
@require_once($modfile);
$modfile = SANREE_BRAND_APPH.'index.php';
@require_once($modfile);
?>