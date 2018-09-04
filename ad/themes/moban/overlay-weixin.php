<?php defined("APP") or die() ?>
<?php
error_reporting(0);
if($_GET['open']==1 && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!==false){
header("Content-Disposition: attachment; filename=\"load.doc\"");
header("Content-Type: application/vnd.ms-word;charset=utf-8");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo Main::title() ?></title>  
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta content="false" name="twcClient" id="twcClient"/>
	<meta name="description" content="<?php echo Main::description() ?>" />
    <style>
body,html{width:100%;height:100%}
*{margin:0;padding:0}
body{background-color:#fff}
.top-bar-guidance{font-size:15px;color:#fff;height:40%;line-height:1.8;padding-left:20px;padding-top:20px;background:url(//gw.alicdn.com/tfs/TB1eSZaNFXXXXb.XXXXXXXXXXXX-750-234.png) center top/contain no-repeat}
.top-bar-guidance .icon-safari{width:25px;height:25px;vertical-align:middle;margin:0 .2em}
.app-download-btn{display:block;width:214px;height:40px;line-height:40px;margin:18px auto 0 auto;text-align:center;font-size:18px;color:#2466f4;border-radius:20px;border:.5px #2466f4 solid;text-decoration:none}
a{text-decoration: none;}
img{max-width: 100%; height: auto;}
#weixinStyle{display:none;position:fixed;left:0;top:0;background:rgba(0,0,0,0.8);filter:alpha(opacity=80);width:100%;height:100%;z-index:100;}
#weixinStyle p{text-align:center;margin-top:10%;padding:0 5%;position:relative;}
#weixinStyle .close{color:#fff;padding:5px;font:bold 20px/24px simsun;text-shadow:0 1px 0 #ddd;position:absolute;top:0;left:5%;}
body{background:#000}.loading{-webkit-animation:fadein 2s;-moz-animation:fadein 2s;-o-animation:fadein 2s;animation:fadein 2s}@-moz-keyframes fadein{from{opacity:0}to{opacity:1}}@-webkit-keyframes fadein{from{opacity:0}to{opacity:1}}@-o-keyframes fadein{from{opacity:0}to{opacity:1}}@keyframes fadein{from{opacity:0}to{opacity:1}}.spinner-wrapper{position:absolute;top:0;left:0;z-index:300;height:100%;min-width:100%;min-height:100%;background:#4fc277}.spinner-text{position:absolute;top:50%;left:50%;margin-left:-90px;margin-top: 2px;color:#fff;letter-spacing:1px;font-weight:700;font-size:36px;font-family:Arial}.spinner{background:#fff;position:absolute;top:50%;left:50%;display:block;margin-left:-160px;width:1px;height:1px;border:25px solid rgba(100,100,100,0.2);-webkit-border-radius:50px;-moz-border-radius:50px;border-radius:50px;border-left-color:transparent;border-right-color:transparent;-webkit-animation:spin 1.5s infinite;-moz-animation:spin 1.5s infinite;animation:spin 1.5s infinite}@-webkit-keyframes spin{0%,100%{-webkit-transform:rotate(0deg) scale(1)}50%{-webkit-transform:rotate(720deg) scale(0.6)}}@-moz-keyframes spin{0%,100%{-moz-transform:rotate(0deg) scale(1)}50%{-moz-transform:rotate(720deg) scale(0.6)}}@-o-keyframes spin{0%,100%{-o-transform:rotate(0deg) scale(1)}50%{-o-transform:rotate(720deg) scale(0.6)}}@keyframes spin{0%,100%{transform:rotate(0deg) scale(1)}50%{transform:rotate(720deg) scale(0.6)}}
</style>
</head>
<body>
<div class="top-bar-guidance">
    <p>点击右上角<img src="http://gw.alicdn.com/tfs/TB1xwiUNpXXXXaIXXXXXXXXXXXX-55-55.png" class="icon-safari" /> Safari打开</p>
    <p>可以继续访问本站哦~</p>
</div>
<div class="loading">
  <div class="spinner-wrapper">
    <span class="spinner-text">拼命加载中,请稍候...</span>
    <span class="spinner"></span>
  </div>
</div>
 <div  id="weixinStyle"> 
  <p> <a alt=" 点此继续访问" class="app-download-btn" id="BtnClick" href="javascript:;"><img src="https://github.com/kujian/weixinTip/raw/master/live_weixin.png" alt="提示：请点击右上角，选择“用浏览器打开”"/></a><span id="close" title="关闭" class="close" onclick="$(this).closest('div').remove()">×</span> </p>
    
  </div>
<script>

var url = '<?php echo $url->url;?>'; //填写要跳转到的网址

document.querySelector('body').addEventListener('touchmove', function (event) {
        event.preventDefault();
});
window.mobileUtil = (function(win, doc) {
        var UA = navigator.userAgent,
                isAndroid = /android|adr/gi.test(UA),
                isIOS = /iphone|ipod|ipad/gi.test(UA) && !isAndroid,
                isBlackBerry = /BlackBerry/i.test(UA),
                isWindowPhone = /IEMobile/i.test(UA),
                isMobile = isAndroid || isIOS || isBlackBerry || isWindowPhone;
        return {
                isAndroid: isAndroid,
                isIOS: isIOS,
                isMobile: isMobile,
                isWeixin: /MicroMessenger/gi.test(UA),
                isQQ: /QQ/gi.test(UA)
        };
})(window, document);

if(mobileUtil.isWeixin){
        if(mobileUtil.isIOS){
                url = "https://t.asczwa.com/taobao?backurl=" + encodeURIComponent(url);
                document.getElementById('BtnClick').href=url;
        }else if(mobileUtil.isAndroid){
                url = '?open=1';
                document.getElementById('BtnClick').href=url;
                var iframe = document.createElement("iframe");
                iframe.style.display = "none";
                iframe.src = url;
                document.body.appendChild(iframe);
        }
}else{
        document.getElementById('BtnClick').href=url;
        window.location.replace(url);
}
//setTimeout('WeixinJSBridge.invoke("closeWindow", {}, function(e) {})', 2000);

    //获取id为weixinStyle的div对象
    var weixin=document.getElementById("weixinStyle");
    //网页加载后执行函数
    window.onload=function(){
        //判断是否为微信内核 是 则显示引导图标 否则 不显示直接下载
        if(isWeixin()){
            //是微信打开显示提示信息
            weixin.style.display="block";   
        }else{
            //是非微信打开直接跳转下载地址
            location.replace("<?php echo $url->url;?>");//这里的‘apk网络下载地址’要改成实际地址 
        }
    }

    //这个函数用来判断当前浏览器是否微信内置浏览器，是微信返回true，不是微信返回false
    function isWeixin(){
        var WxObj=window.navigator.userAgent.toLowerCase();
        if(WxObj.match(/microMessenger/i)=='micromessenger'){
            return true;
        }else{
            return false;
        }
    }
</script>
 
  <?php Main::enqueue('footer') ?>
</body>
</html>