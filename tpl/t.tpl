{include file="tpl/header.tpl"}
<div class="row-fluid">
  <div class="span10">
        <div class="span2">
          <ul class="nav nav-tabs nav-stacked">
            {foreach $course_list as $r} 
            <li><a class="course" href="#" data-url="{$r->id}"><i class=""></i> {$r->name}</a></li>
            {/foreach}       
          </ul>
        </div>
        <div id="t-content" class="span10">
          {include file="tpl/a_lesson.tpl"}
        </div>
  </div>
  <div class="span2">

  </div>
</div>
<script type="text/javascript">
$(function() {
    $('.course').click(function() {
      var d=$(this).attr('data-url');
      $('#t-content').load("ajax.php?do=lesson&cid="+d);
    });
});
</script>
{include file="tpl/footer.tpl"}