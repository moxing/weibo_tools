{include file="tpl/header.tpl"}
<div class="row-fluid">
    <div class="span8 media-list">
        {foreach $timelines as $post}
            {include file="tpl/post.tpl" name=$post}
        {/foreach}
    </div>
</div>


{include file="tpl/footer.tpl"}
