<?php if(!defined("APP")) die()?>
<?php echo $this->update_notification() ?>
<div class="panel panel-default">
  <div class="panel-heading">
    网站设置
  </div>      
  <div class="panel-body settings">
  	<div class="row">
  		<div class="col-md-3 sub-sidebar">
        <ul class="nav tabs">
          <li class="active"><a href="#general">常规设置</a></li>
					<li><a href="#app">应用设置</a></li>
          <li><a href="#adv">高级设置</a></li>					
          <li><a href="#themes">主题设置</a></li>					
					<li><a href="#security">安全设置</a></li>
          <li><a href="#payment">会员设置</a></li>
          <li><a href="#user">用户设置</a></li>
          <li><a href="#ads">广告设置</a></li>
          <li><a href="#tools">邮件设置</a></li>
        </ul>
  		</div>
  		<div class="col-md-9">
				<form class="form-horizontal" role="form" id="setting-form" action="<?php echo Main::ahref("settings") ?>" method="post" enctype="multipart/form-data">
					<div id="general" class="tabbed">
						<div class="form-group">
					    <label for="url" class="col-sm-3 control-label">网站网址</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="url" id="url" value="<?php echo $this->config['url'] ?>">
					      <p class="help-block">请确保包含http：//（或https：//）并删除最后一个斜杠</p>
					    </div>
					  </div>				
						<div class="form-group">
					    <label for="title" class="col-sm-3 control-label">网站标题</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="title" id="title" value="<?php echo $this->config['title'] ?>">
					      <p class="help-block">网站名称以及网站元标题</p>
					    </div>
					  </div>				
						<div class="form-group">
					    <label for="description" class="col-sm-3 control-label">网站描述</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="description" id="description" value="<?php echo $this->config['description'] ?>">
					      <p class="help-block">网站描述以及网站元描述</p>
					    </div>
					  </div>
						<div class="form-group">
					    <label for="keywords" class="col-sm-3 control-label">网站关键字</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="keywords" id="keywords" value="<?php echo $this->config['keywords'] ?>">
					      <p class="help-block">网站关键字以及网站元关键字（只有一些重要的关键字）</p>
					    </div>
					  </div>					  
						<div class="form-group">
					    <label for="logo" class="col-sm-3 control-label">Logo
					    	<?php if(!empty($this->config["logo"])):  ?>
					    	<span class="help-block"><a href="#" id="remove_logo" class="btn btn-info btn-xs">Remove Logo</a></span>
					    	<?php endif ?>
					    </label>
					    <div class="col-sm-9">
								<?php if(!empty($this->config["logo"])):  ?>
									<img src="<?php echo $this->config["url"] ?>/content/<?php echo $this->config["logo"] ?>" height="80" alt=""> <br />
								<?php endif ?>					    	
					      <input type="file" name="logo_path" id="logo">
					      <p class="help-block">请确保徽标具有足够的尺寸和格式</p>
					    </div>
					  </div>		
						<div class="form-group">
					    <label for="default_lang" class="col-sm-3 control-label">默认语言</label>
					    <div class="col-sm-9">
					      <select name="default_lang" id="default_lang" class="selectized">
					      	<?php echo $lang ?>
					      </select>
					      <p class="help-block">要添加新语言，您可以在includes / languages /中使用示例文件“sample_lang.php”，然后重命名为双字母代码</p>
					    </div>
					  </div>
						<div class="form-group">
					    <label for="timezone" class="col-sm-3 control-label">时区</label>
					    <div class="col-sm-9">
					      <select name="timezone" id="timezone" class="selectized">
									<?php
										$timezone_identifiers = DateTimeZone::listIdentifiers();
										foreach($timezone_identifiers as $tz){
										    echo "<option value='$tz' ".($this->config["timezone"] == $tz ? "selected":"").">$tz</option>";
										}
									?>		    
								</select> 
					      <p class="help-block"></p>
					    </div>
					  </div>
						<div class="form-group">
					    <label for="font" class="col-sm-3 control-label">Google 字体</label>
					    <div class="col-sm-9">
					      <input class="form-control" name="font" id="font" value="<?php echo $this->config['font'] ?>">
					      <p class="help-block">请添加 <a href="https://www.google.com/fonts" target="_blank">Google 字体</a>的确切名称，例如： <strong>Open Sans</strong></p>
					    </div>
					  </div>
						<div class="form-group">
					    <label for="news" class="col-sm-3 control-label">公告</label>
					    <div class="col-sm-9">
					      <textarea class="form-control" name="news" id="news"><?php echo $this->config['news'] ?></textarea>
					      <p class="help-block">这将显示在用户仪表板中。你可以使用html。清空它以删除通知。</p>
					    </div>
					  </div>					  			  
						<div class="form-group">
					    <label for="email" class="col-sm-3 control-label">邮箱</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="email" id="email" value="<?php echo $this->config['email'] ?>">
					      <p class="help-block">此电子邮件将用于发送电子邮件和接收电子邮件</p>
					    </div>
					  </div>
					  <hr>
						<div class="form-group">
					    <label for="facebook" class="col-sm-3 control-label">Facebook 页面</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $this->config['facebook'] ?>">
					      <p class="help-block">链接到您的Facebook页面，例如 http://facebook.com/saioc</p>
					    </div>
					  </div>	
						<div class="form-group">
					    <label for="twitter" class="col-sm-3 control-label">Twitter 页面</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $this->config['twitter'] ?>">
					      <p class="help-block">链接到您的Twitter个人资料，例如 http://www.twitter.com/saioc</p>
					    </div>
					  </div>						  					  			  		  												
					</div><!-- /#main.tabbed -->
					<div id="app" class="tabbed">
						<ul class="form_opt" data-id="maintenance">
							<li class="text-label">网站 开启/关闭 <small>设置关闭将使所有用户无法访问您的网站</small></li>
							<li><a href="" class="last<?php echo (($this->config["maintenance"])?' current':'')?>" data-value="1">维护关闭</a></li>
							<li><a href="" class="first<?php echo ((!$this->config["maintenance"])?' current':'')?>" data-value="0">开启</a></li>
						</ul>
						<input type="hidden" name="maintenance" id="maintenance" value="<?php echo $this->config["maintenance"]?>">	

						<ul class="form_opt" data-id="private">
							<li class="text-label">私人服务 <small>启用此功能将防止用户缩短和注册。只有你可以创建账户。</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["private"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["private"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="private" id="private" value="<?php echo $this->config["private"]?>">	

						<div class="form-group">
					    <label for="home_redir" class="col-sm-3 control-label">主页重定向</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="home_redir" id="home_redir" value="<?php echo $this->config['home_redir'] ?>">
					      <p class="help-block">如果您启用私人模式，并且想要将用户重定向到自定义页面，请添加上面的URL，其中包括 http://</p>
					    </div>
					  </div>	

						<ul class="form_opt" data-id="frame">
							<li class="text-label">重定向<small>选择重定向机制的类型。“无”将直接重定向，而“自动”将添加一个选项让用户选择每个网址。</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["frame"])?' current':'')?>" data-value="0">无</a></li>
							<li><a href="" class="<?php echo (($this->config["frame"]==1)?' current':'')?>" data-value="1">框架</a></li>
							<li><a href="" class="<?php echo (($this->config["frame"]==2)?' current':'')?>" data-value="2">倒计时</a></li>
							<li><a href="" class="first<?php echo (($this->config["frame"]==3)?' current':'')?>" data-value="3">Auto</a></li>
						</ul>
						<input type="hidden" name="frame" id="frame" value="<?php echo $this->config["frame"]?>">		
						<div class="form-group">
							<div class="col-md-10">
								<label for="timer" class="control-label">倒计时时间</label>								
								<p class="help-block">秒</p>
							</div>					    
					    <div class="col-md-2">
					      <input type="text" class="form-control" name="timer" id="timer" value="<?php echo $this->config['timer'] ?>">
					    </div>
					  </div>	

						<ul class="form_opt" data-id="show_media">
							<li class="text-label">媒体网关 <small>启用此功能将自动为YouTube，Vine，Dailymotion等URL创建媒体页面。注册用户可以从用户设置中覆盖此选项</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["show_media"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["show_media"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="show_media" id="show_media" value="<?php echo $this->config["show_media"]?>">				

						<ul class="form_opt" data-id="geotarget">
							<li class="text-label">地理定位<small>根据其国家（如果由用户设置）重定向用户.</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["geotarget"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["geotarget"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="geotarget" id="geotarget" value="<?php echo $this->config["geotarget"]?>">	

						<ul class="form_opt" data-id="devicetarget">
							<li class="text-label">设备定位<small>设备定位根据用户的设备重定向用户（如果由用户设置）</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["devicetarget"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["devicetarget"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="devicetarget" id="devicetarget" value="<?php echo $this->config["devicetarget"]?>">	

						<ul class="form_opt" data-id="api">
							<li class="text-label">开发者API <small>允许注册用户使用API​​缩短他们网站的URL</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["api"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["api"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="api" id="api" value="<?php echo $this->config["api"]?>">							

						<ul class="form_opt" data-id="sharing">
							<li class="text-label">共享 <small>允许用户通过facebook和twitter等社交网络分享缩短的网址</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["sharing"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["sharing"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="sharing" id="sharing" value="<?php echo $this->config["sharing"]?>">					

						<ul class="form_opt" data-id="update_notification">
							<li class="text-label">更新 <small>通知当更新可用时通知</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["update_notification"])?' current':'')?>" data-value="0">禁用</a></li>
							 <li><a href="" class="first<?php echo (($this->config["update_notification"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="update_notification" id="update_notification" value="<?php echo $this->config["update_notification"]?>">								
					</div><!-- /#app.tabbed -->
					<div id="adv" class="tabbed">
						<ul class="form_opt" data-id="tracking">
							<li class="text-label">选择高级跟踪系统 <small> “系统”将使用内置的跟踪系统，“禁用”将禁用高级跟踪，但点击仍将被计数</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["tracking"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="<?php echo (($this->config["tracking"]==='1')?' current':'')?>" data-value="1">System</a></li>
						</ul>
						<input type="hidden" name="tracking" id="tracking" value="<?php echo $this->config["tracking"]?>">
						<div class="form-group">
					    <label for="analytic" class="col-sm-3 control-label">Google Analytics 帐户 ID</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="analytic" id="analytic" value="<?php echo $this->config['analytic'] ?>">
					      <p class="help-block">您的Google Analytics帐户ID，例如UA-12345678-1。这将用于分别收集数据仅供您参考</p>
					    </div>
					  </div>	
					  <hr>
						<ul class="form_opt" data-id="multiple_domains">
							<li class="text-label">多个域名 <small>如果启用，用户可以选择从下面的列表中选择他们的首选域名。确保所有这些指向脚本</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["multiple_domains"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["multiple_domains"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="multiple_domains" id="multiple_domains" value="<?php echo $this->config["multiple_domains"]?>">
						<div class="form-group">
					    <label for="domain_names" class="col-sm-3 control-label">域名</label>
					    <div class="col-sm-9">
					      <textarea name="domain_names" id="domain_names" rows="5" class="form-control"><?php echo $this->config["domain_names"]?></textarea>	
					      <p class="help-block">包含http：//的每行一个域不包含您的主域名（请参阅文档）</p>
					    </div>
					  </div>												  
					</div><!-- /#adv.tabbed -->
					<div id="themes" class="tabbed">
						<ul class="form_opt" data-id="user_history">
							<li class="text-label">匿名用户历史记录 <small>如果启用，匿名用户可以在主页上查看其个人网址历史记录</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["user_history"])?' current':'')?>" data-value="0">禁用</a></li>
							 <li><a href="" class="first<?php echo (($this->config["user_history"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="user_history" id="user_history" value="<?php echo $this->config["user_history"]?>">				
						<ul class="form_opt" data-id="public_dir">
							<li class="text-label">公共URL列表 <small>启用此项将显示主页上的新公共URL列表。只有最后25个网址会显示在那里</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["public_dir"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["public_dir"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="public_dir" id="public_dir" value="<?php echo $this->config["public_dir"]?>">	
						
						<ul class="form_opt" data-id="homepage_stats">
							<li class="text-label">在主页上 <small>显示统计信息启用此项将显示主页底部的统计信息。</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["homepage_stats"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["homepage_stats"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="homepage_stats" id="homepage_stats" value="<?php echo $this->config["homepage_stats"]?>">									
					</div>
					<div id="security" class="tabbed">

						<ul class="form_opt" data-id="adult">
							<li class="text-label">将网址列入黑名单 <small>启用后，任何包含以下关键字（或内部列表）的网址都将不被允许。这也将防止缩短与可执行文件的链接</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["adult"])?' current':'')?>" data-value="0">禁用</a></li>	
							<li><a href="" class="first<?php echo (($this->config["adult"])?' current':'')?>" data-value="1">启用</a></li>			
						</ul>
						<input type="hidden" name="adult" id="adult" value="<?php echo $this->config["adult"]?>">			
						<div class="form-group">												
					    <label for="keyword_blacklist" class="col-sm-3 control-label">黑名单关键字</label>
					    <div class="col-sm-9">
					      <textarea name="keyword_blacklist" class="form-control" rows="5"><?php echo $this->config["keyword_blacklist"] ?></textarea>
					      <p class="help-block"> 每个URL缩短器都将与下面的关键字列表进行匹配，如果匹配则不允许。用逗号分隔每个关键字，例如keyword1，keyword2</p>
					    </div>
					  </div>
						<div class="form-group">
					    <label for="domain_blacklist" class="col-sm-3 control-label">黑名单域名</label>
					    <div class="col-sm-9">
					      <textarea name="domain_blacklist" class="form-control" rows="5"><?php echo $this->config["domain_blacklist"] ?></textarea>
					      <p class="help-block"> 要将域名（或tld）加入黑名单，只需按照以下格式将其添加到下面的字段中（用逗号分隔）：domain.com，domain2.com，domain3.com</p>
					    </div>
					  </div>				  
						<hr>
						<div class="form-group">
					    <label for="safe_browsing" class="col-sm-3 control-label">Google安全浏览</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="safe_browsing" id="safe_browsing" value="<?php echo $this->config['safe_browsing'] ?>">
					      <p class="help-block">您可以从 <a href="https://developers.google.com/safe-browsing" target="_blank">Google</a>免费获得您的API密钥</p>
					    </div>
					  </div>
						<div class="form-group">
					    <label for="phish_api" class="col-sm-3 control-label">Phishtank API</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="phish_api" id="phish_api" value="<?php echo $this->config['phish_api'] ?>">
					      <p class="help-block">  请注意，API密钥不是必需的，但请求数量将受到限制。您可以从 <a href="https://www.phishtank.com/developer_info.php" target="_blank">here</a>免费获得您的API密钥</p>
					    </div>
					  </div>						  	
						<hr>	
						<ul class="form_opt" data-id="captcha" data-callback="solvemedia">
							<li class="text-label">验证码<small> 码在处理他们的请求之前，用户会被提示回复验证码。如果您启用任何验证码，请确保添加您的密钥</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["captcha"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="<?php echo (($this->config["captcha"]=="1")?' current':'')?>" data-value="1">验证码</a></li>
							<li><a href=""class="first<?php echo (($this->config["captcha"]=="2")?' current':'')?>" data-value="2">Solvemedia</a></li>
						</ul>
						<input type="hidden" name="captcha" id="captcha" value="<?php echo $this->config["captcha"]?>">					  
						<p class="solvemedia alert alert-info" style="display: none;">
							To set up Solvemedia captcha, you must open the file includes/library/Solvemedia.php and fill in your keys where it says <strong>The solvemedia API Keys</strong>. Please note that the script will not work if you 启用 this and don't add your keys!
						</p>
						<div class="form-group">
					    <label for="captcha_public" class="col-sm-3 control-label">reCaptcha 公钥</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="captcha_public" id="captcha_public" value="<?php echo $this->config['captcha_public'] ?>">
					      <p class="help-block">您可以从 <a href="https://www.google.com/recaptcha" target="_blank">Google</a>免费获得您的公钥</p>
					    </div>
					  </div>				
						<div class="form-group">
					    <label for="captcha_private" class="col-sm-3 control-label">reCaptcha 私钥</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="captcha_private" id="captcha_private" value="<?php echo $this->config['captcha_private'] ?>">
					      <p class="help-block">您可以从<a href="https://www.google.com/recaptcha" target="_blank">Google</a>免费获得您的私钥</p>
					    </div>
					  </div>										
					</div><!-- /#security.tabbed -->
					<div id="payment" class="tabbed">
						<ul class="form_opt" data-id="pro">
							<li class="text-label">高级模块 <small> 启用此模块将允许您向用户收取高级功能。如果你想免费提供这些，请禁用此功能。</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["pro"])?' current':'')?>" data-value="0">禁用</a></li>	
							<li><a href="" class="first<?php echo (($this->config["pro"])?' current':'')?>" data-value="1">启用</a></li>			
						</ul>
						<input type="hidden" name="pro" id="pro" value="<?php echo $this->config["pro"]?>">		
						<?php if ($this->isExtended()): ?>
							<ul class="form_opt" data-id="pt">
								<li class="text-label">支付处理 <small>paypal和stripe之间选择。订阅只可能与stripe</small></li>
								<li><a href="" class="last<?php echo (($this->config["pt"] == "stripe")?' current':'')?>" data-value="stripe">Stripe</a></li>	
								<li><a href="" class="first<?php echo (($this->config["pt"] == "paypal")?' current':'')?>" data-value="paypal">Paypal</a></li>			
							</ul>
							<input type="hidden" name="pt" id="pt" value="<?php echo $this->config["pt"]?>">															
						<?php endif ?>														
						<hr>						
						<div class="form-group">
					    <label for="paypal_email" class="col-sm-3 control-label">PayPal 电子邮件</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="paypal_email" placeholder="myemail@host.com"  id="paypal_email" value="<?php echo $this->config['paypal_email'] ?>">
					      <p class="help-block"> 付款将发送到此地址。请确保您启用IPN并启用通知。您的IPN网址是 <strong><?php echo $this->config["url"] ?>/ipn</strong> 欲了解更多信息， <a href="https://developer.paypal.com/webapps/developer/docs/classic/products/instant-payment-notification/" target="_blank">请点击这里</a></p>
					    </div>
					  </div>	
					  <hr>
					  <?php if ($this->isExtended()): ?>
							<div class="form-group">
						    <label for="stpk" class="col-sm-3 control-label">Stripe 可发布密钥</label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" name="stpk" id="stpk" value="<?php echo $this->config['stpk'] ?>">
						      <p class="help-block">从这里得到你的Stripe一建登录 <a href="https://dashboard.stripe.com/account/apikeys" target="_blank">点击这里</a></p>
						    </div>
						  </div>	
							<div class="form-group">
						    <label for="stsk" class="col-sm-3 control-label">Stripe 秘密密钥</label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" name="stsk"  id="stsk" value="<?php echo $this->config['stsk'] ?>">
						      <p class="help-block"> 从这里得到你的Stripe一建登录<a href="https://dashboard.stripe.com/account/apikeys" target="_blank">点击这里</a></p>
						    </div>
						  </div>			
							<div class="form-group">
						    <label for="stripesig" class="col-sm-3 control-label">签名密钥</label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" name="stripesig" placeholder="whsec_..."  id="stripesig" value="<?php echo $this->config['stripesig'] ?>">
						      <p class="help-block">签名是一种安全措施，用于验证从条目传入的数据的真实性。强烈建议你把这个添加到安全措施中。你可以在添加一个网络钩子之后找到你的密钥。   <a href="https://dashboard.stripe.com/account/webhooks" target="_blank">点击这里找到你的签名密钥</a></p>
						    </div>
						  </div>							  	
						  <hr>				
					  <?php endif; ?>	  	 					  
						<div class="form-group">
					    <label for="currency" class="col-sm-3 control-label">货币</label>
					    <div class="col-sm-9">
					      <?php $currencies = Main::currency() ?>
					     <select name="currency" id="currency">
					      <?php foreach ($currencies as $code => $info): ?>
					      	<option value="<?php echo $code ?>" <?php if($this->config["currency"]==$code) echo "selected" ?>><?php echo $info["label"] ?></option>
					      <?php endforeach ?>
					      </select>
					  		<p class="help-block"><strong>注意</strong> 如果您已经订阅了会员，强烈建议您不要更改货币或会员费，因为Stripe不允许修改这些参数。该脚本将删除该计划并创建另一个计划！</p>	 					      
					    </div>
					  </div>		 			
						<div class="form-group">
					    <label for="pro_monthly" class="col-sm-3 control-label">每月会员费用</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="pro_monthly" id="pro_monthly" placeholder="￥ 4.99" value="<?php echo $this->config['pro_monthly'] ?>">
					  		<p class="help-block"><strong>注意</strong> 如果您已经订阅了会员，强烈建议您不要更改货币或会员费，因为Stripe不允许修改这些参数。该脚本将删除该计划并创建另一个计划！</p>	 
					    </div>
					  </div>		
						<div class="form-group">
					    <label for="pro_yearly" class="col-sm-3 control-label">每年会员费</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="pro_yearly" id="pro_yearly" placeholder="￥ 54.99" value="<?php echo $this->config['pro_yearly'] ?>">
					  		<p class="help-block"><strong>注意</strong>  如果您已经订阅了会员，强烈建议您不要更改货币或会员费，因为Stripe不允许修改这些参数。该脚本将删除该计划并创建另一个计划！</p>	 
					    </div>
					  </div>	
					  <hr>
						<div class="form-group">
					    <label for="freeurls" class="col-sm-3 control-label">免费用户网址</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="freeurls" id="freeurls" value="<?php echo $this->config['freeurls'] ?>">
					      <p class="help-block">免费网址的网址数量。0为无限制设置</p>
					    </div>
					  </div>						  
						<div class="form-group">
					    <label for="aliases" class="col-sm-3 control-label">优质别名</label>
					    <div class="col-sm-9">
					      <textarea name="aliases" class="form-control" rows="5"><?php echo $this->config["aliases"] ?></textarea>
					      <p class="help-block"> 要仅为专业会员保留一个别名，请将其添加到上面的列表中（用逗号分隔，每个名称之间没有空格）：google，apple，microsoft等。只有管​​理员和专业用户可以选择这些</p>
					    </div>
					  </div>						  		  		  					
					</div><!-- /#payment.tabbed -->	
					<div id="user" class="tabbed">
						<ul class="form_opt" data-id="user_r">
							<li class="text-label">用户注册 <small> 允许用户注册并为其URL添加书签。如果禁用注册链接将被隐藏</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["user"])?' current':'')?>" data-value="0">禁用</a></li>
							 <li><a href="" class="first<?php echo (($this->config["user"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="user" id="user_r" value="<?php echo $this->config["user"]?>">	

						<ul class="form_opt" data-id="user_activate">
							<li class="text-label">用户激活 <small>如果启用，包含激活链接的电子邮件将发送给用户</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["user_activate"])?' current':'')?>" data-value="0">禁用</a></li>
							 <li><a href="" class="first<?php echo (($this->config["user_activate"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="user_activate" id="user_activate" value="<?php echo $this->config["user_activate"]?>">	

						<ul class="form_opt" data-id="require_registration">
							<li class="text-label">需要注册 <small>如果启用，用户将需要创建一个帐户，然后才能缩短URL</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["require_registration"])?' current':'')?>" data-value="0">禁用</a></li>
							 <li><a href="" class="first<?php echo (($this->config["require_registration"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="require_registration" id="require_registration" value="<?php echo $this->config["require_registration"]?>">	

						<hr>
						<ul class="form_opt" data-id="fb_connect">
							<li class="text-label">启用 Facebook 登录 <small>用户可以使用他们的Facebook帐户登录并注册</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["fb_connect"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["fb_connect"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="fb_connect" id="fb_connect" value="<?php echo $this->config["fb_connect"]?>">
						<div class="form-group">
					    <label for="facebook_app_id" class="col-sm-3 control-label">Facebook App ID</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="facebook_app_id" id="facebook_app_id" value="<?php echo $this->config['facebook_app_id'] ?>">
					    </div>
					  </div>
						<div class="form-group">
					    <label for="facebook_secret" class="col-sm-3 control-label">Facebook 密匙</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="facebook_secret" id="facebook_secret" value="<?php echo $this->config['facebook_secret'] ?>">
					    </div>
					  </div>					  
						<hr>
						<ul class="form_opt" data-id="tw_connect">
							<li class="text-label">启用 Twitter 登录 <small>用户可以使用他们的Twitter帐户登录并注册</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["tw_connect"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["tw_connect"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="tw_connect" id="tw_connect" value="<?php echo $this->config["tw_connect"]?>">											
						<div class="form-group">
					    <label for="twitter_key" class="col-sm-3 control-label">Twitter 公钥</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="twitter_key" id="twitter_key" value="<?php echo $this->config['twitter_key'] ?>">
					    </div>
					  </div>
						<div class="form-group">
					    <label for="twitter_secret" class="col-sm-3 control-label">Twitter 密匙</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="twitter_secret" id="twitter_secret" value="<?php echo $this->config['twitter_secret'] ?>">
					    </div>
					  </div>
					  <hr>
						<ul class="form_opt" data-id="gl_connect">
							<li class="text-label">启用 Google 认证 <small> 用户可以使用他们的Google帐户登录并注册。确保填写下面的字段！</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["gl_connect"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["gl_connect"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="gl_connect" id="gl_connect" value="<?php echo $this->config["gl_connect"]?>">

						<div class="form-group">
					    <label for="google_cid" class="col-sm-3 control-label">Google ID</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="google_cid" id="google_cid" value="<?php echo $this->config['google_cid'] ?>">
					    </div>
					  </div>
						<div class="form-group">
					    <label for="google_cs" class="col-sm-3 control-label">Google 密匙</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="google_cs" id="google_cs" value="<?php echo $this->config['google_cs'] ?>">
					    </div>
					  </div>											  					
					</div><!-- /#user.tabbed -->
					<div id="ads" class="tabbed">
						<ul class="form_opt" data-id="ads">
							<li class="text-label">广告 <small>在整个网站上启用或停用广告</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["ads"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["ads"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="ads" id="ads" value="<?php echo $this->config["ads"]?>">				

						<ul class="form_opt" data-id="detectadblock">
							<li class="text-label">Adblock 检测 <small> 在重定向时启用或禁用adblock检测（splash和frame - 不适用于专业用户）</small></li>
							<li><a href="" class="last<?php echo ((!$this->config["detectadblock"])?' current':'')?>" data-value="0">禁用</a></li>
							<li><a href="" class="first<?php echo (($this->config["detectadblock"])?' current':'')?>" data-value="1">启用</a></li>
						</ul>
						<input type="hidden" name="detectadblock" id="detectadblock" value="<?php echo $this->config["detectadblock"]?>">	

						<div class="form-group">
					    <label for="a7" class="col-sm-3 control-label">广告 (728x90)</label>
					    <div class="col-sm-9">
					      <textarea class="form-control" name="ad728" id="a7" rows="5"><?php echo $this->config['ad728'] ?></textarea>
					      <div class="help-block">您可以使用以下代码在任何主题文件中显示此广告： <strong><?php echo htmlentities('<?php echo $this->ad(728) ?>') ?></strong></div>
					    </div>
					  </div>				
						<div class="form-group">
					    <label for="a4" class="col-sm-3 control-label">广告 (468x60)</label>
					    <div class="col-sm-9">
					      <textarea class="form-control" name="ad468" id="a4" rows="5"><?php echo $this->config['ad468'] ?></textarea>
					      <div class="help-block">您可以使用以下代码在任何主题文件中显示此广告： <strong><?php echo htmlentities('<?php echo $this->ad(468) ?>') ?></strong></div>
					    </div>
					  </div>				
						<div class="form-group">
					    <label for="a3" class="col-sm-3 control-label">广告 (300x250)</label>
					    <div class="col-sm-9">
					      <textarea class="form-control" name="ad300" id="a3" rows="5"><?php echo $this->config['ad300'] ?></textarea>
					      <div class="help-block">您可以使用以下代码在任何主题文件中显示此广告： <strong><?php echo htmlentities('<?php echo $this->ad(300) ?>') ?></strong></div>
					    </div>
					  </div>							
					</div><!-- /#ads.tabbed -->			
					<div id="tools" class="tabbed">
					  <div class="alert alert-info"><strong>提示:</strong> 建议使用SMTP，因为它比系统邮件模块更可靠。</div>
						<div class="form-group">
					    <label for="smtp" class="col-sm-3 control-label">SMTP主机</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="smtp[host]" value="<?php echo $this->config['smtp']['host'] ?>">
					    </div>
					  </div>				
						<div class="form-group">
					    <label for="smtp" class="col-sm-3 control-label">SMTP端口</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="smtp[port]" value="<?php echo $this->config['smtp']['port'] ?>">
					    </div>
					  </div>		
						<div class="form-group">
					    <label for="smtp" class="col-sm-3 control-label">SMTP 用户</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" name="smtp[user]" value="<?php echo $this->config['smtp']['user'] ?>">
					    </div>
					  </div>		
						<div class="form-group">
					    <label for="smtp" class="col-sm-3 control-label">SMTP 密码</label>
					    <div class="col-sm-9">
					      <input type="password" class="form-control" name="smtp[pass]" value="<?php echo $this->config['smtp']['pass'] ?>">
					    </div>
					  </div>										 
					</div><!-- /#tools.tabbed -->

				  <div class="form-group">
				    <div class="col-sm-12">
				    	<?php echo Main::csrf_token(TRUE) ?>
				    	<br>
				      <button type="submit" class="btn btn-primary">保存设置</button>
				    </div>
				  </div>
				</form>  			
  		</div>
  	</div>
  </div>
</div>