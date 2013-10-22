{include file="tpl/header.tpl"}
<div class="row-fluid">
    <div class="span8 media-list">                       
    	<ul class="pager">
      {if $prev}<li><a href="backup.php?page={$prev}">上一页</a></li>{/if}
      {if $next}<li><a href="backup.php?page={$next}">下一页</a></li>{/if}
		  </ul>
        <a id="backupData" href="#">
          <div class="alert text-center">备份微薄数据</div>
        </a>      
        {foreach $status_list as $status}
            {include file="tpl/status.tpl" status=$status}
        {/foreach}
    	<ul class="pager">
		  {if $prev}<li><a href="backup.php?page={$prev}">上一页</a></li>{/if}
		  {if $next}<li><a href="backup.php?page={$next}">下一页</a></li>{/if}
		  </ul>     
    </div>
    <div class="span4">
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
