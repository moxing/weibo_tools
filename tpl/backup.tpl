{include file="tpl/header.tpl"}
<div class="row-fluid">
    <div class="span8 media-list">                       
    	<ul class="pager">
		  <li {if $prev==null}href="#" class="disabled"{/if}><a {if $prev!=null}href="backup.php?page={$prev}"{/if}>上一页</a></li>
		  <li {if $next==null}href="#" class="disabled"{/if}><a {if $next!=null}href="backup.php?page={$next}"{/if}>下一页</a></li>
		</ul>
        <a id="backupData" href="#">
          <div class="alert text-center">备份微薄数据</div>
        </a>      
        {foreach $status_list as $status}
            {include file="tpl/status.tpl" status=$status}
        {/foreach}
    	<ul class="pager">
		  <li {if $prev==null}href="#" class="disabled"{/if}><a {if $prev!=null}href="backup.php?page={$prev}"{/if}>上一页</a></li>
		  <li {if $next==null}href="#" class="disabled"{/if}><a {if $next!=null}href="backup.php?page={$next}"{/if}>下一页</a></li>
		</ul>     
    </div>
    <div class="span4">
        <div class="text-center"><strong>打印列表</strong></div>
        <ul>
         {foreach $pdf_list as $item}
            <li>{$item.id}</li>         
         {/foreach}         
        </ul>
    </div>
</div>
<script type="text/javascript">
    $('#backupData').click(function(){
        $.ajax({
          dataType: "json",
          url: "a.php",
          data: {
            'do' : 'backup'
          },
          success: function(data){
            window.location.reload();
          }
        });
    })
</script>
{include file="tpl/footer.tpl"}
