{include file="tpl/header.tpl"}
<div class="row-fluid">
    <div class="span8 media-list">
    	<ul class="pager">
		  <li {if $prev==null}href="#" class="disabled"{/if}><a {if $prev!=null}href="backup.php?page={$prev}"{/if}>上一页</a></li>
		  <li {if $next==null}href="#" class="disabled"{/if}><a {if $next!=null}href="backup.php?page={$next}"{/if}>下一页</a></li>
		</ul>
        {foreach $status_list as $status}
            {include file="tpl/status.tpl" status=$status}
        {/foreach}
    	<ul class="pager">
		  <li {if $prev==null}href="#" class="disabled"{/if}><a {if $prev!=null}href="backup.php?page={$prev}"{/if}>上一页</a></li>
		  <li {if $next==null}href="#" class="disabled"{/if}><a {if $next!=null}href="backup.php?page={$next}"{/if}>下一页</a></li>
		</ul>     
    </div>
</div>

{include file="tpl/footer.tpl"}
