<?php if(!defined("APP")) die()?>
						<footer>
						  <a href="http://gempixel.com/doc/premium-url-shortener?utm_source=app-admin&amp;utm_medium=footer&amp;utm_campaign=documentation" target="_blank">帮助文档</a> - 版本 <?php echo _VERSION ?> <a href="http://gempixel.com/update.php?token=<?php echo md5('shortener'); ?>&amp;current=<?php echo _VERSION; ?>" target="_blank">(检测更新)</a>
						  <div class="pull-right">
						  	2013 - <?php echo date("Y") ?> &copy; <a href="http://gempixel.com">KBRmedia</a>. All Rights Reserved.
						  </div>
						</footer>
      		</div>
      	</div>
    	</div>    
    <?php Main::admin_enqueue(TRUE) ?>
    </body>
</html>