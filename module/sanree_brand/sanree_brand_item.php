<?php

/**
 *      [Sanree] (C)2001-2099 Sanree Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: sanree_brand_item.php 2014-07-29 10:20:00 sanree checkedby liuhuan $
 */
if(!defined('IN_DISCUZ')) {
	exit('2014042523s4K4QUOUT9||5057||1411992002');
}
$copyrightshow = ($copyrightpass=='dx.sanree.com') ? 0 : 1;
$bid = intval($_G['sr_tid']);
$brandresult = C::t('#sanree_brand#sanree_brand_businesses')->getbusinesses_by_bid($bid);
if (!$brandresult) {

	showmessage(srlang('nodengji'));
	
}
chkbrandend($brandresult);
if (getgroupurlmode($brandresult['groupid'])!=1) {

	showmessage(srlang('nodengji'));
	
}

if($_G['sr_share']) {
	
	if (!$_G['uid']) {

		showmessage(srlang('nologin'), '', array(), array('login' => true));
	
	}
	
	$setarr = array();
	$setarr['uid'] = $_G['uid'];
	$setarr['bid'] = $bid;
	$setarr['username'] = $_G['username'];
	$setarr['upic'] = avatar($_G['uid'],'middle',1);
	$setarr['bpic'] = $_G['setting']['attachurl'].'category/'.$brandresult['poster'];
	$setarr['content'] = $_G['sr_share_value'];
	$setarr['dateline'] = TIMESTAMP;
	$setarr['status'] = 1;
	
	C::t('#sanree_brand#sanree_brand_share_business')->insert($setarr);
	
	showmessage(srlang('succeed'), getburl($brandresult), array(), $extra);
}

$brandresult['name'] = str_replace("\'", "&#39;", $brandresult['name']);
$navigation = '<em>&raquo;</em>'.$brandresult['name'];
$navtitle = $brandresult['name'].' - '.$config['title'];
$brandresult['keywords'] && $metakeywords = $brandresult['keywords'];
$brandresult['description'] && $metadescription = $brandresult['description'];
$tid = $brandresult['tid'];
$forum_thread = C::t('#sanree_brand#forum_thread')->fetch($tid);
$brandresult['favtimes'] = $forum_thread['favtimes'];
C::t('#sanree_brand#forum_thread')->update($tid, array('views' => intval($forum_thread['views']) + 1));
C::t('#sanree_brand#sanree_brand_businesses')->update($bid, array('views' => intval($brandresult['views']) + 1));
$voter = C::t('#sanree_brand#sanree_brand_voter')->getvotetotal_by_tid($tid);
require_once libfile('function/discuzcode');
$brandresult['discount'] = $config['selectdiscountshow'][intval($brandresult['discount'])];
$brandresult['url'] = getburl($brandresult);
$brandresult['banner'] = srfiximages($brandresult['banner'], 'common', '/banner.jpg');
$brandresult['poster'] = newtheme($brandresult['poster'], 'category', '/none.gif');
$brandresult['address'] = empty($brandresult['address']) ? srlang('zanwustr') : $brandresult['address'];
$brandresult['recommendationindex'] = empty($brandresult['recommendationindex']) ? '99.9' : $brandresult['recommendationindex'];
$brandresult['satisfaction'] = intval($voter[3]);
$brandresult['satisfactionwidth'] = intval($brandresult['satisfaction'] /100 * 91);
$brandresult['groupimg'] = getgroupimg($brandresult['groupid']);
$brandresult['propaganda'] = discuzcode($brandresult['propaganda'], 0, 0);
$brandresult['introduction'] = discuzcode($brandresult['introduction'], 0, 0);
$brandresult['contact'] = discuzcode($brandresult['contact'], 0, 0);
$brandresult['propaganda'] = str_replace('&amp;', '&',$brandresult['propaganda']);
$brandresult['introduction'] = str_replace('&amp;', '&',$brandresult['introduction']);
$brandresult['contact'] = str_replace('&amp;', '&',$brandresult['contact']);
$brandresult['albumurl'] = getalbumurl($brandresult['bid']);
$brandresult['abrandno'] = empty($brandresult['brandno']) ? '' : '<a href="'.getbrandnourl($brandresult['brandno']).'">'.$brandresult['brandno'].'</a>';
$brandresult['sqq'] = $brandresult['qq'];
$brandresult['stel'] = $brandresult['tel'];
if ($ismultiple==1&&$brandresult['allowmultiple']==1) {
    $brandresult['sicq'] = $brandresult[$icq];
	$brandresult['icq'] = getallicq($brandresult[$icq]);
	if(!$config['isbird']) {
		$tellist = explode(',', $brandresult['tel']);
	}
	$brandresult['tel'] = getfirsticq($brandresult['tel']);
	
} else {
	$brandresult['qq'] = empty($brandresult['qq']) ? srlang('zanwustr') : str_replace('{icqnumber}', getfirsticq($brandresult['qq']), $icqshow);
	if(!$config['isbird']) {
		$brandresult['tel'] = getfirsticq($brandresult['tel']);
	}
}
$tel114id = intval($brandresult['tel114id']);
if (($tel114id >0)&&($tel114version >=1121)) {

	$url = $tel114_is_rewrite ? 'tel114-view-'.$tel114id.'.html' : 'plugin.php?id=sanree_tel114&mod=view&tid='.$tel114id;
	$brandresult['tel114url'] = '<a href="'.$url.'" onclick="showWindow(\'showtelkey\', this.href)"><img height=18 width=18 align="absmiddle" src="'.sr_brand_IMG.'/tel114.png" /></a>';
	
}

