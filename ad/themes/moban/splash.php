<?php defined("APP") or die() // Media Page ?>
<div<?php echo Main::body_class() ?> id="main-overlay">    
       <link rel="stylesheet" type="text/css" href="<?php echo $this->config["url"] ?>/themes/<?php echo $this->config["theme"] ?>/stylea.css">    
        <div class='custom-message t1' style='background-color: #ee280a !important'>
            <div class='custom-label'>Porn</div>
            <p>若您访问的页面含有成人内容，请关闭此页面。</p>
            <a href='<?php echo $url->url ?>' class='btn btn-xs'>确定访问</a>
            <a href="javascript:window.opener=null;window.close();" class="remove"><i class="glyphicon glyphicon-remove-sign"></i></a>
        </div><!-- /.custom-message --> 
<section>
	<div class="container splash">
		<?php echo $this->ads(728,FALSE) ?>
		<div class="panel panel-default panel-body">
			<div class="row">
				<div class="col-md-4 thumb">
					<img src="<?php echo $url->short ?>/i">
				</div>
				<div class="col-md-8">
						<h2>
							<?php if (!empty($url->meta_title)): ?>
								<?php echo $url->meta_title ?>
							<?php else: ?>
								<?php echo e("您将被重定向到另一页") ?>
							<?php endif ?>
						</h2>
						<p class="description">
							<?php if (!empty($url->meta_description)): ?>
								<?php echo $url->meta_description ?>
							<?php endif ?>
						</p>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<a href="<?php echo $url->url ?>" class="btn btn-secondary btn-block redirect" rel="nofollow"> 确定访问 </a>
							</div>
							<div class="col-sm-6">
								<a href="<?php echo $this->config["url"] ?>" class="btn btn-primary btn-block" rel="nofollow"><?php echo e("Take me to your homepage") ?></a>
							</div>
						</div>
						<hr>
						<p class="disclaimer">
							<?php echo e("您将被重定向到另一页，我们对该页面的内容或其可能对您造成的后果不承担责任。") ?>
						</p>
				</div>
			</div>
		</div>
	</div>
</section>
</div>