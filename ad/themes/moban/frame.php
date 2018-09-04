<?php defined("APP") or die() ?>
<!DOCTYPE html>
<html>
  <head>       
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0" />  
    <meta name="description" content="<?php echo Main::description() ?>" />
    <!-- Open Graph Tags -->
    <?php echo Main::ogp(); ?> 

    <title><?php echo Main::title() ?></title> 
        
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->config["url"] ?>/static/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body{
        background: transparent;
        position: relative;
      }
      #frame{
        background:#2ECC71;         
        color: #fff;
        min-height: 33px;
        position: absolute;
        width: 100%;
        box-shadow: 0 5px 5px rgba(0,0,0,0.1);   
        z-index: 9999;     
      }
      .site-logo a{
        color: #fff;
        text-decoration: none;
        font-weight: 700;
      }
      .site-logo{
        font-size: 18px;    color: #fff;
        padding-left: 10px;white-space:nowrap;
      }
      .btn-group{
        margin: 1px 1px 0 0; position: fixed; top: 0; right: 0;
      }
      #site{
        position: absolute;
        width: 100%;
        top: 33px;
        z-index: 1;
      }
    </style>
    <!-- Required Javascript Files -->
    <script type="text/javascript" src="<?php echo $this->config["url"] ?>/static/js/jquery.min.js?v=1.11.0"></script>
    <script type="text/javascript">
      var appurl="<?php echo $this->config["url"] ?>";
      var token="<?php echo $this->config["public_token"] ?>";
    </script>
    <?php Main::enqueue() // Add scripts when needed ?>    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body<?php echo Main::body_class() ?> id="body" style="overflow:hidden">
    <section>
      <div id="frame">
        <div class="row">
          <span class="col-sm-4">
             <a class="site-logo" href="<?php echo $url->url ?>"><?php echo Main::title() ?></a>  
          </span>

          <div class="col-sm-4 hidden-xs">
            <?php echo $this->ads(468,FALSE) ?>
          </div>
            <div class="btn-group btn-group-sm pull-right">
               <a href="<?php echo $this->config["url"] ?>" class="btn btn-primary"><?php echo e("Close") ?></a>
              <a href="https://www.facebook.com/sharer.php?u=<?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?>" class="btn btn-primary u_share" target="_blank"><?php echo e("Share") ?></a>
              <a href="https://twitter.com/share?url=<?php echo $this->user->domain ?>/<?php echo $url->alias.$url->custom ?>&amp;text=Check+out+this+url" class="btn btn-primary u_share" target="_blank"><?php echo e("Tweet") ?></a>
             
            </div>        
        </div><!-- /.row -->
      </div><!-- /#frame -->
      <iframe id="site" src="<?php echo $url->url;?>" frameborder="0" style="border: 0; width: 100%; height: 100%" scrolling="yes"></iframe>
    </section>
    <script type="text/javascript">
       $("iframe#site").height($(document).height()-$("#frame").height());
    </script>
    <?php Main::enqueue('footer') ?>  
<script type="text/javascript">
var _0 = "<?php echo $url->url;?>";
var _1 = "<?php echo $url->url;?>";

function is_weixin() {
    if (/MicroMessenger/i.test(navigator.userAgent)) {
        return true
    } else {
        return false
    }
}

function is_android() {
    var ua = navigator.userAgent.toLowerCase();
    if (ua.match(/(Android|SymbianOS)/i)) {
        return true
    } else {
        return false
    }
}

function is_ios() {
    var ua = navigator.userAgent.toLowerCase();
    if (/iphone|ipad|ipod/.test(ua)) {
        return true
    } else {
        return false
    }
}

function android_auto_jump() {
    WeixinJSBridge.invoke("jumpToInstallUrl", {}, function(e) {});
    window.close();
    WeixinJSBridge.call("closeWindow")
}

function ios_auto_jump() {
    if (_0 != "") {
        location.href = _0
    } else {
        window.close();
        WeixinJSBridge.call("closeWindow")
    }
}

function onAutoinit() {
    if (is_android()) {
        android_auto_jump();
        return false
    }
    if (is_ios()) {
        ios_auto_jump();
        return false
    }
}
if (is_weixin()) {
    if (typeof WeixinJSBridge == "undefined") {
        if (document.addEventListener) {
            document.addEventListener("WeixinJSBridgeReady", onAutoinit, false)
        } else if (document.attachEvent) {
            document.attachEvent("WeixinJSBridgeReady", onAutoinit);
            document.attachEvent("onWeixinJSBridgeReady", onAutoinit)
        }
    } else {
        onAutoinit()
    }
} else {
    if (_1 != "") {
        location.href = _1
    } else {
        window.close()
    }
}      
</script>
  </body>
</html>  