{include file="tpl/header.tpl"}
<div class="row">
	<div class="well span6 offset3 signup">
	{if $signup_erro}
	<div class="alert alert-error text-center">
  		{$signup_erro}
	</div>
	{/if}
	<form class="form-horizontal" action="/signup.php" method="post">
	  <div class="control-group">
	    <label class="control-label" for="inputEmail">邮箱</label>
	    <div class="controls">
	      <input type="text" name="inputEmail" placeholder="邮箱" value="{$email}"><span class="help-inline">*</span>
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="inputName">用户名</label>
	    <div class="controls">
	      <input type="text" name="inputName" placeholder="用户名" value="{$name}"><span class="help-inline">*</span>
	    </div>
	  </div>  
	  <div class="control-group">
	    <label class="control-label" for="inputPassword">密码</label>
	    <div class="controls">
	      <input type="password" name="inputPassword" placeholder="密码"><span class="help-inline">*</span>
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="inputCode">会员码</label>
	    <div class="controls">
	      <input type="text" name="inputCode" placeholder="会员码">
	    </div>
	  </div>	  
	  <div class="control-group">
	    <div class="controls">
	      <input type="hidden" name="submit" value="{$submit}"/>
	      <button type="submit" class="btn btn-primary">注册</button>
	    </div>
	  </div>
	</form>
	</div>
</div>
{include file="tpl/footer.tpl"}
