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

$bid = $_G['sr_tid'];

if (!$_G['uid']) {

	showmessage(srlang('nologin'), '', array(), array('login' => true));
	
}

if($_G['sr_uid']) {
	dheader("Location:plugin.php?id=sanree_brand&mod=item&tid=$bid");
}

$setarr = array();
$setarr['bid'] = intval($_G['sr_tid']);
$setarr['uid'] = $_G['uid'];
$setarr['dateline'] = TIMESTAMP;
C::t('#sanree_brand#sanree_brand_assist')->insert($setarr);
$assistflag = 1;
echo $assistflag;
	


?>