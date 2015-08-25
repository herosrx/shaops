<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_attention_addattention.php sanree checkedby.liuhuan.2014-04-18 $
 */

if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}

$valid= $_G['sr_valid'];
$valid_result = C::t('#sanree_brand#sanree_brand_group')->get_by_order(intval($valid));
if($_G['sr_flag'] == $valid_result['groupid']) {
	$valid_result = 0;
}
if($valid_result) {
	$maxorder = C::t('#sanree_brand#sanree_brand_group')->get_by_maxorder();
	echo ++$maxorder['order'];
}else {
	echo '';
}



?>