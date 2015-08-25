<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: domain.php 2014-07-29 10:20:00 sanree checkedby liuhuan $
 *      
 */
if(!defined('IN_SANREE_BRAND')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
if ($_SERVER['HTTP_HOST'] == '{branddomain}') {

	$_ENV['curapp'] = 'plugin';
	$_GET = array('id'=>'sanree_brand');
	require './plugin.php';
	exit();

}
?>