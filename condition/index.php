<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config.inc.php sanree $
 */

!defined('IN_DISCUZ') && exit('Access Denied');
$appVer = $_G['setting']['version'];
define('APPCLASS',APPC.$appVer.'/');
$actfile = APPCLASS.'base.php';
require_once $actfile;
?>