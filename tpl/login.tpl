{include file="tpl/header.tpl"}
<div class="row">
	<div class="well span6 offset3 login">
	{if $login_erro}
	<div class="alert alert-error">
  		{$login_erro}
	</div>
	{/if}
	<form class="form-horizontal" action="/login.php" method="post">
	  <div class="control-group">
	    <label class="control-label" for="inputName">用户名</label>
	    <div class="controls">
	      <input type="text" name="inputName" placeholder="用户名" value="{$name}">
	    </div>
	  </div>  
	  <div class="control-group">
	    <label class="control-label" for="inputPassword">密码</label>
	    <div class="controls">
	      <input type="password" name="inputPassword" placeholder="密码">
	    </div>
	  </div>
  
	  <div class="control-group">
	    <div class="controls">
	      <button type="submit" class="btn btn-primary">登录</button>
	    </div>
	  </div>
	</form>
	</div>
</div>
{include file="tpl/footer.tpl"}