<link href="assets/stylesheets/datetimepicker.css" rel="stylesheet" media="screen">
<div class="row-fluid">
  <div class="btn-group span12">
    <a class="btn pull-right" data-toggle="modal" data-target="#lessonModal">新增课时</a>
  </div>
  
  <table class="table table-striped">
    <thead>    
    <tr>
      <th class="span2">课时名</th>
      <th class="span2">开课时间</th>      
      <th class="span2">视频地址</th>
      <th class="span2">创建时间</th>      
      <th class="span2">课时说明</th>
      <th class="span2">编辑</th>
    </tr>
    </thead>
    <tbody>
    {foreach $lesson_list as $r} 
      <tr>
          <td>{$r->name}</td>
          <td>{if $r->pub_time}{$r->pub_time->format('Y-m-d H:i')}{/if}</td>
          <td>{if $r->video_url}<a href="{$r->video_url}" target="_blank">播放</a>{/if}</td>
          <td>{$r->created_at->format('Y-m-d H:i')}</td>
          <td>{$r->desc}</td>
          <td><a class="btn lesson-del" data-url="{$r->id}">删除</a></td>
      </tr>
    {/foreach}
    </tbody>
  </table>
</div>

<div id="lessonModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
     <i class="icon-th-list"></i>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" id="form-course">
      <div class="control-group">
        <label class="control-label" for="inputName">课时名称</label>
        <div class="controls">
          <input type="text" id="inputName" placeholder="课时名称"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPubTime">开课时间</label>
        <div class="controls">
          <div class="input-append date form_datetime" placeholder="开课时间">
              <input size="16" type="text" value="" readonly id="inputPubTime">
              <span class="add-on"><i class="icon-remove"></i></span>
              <span class="add-on"><i class="icon-calendar"></i></span>
          </div>
        </div>
      </div>      
      <div class="control-group">
        <label class="control-label" for="inputRecord">课时说明</label>
        <div class="controls">
          <textarea rows="3" id="inputDesc"></textarea>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    <button class="btn btn-primary" id="add_lesson">增加</button>
  </div>
</div>

<script src="assets/javascript/bootstrap-datetimepicker.min.js"></script>
<script src="assets/javascript/bootstrap-datetimepicker.zh-CN.js"></script>
<script type="text/javascript">
  $('#add_lesson').click(function() {
    var name = $('#inputName').val();
    var pub_time  = $('#inputPubTime').val();
    var desc = $('#inputDesc').val();
    $.post("ajax.php?do=lesson&cid={$cid}", { name: name ,pub_time:pub_time,desc:desc,op:'add'},
      function(data){
        if(data.id){
          $('#t-content').load("ajax.php?do=lesson&cid={$cid}");
          $('#lessonModal').modal('hide')
        }
      }, "json");
  });

  $(".lesson-del").click(function(){
    var id = $(this).attr('data-url');
    $.post("ajax.php?do=lesson&cid={$cid}", { id: id ,op:'del'},
      function(data){
        $('#t-content').load("ajax.php?do=lesson&cid={$cid}");
      }, "json");    
  });

  $(".form_datetime").datetimepicker({
        language:  'zh-CN',
        format: "yyyy-mm-dd  hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14 10:00",
        viewSelect: "hour"
  });
</script>