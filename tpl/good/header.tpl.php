<?php (!defined('IN_SANREE')&&exit('Power By sanree.com'))?>
<!--{block brand_header}-->
<style type="text/css" title="sanreeconfigcss">
{$bodycss}
</style>
<div class="brand_header">
  <div class="tmpbg"><img src="{$brandresult[banner]}" border="0" /></div>
  <div class="bbanner">
    <h1><span<!--{if intval($brandresult[isshowbrandname])==1}--> style="display:none"<!--{/if}-->>{$brandresult[name]}</span></h1>
    <ul class="brandnav">
      <!--{loop $headermenulist $menu}-->
      <!--{if $menu[window]==1}-->
      <li{$menu[class]}><a href="{$menu[url]}" id="cmenu{$menu[id]}" onclick="showWindow('cmenu', this.href, 'get', 1)">{$menu[title]}</a>
      </li>
      <!--{else}-->
      <li{$menu[class]}>
      <ul>
        <li class="m0"></li>
        <li class="m1"><a href="{$menu[url]}">{$menu[title]}</a></li>
        <li class="m2"></li>
      </ul>
      </li>
      <!--{/if}-->
      <!--{/loop}-->
    </ul>
  </div>
  <!--{if $_G[cache][plugin][sanree_brand_wap][isopen]==1}--><div class="code2"><img src="plugin.php?id=sanree_brand_wap&mod=show2code&tid={$brandresult[bid]}" /></div><!--{/if}-->
</div>
<!--{if defined('IN_BRAND_USER')}-->
<script src="{sr_brand_JS}/manage.js?{VERHASH}"></script>
<div class="brand_manage" id="managebar" style="display:none">
  <div class="filterdiv" style="height:{$ih}px"></div>
  <div class="fshow">
	  <div class="m950">
		  <ul class="managenav">
		  <!--{loop $managemenulist $menu}-->
		      <!--{if !empty($menu[addhtml])}-->{$menu[addhtml]}<!--{/if}-->
			  <!--{if $menu[window]==1}-->
			  <li{$menu[class]}>
			  <!--{if !empty($menu[image])}--><a href="{$menu[url]}" title="{$menu[title]}" id="{$menu[name]}" onclick="showWindow('{$menu[name]}', this.href, 'get', 1)"><img src="{$menu[image]}" /></a><!--{/if}-->
			  <a href="{$menu[url]}" title="{$menu[title]}" id="{$menu[name]}" onclick="showWindow('{$menu[name]}', this.href, 'get', 1)">{$menu[title]}</a></li>
			  <!--{else}-->
			  <li{$menu[class]}>
			  <!--{if !empty($menu[image])}--><a<!--{if !empty($menu[url])}--> href="{$menu[url]}"<!--{/if}--> title="{$menu[title]}" target="_blank"><img src="{$menu[image]}" /></a><!--{/if}-->	  
			  <a<!--{if !empty($menu[url])}--> href="{$menu[url]}"<!--{/if}--> title="{$menu[title]}" target="_blank">{$menu[title]}</a></li>
			  <!--{/if}-->
		  <!--{/loop}-->
		  </ul>
		  <div class="mclose"><a href="javascript:void(0)" onclick="showmanage()" class="srflbc"></a></div>
	  </div>
  </div>
</div>
<!--{/if}-->
<!--{/block}-->