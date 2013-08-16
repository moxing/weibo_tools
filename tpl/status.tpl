<li class="media status">
  <div class="media-body status-detail">
    <div class="media">
      {$status->text}
    </div>
    {if $status->thumbnail_pic}
      <label class="thumbnail clearfix span2">
        <img class="media-object status-img" src="{$status->thumbnail_pic}" data-bmiddle-pic="{$status->bmiddle_pic}">
      </label>
    {/if}
    {if $status->ori_status != Null}
      {$ori=$status->ori_status}
      <div class="media-body status-detail well ori-status">
        <div class="media">
          {$ori->text}
        </div>
        {if $ori->thumbnail_pic}
          <div class="thumbnail clearfix span2">
            <img class="media-object status-img" src="{$ori->thumbnail_pic}" data-bmiddle-pic="{$ori->bmiddle_pic}">
          </div>
        {/if}
        <div class="span11">
          <label class="pull-left">{$ori->status_datetime|date_format:"%y-%m-%d  %T"}</label>
          <div class="pull-right hide ori-status-op">
            {if $ori->status == 0}
            <button class="btn btn-mini">添加</button>
            <button class="btn btn-mini">带图</button>
            {/if}
          </div>
        </div>             
      </div>

    {/if}    
    <div class="span11">
      <label class="pull-left">{$status->status_datetime|date_format:"%y-%m-%d  %T"}</label>
      <div class="pull-right hide status-op">
        {if $status->status == 0}
        <button class="btn btn-mini">添加</button>
        <button class="btn btn-mini">带图</button>
        {/if}
      </div>
    </div> 

  </div>
</li>