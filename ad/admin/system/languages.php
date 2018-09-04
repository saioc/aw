<?php if(!defined("APP")) die()?>
<div class="row">
  <div class="col-md-3">
    <div class="panel panel-default sticky">
      <div class="panel-heading">
        管理语言
        <a href="<?php echo Main::ahref("languages") ?>" class="btn btn-xs btn-primary pull-right">添加</a>
      </div>      
      <div class="panel-body">   
        <div class="list-group">
          <?php echo $lang_list ?>          
        </div>
      </div>
    </div>    
  </div>
  <div class="col-md-9"> 
    <?php echo $lang_content ?> 
  </div>
</div>