if(!$config['isbird']) {
	
	require_once libfile('class/'.$plugin['identifier'].'_menu','plugin/'.$plugin['identifier']);
	$menuclass = new sanree_brand_menu($plugin['identifier']);
	$menuclass->getmenu($brandresult, 'index');
	$brand_header = $menuclass->_brand_header;
	$brand_header_one = $menuclass->_brand_header_one;
	
	$mtfopen = $_G['cache']['plugin']['sanree_mcertification']['isopen'];
	if($mtfopen) {
		$mcertification = C::t('#sanree_mcertification#sanree_mcertification')->gettype_by_bid(intval($bid));
		$mtf = 'source/plugin/sanree_mcertification/tpl/default/mcertification/brandimg/bignone.png';
		if($mcertification) {
			$mtf = $mcertification['type'] ? 'source/plugin/sanree_mcertification/tpl/default/mcertification/brandimg/bigpersonal.png' : 'source/plugin/sanree_mcertification/tpl/default/mcertification/brandimg/bigcompany.png';
		}
	}
	
	$attention = $_G['cache']['plugin']['sanree_attention']['isopen'];
	if($attention) {
		$addbtn = 'source/plugin/sanree_attention/tpl/default/img/addbtn.png';
		$delbtn = 'source/plugin/sanree_attention/tpl/default/img/delbtn.png';
		$uids = C::t('#sanree_attention#sanree_attention')->getuid_by_bid(intval($bid));
		$atnbtn = $addbtn;
		$flag = 0;
		$atnurl = 'plugin.php?id=sanree_attention&mod=addattention&bid='.intval($bid);
		if($uids) {
			foreach($uids as $uid) {
				if($uid['uid'] == $_G['uid']) {
					$atnbtn = $delbtn;
					$flag = 1;
					$atnurl = 'plugin.php?id=sanree_attention&mod=delattention&bid='.intval($bid);
					$deltip = attention_modlang('confirmationdel');
					break;
				}
			}
		}
	}
	
	$assistcount = C::t('#sanree_brand#sanree_brand_assist')->count_by_where(' && bid ='.intval($bid));
	$assistuids = C::t('#sanree_brand#sanree_brand_assist')->getuid_by_bid(intval($bid));
	if($assistuids) {
		foreach($assistuids as $uid) {
			if($uid['uid'] == $_G['uid']) {
	
				$assistflag = 1;
				break;
				
			}
		}
	}
	
} else {
	
	if($_G['item_detail'] == 'item') {
		
		if($album_list) {
			$ri = 0;
			for($itc=0; $itc<4; $itc++) {
				$wanted = 'static/image/common/nophoto.gif';
				$albumcatelist[$itc] = array('name'=> srlang('no_pic'), 'pic' => $wanted, 'url' => $adminadurl);
			}
			
			$where =array();
			$where[] = 'uid='.$brandresult['uid'];
			$where[] = 'bid='.$bid;
			include_once libfile('function/home');
			$picshowtipformat = srlang('picshowtip');
			foreach(C::t('#sanree_brand#sanree_brand_album_category')->fetch_all_by_searchd($where, 'displayorder,dateline DESC') as $data) {
			
				if ($isalbumthumb==1) {
					$data['pic'] = sr_albumimage($data['pic'], 120, 120);
				} else {
					$data['pic'] = empty($data['pic']) ? 'static/image/common/nophoto.gif' : pic_cover_get($data['pic'], 1);
				}
				$data['url'] = getalbumitemurl($data[catid]);
				$wherealbumsub = array();
				$wherealbumsub[] = 'catid = '.$data[catid];		
				$data['num'] = C::t('#sanree_brand#sanree_brand_album')->count_by_wherec($wherealbumsub);
				$data['picshowtip'] = str_replace("{picnum}",$data['num'],$picshowtipformat);
				$albumcatelist[$ri] = $data;
				$ri++;
			}
		}
		
		$brandresult[albumurl] = getalbumurl($brandresult[bid]);
		$where =array();
		$where[] = 'uid='.$brandresult['uid'];
		$where[] = 'bid='.$bid;
		$albumcat =  C::t('#sanree_brand#sanree_brand_album_category')->fetch_all_by_searchd($where, 'displayorder,dateline DESC');
		$bids = array();
		foreach($albumcat as $data) {
		
			$bids[] = $data[catid];
			
		}
		$maxpic = $maxishomepic;
		$albumlist = array();
		for($i = 0; $i < $maxpic; $i++) {
		
			$albumlist[$i]['pic'] = 'source/plugin/sanree_brand/tpl/good/images/nophoto.gif';
			$albumlist[$i]['thumbpic'] = 'source/plugin/sanree_brand/tpl/good/images/nophoto.gif';
			$albumlist[$i]['albumname'] = srlang('no_pic');
			
		}
		$aids="''";
		
		if ($bids) {
		
			$where = "AND catid in(".implode($bids,",").") AND ishome=1";
			$albumdata =  C::t('#sanree_brand#sanree_brand_album')->fetch_all_by_searchex($where, 'ishome desc,displayorder,albumid desc', 0, $maxpic);
			include_once libfile('function/home');
			$aids='[';
			$tmparray=array();	
			foreach($albumdata as $key => $album) {
			
				$album['thumbpic'] = ($isalbumthumb==1) ? sr_albumimage($album['pic'], 165, 165) : pic_cover_get($album['pic'], 1);	
				$album['pic'] = pic_cover_get($album['pic'], 1);
				$albumlist[$key] = $album;
				$tmparray []= "'$album[albumid]'";
				
			}
			$aids .=implode($tmparray,",");
			$aids .=']';	
			
		}
		$perpage 	= 15;
		$page 		= isset($_G['sr_page']) ? intval($_G['sr_page']) : 1;
		$page 		= max(1, intval($page));
		$start 		= ($page - 1) * $perpage;
		$start 		= max(0, $start);
		
		$where = array();
		$where[] = 't.bid='.$bid;
		$where[] = 'c.status=1';
		$where[] = 't.status=1';
		$where[] = 't.isshow=1';
		$coupon_config = $_G['cache']['plugin']['sanree_brand_coupon'];
		if ($coupon_config['isopen']) {
		
			$count = C::t('#sanree_brand_coupon#sanree_brand_coupon')->count_by_wherec($where);
			if ($count>0) {
				
				$couponlist= array();
				foreach(C::t('#sanree_brand_coupon#sanree_brand_coupon')->fetch_all_by_searchc($where, 'displayorder,bid desc', ($page - 1) * $perpage, $perpage) as $key => $coupon) {
				
					$coupon['pic'] = (intval($coupon['homeaid'])>0) ? coupon_getforumimg($coupon['homeaid'], 130, 130) : 'static/image/common/nophoto.gif';
					$coupon['url'] = coupon_getburl($coupon);
					$couponlist[$key] = $coupon;
					
				}
			
				$murl= coupon_getusermodeurl( array('bid' =>$bid));
				$multi_coupon = multi ( $count, $perpage, $page, $murl);
				
			}
		}
		$goods_config = $_G['cache']['plugin']['sanree_brand_goods'];
		if ($goods_config['isopen']) {
			$count = C::t('#sanree_brand_goods#sanree_brand_goods')->count_by_wherec($where);
			if ($count>0) {
				
				$goodslist= array();
				foreach(C::t('#sanree_brand_goods#sanree_brand_goods')->fetch_all_by_searchc($where, 'displayorder,bid desc', ($page - 1) * $perpage, $perpage) as $key => $goods) {
				
					$goods['pic'] = goods_getforumimg($goods['homeaid'], 1 , 130, 130, 'fixnone');
					$goods['url'] = goods_getburl($goods);
					$goodslist[$key] = $goods;
					
				}
			
				$murl= goods_getusermodeurl( array('bid' =>$bid));
				$multi_goods = multi ( $count, $perpage, $page, $murl);
				
			}
		}
		
		$_G['cache']['plugin']['sanree_brand_coupon']['isopen'] && $iscoupon = C::t('#sanree_brand#sanree_brand_businesses_module')->fetch_by_modename('iscoupon', $bid);
		$_G['cache']['plugin']['sanree_brand_goods']['isopen'] && $isgoods = C::t('#sanree_brand#sanree_brand_businesses_module')->fetch_by_modename('isgoods', $bid);

	}
	
}

