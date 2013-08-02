<li class="media">
  <a class="pull-left" href="/u.php?id={$post.user.id}">
    <img class="media-object" src="{$post.user.profile_image_url}">
  </a>
  <h5 class="media-heading"><a href="/u.php?id={$post.user.id}">{$post.user.name}</a></h5>

  <div class="media-body">
    <div class="media span12">
      {$post.text}
    </div>
    {if $post.thumbnail_pic}
      <div class="thumbnail span2">
        <img class="media-object" src="{$post.thumbnail_pic}">
      </div>
    {/if}
    <label class="pull-left span12">{$post.created_at|date_format:"%y-%m-%d  %T"}</label> 
   </div>
   
  
</li>