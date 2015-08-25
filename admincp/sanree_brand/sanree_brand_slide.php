<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_brand_slide.php 2014-07-29 10:20:00 sanree checkedby liuhuan $
 */
 
if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}

if(submitcheck('submit')){
	$setarr = array();

	if($_G['sr_type'] == 3) {
		
		for($j=1;$j<6;$j++) {
			if($_FILES['pic'.$j]) {
				if (!$_FILES['pic'.$j]['error']){
					$data = array('extid' => $j);
					$setarr['pic'.$j] = upload_icon_banner($data, $_FILES['pic'.$j], 'slide');			
				}
			} else {
				$setarr['pic'.$j] = $_G['sr_pic'.$j];	
			}
			$setarr['movie'.$j.$j]=$_G['sr_movie'.$j.$j];
			$setarr['movie'.$j]=$_G['sr_movie'.$j];
				
		}
		
		$result = DB::fetch_first("SELECT * FROM ".DB::table('sanree_brand_slide').' where id=3');
		if ($result) {
			DB::update('sanree_brand_slide', $setarr,"ID=3");
		} else {
			$setarr['ID'] = $_G['sr_type'];
			DB::insert('sanree_brand_slide', $setarr);
		}
		cpmsg($langs['succeed'], "action=plugins&operation=config&act=".$act."&identifier=sanree_brand&pmod=admincp", 'succeed');
		
		return;
	}
	
	$tmpstr='';
	for($j=1;$j<6;$j++) {
		if($_FILES['pic'.$j]) {
			if ($_FILES['LinkFaceCH']['error']==0){
				$data = array('extid' => $j);
				$setarr['pic'.$j] = upload_icon_banner($data, $_FILES['pic'.$j], 'slide');			
			}
		} else {
			$setarr['pic'.$j] = $_G['sr_pic'.$j];	
		}	
		$setarr['movie'.$j]=$_G['sr_movie'.$j];
		if (!empty($setarr['pic'.$j])) {
			$picurl = fiximage($setarr['pic'.$j]);
			$link =  $setarr['movie'.$j];
			$tmp ='<track><title></title><creator></creator>';
			$tmp .='<location>'.$picurl.'</location>';
			$tmp .='<info>'.$link.'</info></track>'."\r\n";	
			$tmpstr .= $tmp;
		}		
	}
	$type =  intval($_G['sr_type']);
	!in_array($type, array(1, 2)) && $type = 1;
	$result = DB::fetch_first("SELECT * FROM ".DB::table('sanree_brand_slide'));
	if ($result) {
		DB::update('sanree_brand_slide', $setarr,"ID=".$type);
	} else {
	    $setarr['ID'] = $type;
		DB::insert('sanree_brand_slide', $setarr);
	}
$xml = '<<<EOF
<?xml version="1.0" encoding="utf-8"?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
<trackList>
$tmpstr
</trackList>
</playlist>
EOF';
	if ($type==1) {
		writexml($xml);
	}
	sanreeupdatecache('slidelist');	
	cpmsg($langs['succeed'], "action=plugins&operation=config&act=".$act."&identifier=sanree_brand&pmod=admincp&type=".$type, 'succeed');
}
else {

	if($config['isbird']) {
   	
		$result = DB::fetch_first("SELECT * FROM ".DB::table('sanree_brand_slide').' where id=3');
		showsubmenu($menustr);
		showformheader($thisurl.'&type=3', 'enctype');
		showtableheader($langs['slide'], 'nobottom');
		for($j=1; $j<6; $j++) {
		
			$grouplogohtml ='';
			$pic ='';
			if($result['pic'.$j]) {
			
				$pic = $result['pic'.$j];
				$grouplogohtml = '<label>'.$langs['newslideimgtip'].'<br /><img src="'.fiximage($pic).'?'.random(6).'" width="400" height="100" />';
				
			}else {
				$grouplogohtml = $langs['newslideimgtip'];
			}
			showsetting($langs['slide_img'].$j, 'pic'.$j, $pic, 'filetext', '', 0,$grouplogohtml);
			showsetting($langs['bird_slide_link'].$j, 'movie'.$j, $result['movie'.$j], 'text');
			
		}
		showsubmit('submit');
		showtablefooter();
		showformfooter();	
    	return;
	}
	
	$type =  intval($_G['sr_type']);
	!in_array($type, array(1, 2)) && $type = 1;	
	$result = DB::fetch_first("SELECT * FROM ".DB::table('sanree_brand_slide').' where id='.$type);
	showsubmenu($menustr);
	showtableheader('', 'nobottom');
	$typeclass= array(1,2);
	showtablerow('', array(), array(shownavmenu($type, $typeclass, $langs)));
	showtablefooter();
	showformheader($thisurl.'&type='.$type, 'enctype');
	showtableheader($langs['slide'], 'nobottom');
	for($j=1; $j<6; $j++) {
	
	    $grouplogohtml ='';
		$pic ='';
		if($result['pic'.$j]) {
		
		    $pic = $result['pic'.$j];
		    $grouplogohtml = '<label>'.$langs['slideimgtip'].'<br /><img src="'.fiximage($pic).'?'.random(6).'" width="400" height="100" />';
			
		}
		showsetting($langs['slide_img'].$j, 'pic'.$j, $pic, 'filetext', '', 0,$grouplogohtml);
		showsetting($langs['slide_link'].$j, 'movie'.$j, $result['movie'.$j], 'text');
		
	}
	showsubmit('submit');
	showtablefooter();
	showformfooter();			
}

function shownavmenu($type, $typeclass, $langs) {

	$result ='<ul class="tab1">';
	$typelist = array();
	$typelist[$type] = ' class="current"';
    foreach($typeclass as $key => $value) {
		
		$result .='<li'.$typelist[$value].'><a href="'.ADMINSCRIPT.'?action=plugins&operation=config&act=slide&identifier=sanree_brand&pmod=admincp&type='.$value.'"><span>'.$langs['slide'.$value].'</span></a></li>';
		
	}
	$result.= '</ul>';
	return $result;
	
}
?>