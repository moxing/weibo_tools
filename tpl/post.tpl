<li class="media">
  <a class="pull-left" href="/u.php?id={$post.user.id}">
    <img class="media-object" src="{$post.user.profile_image_url}">
  </a>
  <h5 class="media-heading"><a href="/u.php?id={$post.user.id}">{$post.user.name}</a></h5>
  <div class="media-body">
    <div class="media">
      {$post.text}
   </div>
   <label>{$post.created_at|date_format:"%y-%m-%d  %T"}</label>
  </div>
</li>