<?php (!defined('IN_SANREE')&&exit('Power By sanree.com'))?>
<!--{eval $_G['disabledwidthauto']=TRUE;}-->
<!--{if ($ishideheader==1) }-->
<!--{subtemplate common/header_common}-->
{$brand_header_one}
<!--{ad/headerbanner/wp a_h}-->
<!--{hook/global_header}-->
<div id="wp" class="wp">
<!--{else}-->
{subtemplate common/header}
<!--{/if}-->
<link rel="stylesheet" type="text/css" href="{SANREE_BRAND_TEMPLATE}/sanree_brand.css?{VERHASH}" />
<link rel="stylesheet" type="text/css" href="{SANREE_BRAND_TEMPLATE}/userbar.css?{VERHASH}" />
<link rel="stylesheet" type="text/css" href="{SANREE_BRAND_TEMPLATE}/header.css?{VERHASH}" />
<link rel="stylesheet" type="text/css" href="{SANREE_BRAND_TEMPLATE}/albumlist.css?{VERHASH}" />
<script src="{sr_brand_JS}/sanree_brand.js"></script>
<script language="javascript">var stid=0;</script>	
<div class="sanree_brand_itembody" id="brandbody">
  <!--{hook/sanree_brand_usertoper}-->
  <div id="pt" class="bm cl">
    <div class="z"> <a href="./" class="nvhm" title="{lang homepage}">$_G[setting][bbname]</a><em>&raquo;</em><a href="{$allurl}">{$maintitle}</a>$navigation </div>
  </div>
  {$brand_header}
  <!--{hook/sanree_brand_userheader}-->
    <div class="albumlist">
	  <div class="albumleft">
	    <!--{hook/sanree_brand_userlefttop}-->
	    <div class="albumcate">
		   <div class="ahd">
		   <div class="ubar">
			   <!--{if defined('IN_BRAND_USER')}--><a href="plugin.php?id=sanree_brand&amp;mod=ajax&amp;do=creatalbum&amp;bid={$brandresult[bid]}" onclick="showWindow('creatalbumdlg', this.href, 'get', 1)" class="y creatalbum"></a><!--{/if}-->
			   <span id="atarget" {if $_G['cookie']['atarget'] > 0}onclick="setatarget(-1)" class="y atarget_1"{else}onclick="setatarget(1)" class="y"{/if} title="{lang sanree_brand:new_windowtip}">{lang sanree_brand:new_window}</span>		   
		   </div>
		   <h1><a href="{$brandresult[url]}">{$brandresult[name]}</a> <span>&gt; </span>{lang sanree_brand:myalbum}</h1></div>
		   <div class="abd">
		         <!--{if $albumcatelist}-->
					 <ul class="albumcatedata">
					 <!--{loop $albumcatelist $album}-->
					 <li> 
					   <div class="albumshow">
						  <div class="albumimg"><a href="{$album[url]}" onclick="atarget(this)"><img src="{$album[pic]}" /></a></div>
						  <div class="albuminfo">
							 <div class="hd"><h1><a href="{$album[url]}" onclick="atarget(this)">{$album[catname]}</a></h1></div>
							 <div class="bd">
								{$album[description]}
							 </div>
							 <div class="fd">
								<img src="{sr_brand_IMG}/p.jpg" align="absmiddle" /> <span>{$album[picshowtip]}</span>
							 </div>
						  </div>
					   </div>
					   <!--{if defined('IN_BRAND_USER')}-->
					   <div class="albummanage">
						   <a href="plugin.php?id=sanree_brand&mod=ajax&do=deletealbum&bid={$brandresult[bid]}&catid={$album[catid]}&inajax=yes&infloat=yes" onclick="if (confirm('{lang sanree_brand:confirmationdel}')){showWindow('deletealbumdlg', this.href, 'get', 1)} return false;">{lang sanree_brand:delete}</a>&nbsp;
						   <a href="plugin.php?id=sanree_brand&mod=ajax&do=creatalbum&bid={$brandresult[bid]}&catid={$album[catid]}&inajax=yes&infloat=yes"  onclick="showWindow('creatalbumdlg', this.href, 'get', 1)">{lang sanree_brand:edit}</a>
					   </div>
					   <!--{/if}-->					  
					 </li>
					 <!--{/loop}-->
					 </ul>	
					 <div class="pager">{$multi}</div>
				 <!--{else}-->
				 <div class="zanwu">{lang sanree_brand:noalbum}</div>
				 <!--{/if}-->
		   </div>
		</div> 
		<!--{hook/sanree_brand_userleftbottom}-->	  
	  </div>
	  <!-- /albumleft -->
	  
	  <div class="albumright">
	      
		  <!--{if defined('IN_BRAND_USER')}-->
			  <div class="clickmanage">
				  <a href="javascript:void(0)" onclick="showmanage(1)"></a>
			  </div>
			  <!-- /clickmanage -->
		  <!--{/if}--> 
		  <!--{hook/sanree_brand_userrighttop}--> 
	     <div class="baseinfo<!--{if defined('IN_BRAND_USER')}--> srmtop10<!--{/if}-->">
		    <div class="hd"></div>
			<div class="bd">
			   <ul>
			      <li class="oqq">
				  <!--{if $ismultiple==1&&$brandresult[allowmultiple]==1}-->
				  {lang sanree_brand:oqq}{$brandresult[icq]}
				  <!--{else}-->
				  {lang sanree_brand:oqq}{$brandresult[qq]}
				  <!--{/if}-->	
				  </li>
				  <li class="olevel">{lang sanree_brand:olevel}<img align="absbottom" src="{$brandresult[groupimg]}" /></li>
				  <li class="odiscount">{lang sanree_brand:odiscount}{$brandresult['discount']}</li>
				  <li class="otelphone">{lang sanree_brand:otelphone}{$brandresult[tel]}</li>
				  <li class="oaddress">{lang sanree_brand:oaddress}{$brandresult[address]}</li>
			   </ul>
			</div>
		 </div>
		 <!-- /baseinfo -->
		 
		 <div class="brandnews">
		     <div class="hd"></div>
			 <div class="bd">
			 <ul>
			 <!--{loop $newlist $value}-->
				 <li><a href="{$value[url]}" target="_blank">{$value[name]}</a></li>
			 <!--{/loop}-->
			 </ul>
			 </div>
		 </div>
		 <!-- /brandnews -->
		 
		 <div class="brandfavorite">
		     <div class="hd"><div class="favoritebtn"><a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$brandresult[tid]" id="k_favorite" onclick="stid={$brandresult[tid]};showWindow(this.id, this.href, 'get', 0);"></a></div></div>
			 <div class="bd">{lang sanree_brand:fav}<span>{$brandresult[favtimes]}</span></div>
			 <div class="fd">
			    <ul>
				<!--{loop $favoritelist $value}-->
				<li>
				  <div class="avt"><a href="home.php?mod=space&uid=$value[uid]" target="_blank"><!--{avatar($value[uid],small)}--></a></div>
				  <div class="avname"> <a href="home.php?mod=space&uid=$value[uid]" target="_blank">$value[username]</a></div>
				</li>
			    <!--{/loop}-->
				</ul>
			 </div>
		 </div>
		 <!-- /brandfavorite -->
		 <!--{hook/sanree_brand_userrightbottom}-->
	  </div>
	  <!-- /albumright -->
	</div>
	<!-- /albumlist -->
</div>
<div id="userbar"></div>
<div class="clear"></div>
<script language="javascript">ajaxget('plugin.php?id=sanree_brand&mod=userbar&tid={$tid}&bid={$bid}', 'userbar');function favoriteupdate(){}</script>
<!--{hook/sanree_brand_userfooter}-->
{subtemplate common/footer}  