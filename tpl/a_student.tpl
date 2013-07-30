<div class="row-fluid">
  <div class="btn-group span12">
  </div>
  
  <table class="table table-striped">
    <thead>    
    <tr>
      <th class="span2">登录名</th>
      <th class="span2">邮箱</th>
      <th class="span2">用户类型</th>
      <th class="span2">注册时间</th>
      <th class="span2">编辑</th>
    </tr>
    </thead>
    <tbody>
    {foreach $student_list as $r} 
      <tr>
          <td>{$r->name}</td>
          <td>{$r->email}</td>
          <td>{if $r->type==0}普通用户{/if}{if $r->type==1}认证用户{/if}</td>
          <td>{$r->created_at->format('Y-m-d H:i')}</td>
          <td></td>
      </tr>
    {/foreach}
    </tbody>
  </table>
</div>