<?php if(!defined("APP")) die()?>
<div class="panel panel-default">
  <div class="panel-heading">
    <?php if(!empty($this->id)) echo "User's " ?>网址
    <div class="btn-group pull-right ">
      <a href="<?php echo Main::ahref("urls/export") ?>" class="btn btn-primary btn-xs">导出</a>
      <a href="<?php echo Main::ahref("urls/inactive").Main::nonce("inactive_urls") ?>" class="btn btn-danger delete btn-xs">删除不活跃网址</a>
      <a href="<?php echo Main::ahref("urls/flush").Main::nonce("flush") ?>" class="btn btn-danger delete btn-xs">删除所有匿名网址</a>
    </div>    
  </div>      
  <div class="panel-body nopadding">
    <form action="<?php echo Main::ahref("urls/delete")?>" method="post" id="delete-all-urls">
    	<div class="toolbar">
        <div class="btn-group">
          <a href="#check-all" class="btn btn-primary" id="check-all">选择全部</a>
          <input type='submit' class="btn btn-danger" value='取消全选'>
        </div>  
        <?php if (!isset($hidePerPage)): ?>
         <select name="perpage" class="hidden-xs" id="perpage" data-search="0">
            <optgroup label="每页显示">
              <option value=""<?php if(Main::is_set('perpage','')) echo " selected" ?>>25</option>
              <option value="50"<?php if(Main::is_set('perpage','50')) echo " selected" ?>>50</option>
              <option value="100"<?php if(Main::is_set('perpage','100')) echo " selected" ?>>100</option>
            </optgroup>
          </select>          
        <?php endif ?>              
        <?php if (!isset($hideFilter)): ?>
          <select name="filter" class="hidden-xs" id="filter" data-search="0">
            <optgroup label="排序">
              <option value=""<?php if(Main::is_set('filter','')) echo " selected" ?>>最新</option>
              <option value="old"<?php if(Main::is_set('filter','old')) echo " selected" ?>>最老</option>
              <option value="most"<?php if(Main::is_set('filter','most')) echo " selected" ?>>热门</option>
              <option value="less"<?php if(Main::is_set('filter','less')) echo " selected" ?>>访问最少</option>       
              <option value="anon"<?php if(Main::is_set('filter','anon')) echo " selected" ?>>匿名网址</option>
            </optgroup>
          </select>          
        <?php endif ?>
    	</div>
    	<?php foreach ($urls as $url): ?>
        <div class="url-list">          
          <div class="title">
            <div class="url-checkbox">
              <input type="checkbox" class="data-delete-check" value="<?php echo $url->custom.$url->alias ?>" name="delete-id[]">
            </div>
            <img src="https://www.google.com/s2/favicons?domain=<?php echo $url->url ?>" alt="Favicon">
            <a href="<?php echo $url->url ?>" target="_blank">
              <?php echo Main::truncate(empty($url->meta_title)?$url->url:$url->meta_title,50) ?>
              <span class="pull-right"><?php echo Main::timeago($url->date) ?></span>
            </a> 
          </div>
          <div class="url-action">
            <a href="<?php echo $this->config["url"]."/".$url->custom.$url->alias ?>">
              <strong><?php echo $this->config["url"]."/".$url->custom.$url->alias ?></strong>
            </a>
            <a href="<?php echo $this->config["url"]."/".$url->custom.$url->alias ?>+"><strong><?php echo $url->click ?> <small>点击</small></strong></a>
            <?php if ($url->userid): ?>
              <a href="<?php echo Main::ahref("users/edit/{$url->userid}") ?>"><strong><small>查看用户</small></strong></a>
            <?php else: ?>
            <i class="glyphicon glyphicon-user"></i> 匿名
            <?php endif ?>
            <?php if (!empty($url->location)): ?>
              <i class="glyphicon glyphicon-globe"></i> 地区
            <?php endif ?>
            <?php if (!empty($url->pass)): ?>
              <i class="glyphicon glyphicon-lock"></i> 保护
            <?php endif ?> 

            <div class="pull-right action">
              <a href="<?php echo Main::ahref("urls/edit/{$url->id}") ?>" class="btn btn-primary btn-xs">编辑</a>
              <a href="<?php echo Main::ahref("urls/delete/{$url->id}").Main::nonce("delete_url-{$url->id}") ?>" class="btn btn-danger btn-xs delete">删除</a>              
            </div>          
          </div>
        </div><!-- /.url-list -->    		
    	<?php endforeach ?>  
      <?php echo Main::csrf_token(TRUE) ?>
    </form>
  	<?php echo $pagination ?>
  </div>
</div>