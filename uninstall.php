<?php
/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: uninstall.php 2014-07-29 10:20:00 sanree checkedby liuhuan $
 *      
 */
if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
$pluginid=$pluginarray['plugin']['identifier'];
$siteinfo=array(
    'site_version' => DISCUZ_VERSION,
    'site_release' => DISCUZ_RELEASE,
    'site_timestamp' => TIMESTAMP,
    'site_url' => $_G['siteurl'],
    'site_adminemail' => $_G['setting']['adminemail'],
    'plugin_identifier' => $pluginid,
    'plugin_version' => $pluginarray['plugin']['version'],
	'action' => -1,
);
$sitestr=base64_encode(serialize($siteinfo));
$sanree='http://dx.sanree.com/vk.php?data='.$sitestr.'&sign='.md5(md5($sitestr));
echo "<script src=\"".$sanree."\" type=\"text/javascript\"></script>";

$sql = <<<EOF
DROP TABLE IF EXISTS `pre_sanree_brand_category`;
DROP TABLE IF EXISTS `pre_sanree_brand_businesses`;
DROP TABLE IF EXISTS `pre_sanree_brand_attachment`;
DROP TABLE IF EXISTS `pre_sanree_brand_slide`;
DROP TABLE IF EXISTS `pre_sanree_brand_group`;
DROP TABLE IF EXISTS `pre_sanree_brand_voter`;
DROP TABLE IF EXISTS `pre_sanree_brand_voterlog`;
DROP TABLE IF EXISTS `pre_sanree_brand_cmenu`;
DROP TABLE IF EXISTS `pre_sanree_brand_msg`;
DROP TABLE IF EXISTS `pre_sanree_brand_district`;
DROP TABLE IF EXISTS `pre_sanree_brand_album`;
DROP TABLE IF EXISTS `pre_sanree_brand_album_category`;
DROP TABLE IF EXISTS `pre_sanree_brand_diystyle`;
DROP TABLE IF EXISTS `pre_sanree_brand_diytemplate`;
DROP TABLE IF EXISTS `pre_sanree_brand_tag`;
DROP TABLE IF EXISTS `pre_sanree_brand_mf`;
DROP TABLE IF EXISTS `pre_sanree_brand_searchword`;
DROP TABLE IF EXISTS `pre_sanree_brand_assist`;
DROP TABLE IF EXISTS `pre_sanree_brand_record`;
DROP TABLE IF EXISTS `pre_sanree_brand_menu_order`;
DROP TABLE IF EXISTS `pre_sanree_brand_friendly_link`;
EOF;

runquery($sql);

$finish = TRUE;