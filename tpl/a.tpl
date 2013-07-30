{include file="tpl/header.tpl"}
<div class="row-fluid">
  <div class="span10">
        <div class="span2">
          <ul class="nav nav-tabs nav-stacked">
            <li><a class="admin" href="#" data-url="course"><i class="icon-chevron-right"></i> 课程</a></li>
            <li><a class="admin" href="#" data-url="student"><i class="icon-chevron-right"></i> 学生</a></li>
            <li><a class="admin" href="#" data-url="teacher"><i class="icon-chevron-right"></i> 教师</a></li>
            <li><a class="admin" href="#" data-url="index"><i class="icon-chevron-right"></i> 首页</a></li>
            <li><a class="admin" href="#" data-url="data"><i class="icon-chevron-right"></i> 基础数据</a></li>          
          </ul>
        </div>
        <div id="a-content" class="span10">
          {include file="tpl/a_course.tpl"}
        </div>
  </div>
  <div class="span2">

  </div>
</div>
{include file="tpl/footer.tpl"}