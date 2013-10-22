<li class="media status" data-status="{$status.id}">
  <div class="media-body status-detail">
    <div class="media">
      {$status.text}
    </div>
    {if $status.thumbnail_pic!=null}
      <label class="thumbnail clearfix span2">
        <img class="media-object status-img" src="{$status.thumbnail_pic}" data-bmiddle-pic="{$status.bmiddle_pic}">
        {if $status.status==0}
          <i class="icon-arrow-down pull-right download-pic"></i>
        {/if}
      </label>
    {/if}

    {if $status.ori_status}
      {$ori=$status.ori_status}
      <div class="media-body status-detail well ori-status" data-status="{$ori.id}">
        <div class="media">
          {$ori.text}
        </div>
        {if $ori.thumbnail_pic!=null}
          <div class="thumbnail clearfix span2">
            <img class="media-object status-img" src="{$ori.thumbnail_pic}" data-bmiddle-pic="{$ori.bmiddle_pic}">
            {if $ori.status==0}
              <i class="icon-arrow-down pull-right download-pic"></i>
            {/if}
          </div>
        {/if}
        <div class="span11">
          <label class="pull-left">{$ori.datetime|date_format:"%y-%m-%d"}</label>
          <div class="pull-right hide ori-status-op">
            {if $ori.status == 0}
            <button class="btn btn-mini add-pw">图文</button>
            <button class="btn btn-mini add-p">图片</button>
            <button class="btn btn-mini add-w">文字</button>
            <button class="btn btn-mini update-w">更新</button>
            {/if}
          </div>
        </div>             
      </div>
    {/if}    
    <div class="span11">
      <label class="pull-left">{$status.datetime}</label>
      <div class="pull-right hide status-op">
        {if $status.status == 0}
            <button class="btn btn-mini add-pw">图文</button>
            <button class="btn btn-mini add-p">图片</button>
            <button class="btn btn-mini add-w">文字</button>
            <button class="btn btn-mini update-w">更新</button>          
        {/if}
      </div>
    </div> 

  </div>
</li>