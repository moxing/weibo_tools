{include file="tpl/header.tpl"}
<div class="row-fluid">
    <div class="span8 media-list">
        {foreach $status_list as $status}
            {include file="tpl/status.tpl" status=$status}
        {/foreach}
    </div>
</div>

{include file="tpl/footer.tpl"}
