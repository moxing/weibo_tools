<li class="media">

  <div class="media-body">
    <div class="media">
      {$post.text}
    </div>
    {if $post.thumbnail_pic}
      <div class="thumbnail clearfix span2">
        <img class="media-object status-img" src="{$post.thumbnail_pic}" data-bmiddle-pic="{$post.bmiddle_pic}">
      </div>
    {/if}
    <label class="pull-left span12">{$post.created_at|date_format:"%y-%m-%d  %T"}</label> 
   </div>
   
  
</li>