$favoritelist = C::t('#sanree_brand#home_favorite')->fetch_all_by_id_idtype($tid, 'tid', 0, 9);
$newlist = array();
foreach(C::t('#sanree_brand#sanree_brand_businesses')->fetch_all_by_searchc(array('c.status=1', 't.status=1', 't.isshow=1'), 't.bid desc', 0, 9) as $value) {

    $value['url'] = getburl($value);
	$newlist[] = $value;
	
}
$recommendlist=array();
foreach(C::t('#sanree_brand#sanree_brand_businesses')->fetch_all_by_searchc(array('c.status=1', 't.isrecommend=1', 't.status=1'), 't.istop desc,t.displayorder, t.dateline desc', 0, $Recommendnum) as $value) {

    $value['recommendimg'] = srfiximages($value['recommendimg'], 'common', '/none1.gif');
	if ($reurlmode==1) {
	
		$url = empty($value['weburl']) || $value['weburl']=='http://' ? getburl($value): $value['weburl'];
		
	} else {
	
		$url = getburl($value);
		
	}
	$value['forum_thread'] = C::t('#sanree_brand#forum_thread')->fetch($value['tid']);
	$recommendlist[]= array('views' => $value['forum_thread']['views'],'name'=> $value['name'], 'img' => '<img src="'.$value['recommendimg'].'" alt="'.$value['name'].'" />', 'url' =>$url);
	
}
$pbidlist = array();
foreach(C::t('#sanree_brand#sanree_brand_businesses')->fetch_all_by_searchc(array('c.status=1', 't.pbid='.$bid, 't.status=1'), 't.istop desc,t.displayorder, t.dateline desc', 0, 100) as $value) {
	$url = getburl($value);
	$pbidlist[] = array('name' => $value['name'],'url' => $url);
}
$mflist = array();
$mfliststr = srlang('zanwustr');
if ($brandresult['brandmf']) {
	foreach(C::t('#sanree_brand#sanree_brand_mf')->fetch_all_by_searchc(array(' mfid IN ('.$brandresult['brandmf'].')'),'displayorder') as $data) {
	
		$mflist[] = $data['mfname'];
		
	}
	$mfliststr = implode($mflist,'&nbsp;&nbsp;&nbsp;&nbsp;');
}
$tagdata = array();
if ($brandresult['brandtag']) {
	$taglist = explode(',', $brandresult['brandtag']);
	foreach($taglist as $tag) {
		 $tagid = C::t('#sanree_brand#sanree_brand_tag')->gettagid_by_tagname($tag);
		 if ($tagid>0) {
		     $url = gettagurl($tagid);
			 $tagdata[] = array('url' => $url, 'tagname' => $tag);
		 }
	}
}

$_G['style']['tplfile'] = $template = templateEx($plugin['identifier'].':'.$template.'/item');

include $template;
?>