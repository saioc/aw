<?php if(!defined("APP")) die()?>
<p class="alert alert-info">
  所有主题都位于“themes”文件夹中，您只需在该文件夹中上传您的主题，然后到此处激活它。
	确保命名主样式表style.css，否则主题将不会显示！
</p>      
<div class="row themes">
  <?php echo $theme_list ?> 
</div>
<div class='editor'>
  <form action="<?php echo Main::ahref("themes/update") ?>" method="post" class="form" id="form-editor">
    <textarea name="content" id="code" class="form-control hidden" rows="1"></textarea>
    <div class='header'>
      <div class="row">
        <div class="col-sm-6">
          当前编辑: <?php echo $currentFile["current"] ?>
        </div>
        <div class="col-sm-6">
          <select name="theme_files" id="theme_files" style="max-width: 250px" class="pull-right">
            <?php echo $themeFiles ?>
          </select>
        </div>
      </div>
    </div>
    <div id="code-editor"><?php echo $currentFile["content"] ?></div>
    <br class="clear">
    <?php echo Main::csrf_token(TRUE); ?>
    <button class="btn btn-primary btn-lg">更新文件</button>
  </form>  
</div>