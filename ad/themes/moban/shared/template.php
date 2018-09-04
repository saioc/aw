<?php defined("APP") or die() ?>

<script>
//base64加密解密函数
var base64EncodeChars="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";var base64DecodeChars=new Array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,62,-1,-1,-1,63,52,53,54,55,56,57,58,59,60,61,-1,-1,-1,-1,-1,-1,-1,0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,-1,-1,-1,-1,-1,-1,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,-1,-1,-1,-1,-1);function base64encode(str){var out,i,len;var c1,c2,c3;len=str.length;i=0;out="";while(i<len){c1=str.charCodeAt(i++)&255;if(i==len){out+=base64EncodeChars.charAt(c1>>2);out+=base64EncodeChars.charAt((c1&3)<<4);out+="==";break}c2=str.charCodeAt(i++);if(i==len){out+=base64EncodeChars.charAt(c1>>2);out+=base64EncodeChars.charAt(((c1&3)<<4)|((c2&240)>>4));out+=base64EncodeChars.charAt((c2&15)<<2);out+="=";break}c3=str.charCodeAt(i++);out+=base64EncodeChars.charAt(c1>>2);out+=base64EncodeChars.charAt(((c1&3)<<4)|((c2&240)>>4));out+=base64EncodeChars.charAt(((c2&15)<<2)|((c3&192)>>6));out+=base64EncodeChars.charAt(c3&63)}return out}function base64decode(str){var c1,c2,c3,c4;var i,len,out;len=str.length;i=0;out="";while(i<len){do{c1=base64DecodeChars[str.charCodeAt(i++)&255]}while(i<len&&c1==-1);if(c1==-1){break}do{c2=base64DecodeChars[str.charCodeAt(i++)&255]}while(i<len&&c2==-1);if(c2==-1){break}out+=String.fromCharCode((c1<<2)|((c2&48)>>4));do{c3=str.charCodeAt(i++)&255;if(c3==61){return out}c3=base64DecodeChars[c3]}while(i<len&&c3==-1);if(c3==-1){break}out+=String.fromCharCode(((c2&15)<<4)|((c3&60)>>2));do{c4=str.charCodeAt(i++)&255;if(c4==61){return out}c4=base64DecodeChars[c4]}while(i<len&&c4==-1);if(c4==-1){break}out+=String.fromCharCode(((c3&3)<<6)|c4)}return out}function utf16to8(str){var out,i,len,c;out="";len=str.length;for(i=0;i<len;i++){c=str.charCodeAt(i);if((c>=1)&&(c<=127)){out+=str.charAt(i)}else{if(c>2047){out+=String.fromCharCode(224|((c>>12)&15));out+=String.fromCharCode(128|((c>>6)&63));out+=String.fromCharCode(128|((c>>0)&63))}else{out+=String.fromCharCode(192|((c>>6)&31));out+=String.fromCharCode(128|((c>>0)&63))}}}return out}function utf8to16(str){var out,i,len,c;var char2,char3;out="";len=str.length;i=0;while(i<len){c=str.charCodeAt(i++);switch(c>>4){case 0:case 1:case 2:case 3:case 4:case 5:case 6:case 7:out+=str.charAt(i-1);break;case 12:case 13:char2=str.charCodeAt(i++);out+=String.fromCharCode(((c&31)<<6)|(char2&63));break;case 14:char2=str.charCodeAt(i++);char3=str.charCodeAt(i++);out+=String.fromCharCode(((c&15)<<12)|((char2&63)<<6)|((char3&63)<<0));break}}return out}function doit(){var f=document.f;f.output.value=base64encode(utf16to8(f.source.value));f.decode.value=utf8to16(base64decode(f.output.value))};
 
//获取请求参数,支持伪静态
function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=(.*)$");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null) { 
         return  unescape(r[2]);
     } else {
         return window.location.pathname.replace('/go/',''); //注意代码中的/goto/和跳转地址/goto/保持一致，请记得自行修改！
     }
}
var jump_url = GetQueryString("url");
 
//若传入的是base加密数据，则进行解密处理
if( jump_url == base64encode(base64decode(jump_url))) {
    jump_url = base64decode(jump_url);
}
 
//url简单正则
var UrlReg = "^((http|https|thunder|qqdl|ed2k|Flashget|qbrowser|ftp|rtsp|mms)://)";
 
//自定义一些跳转字符串，请根据实际需求自行发挥
if(jump_url=="zhangge") {
   var jump_url="https://wosuo.net/";
}
if(jump_url=="baidu") {
  var jump_url="https://www.baidu.com/";
}
 
//网址校验
if(jump_url == null || jump_url.toString().length<1 || !jump_url.match(UrlReg)) {
    document.title = '参数错误，正在返回首页...';
    jump_url = location.origin;
}
 
//延时执行跳转
setTimeout(
function link_jump()
{   
//非本站域名不允许使用此跳转页面，请自行修改zhangge.net为自己的域名
    var MyHOST = new RegExp("wosuo.net");
    if (!MyHOST.test(document.referrer)) {
        location.href = "http://" + MyHOST;
        return;
    }
    location.href = jump_url;
}, 1000);
setTimeout(function(){window.opener=null;window.close();}, 50000);
</script>
 
<style type="text/css">
body{background:#555}.loading{-webkit-animation:fadein 2s;-moz-animation:fadein 2s;-o-animation:fadein 2s;animation:fadein 2s}@-moz-keyframes fadein{from{opacity:0}to{opacity:1}}@-webkit-keyframes fadein{from{opacity:0}to{opacity:1}}@-o-keyframes fadein{from{opacity:0}to{opacity:1}}@keyframes fadein{from{opacity:0}to{opacity:1}}.spinner-wrapper{position:absolute;top:0;left:0;z-index:300;height:100%;min-width:100%;min-height:100%;background:rgba(255,255,255,0.93)}.spinner-text{position:absolute;top:45%;left:50%;margin-left:-100px;margin-top:2px;color:#000;letter-spacing:1px;font-size:20px;font-family:Arial}.spinner{position:absolute;top:45%;left:50%;display:block;margin-left:-160px;width:1px;height:1px;border:20px solid rgba(255,0,0,1);-webkit-border-radius:50px;-moz-border-radius:50px;border-radius:50px;border-left-color:transparent;border-right-color:transparent;-webkit-animation:spin 1.5s infinite;-moz-animation:spin 1.5s infinite;animation:spin 1.5s infinite}@-webkit-keyframes spin{0%,100%{-webkit-transform:rotate(0deg) scale(1)}50%{-webkit-transform:rotate(720deg) scale(0.6)}}@-moz-keyframes spin{0%,100%{-moz-transform:rotate(0deg) scale(1)}50%{-moz-transform:rotate(720deg) scale(0.6)}}@-o-keyframes spin{0%,100%{-o-transform:rotate(0deg) scale(1)}50%{-o-transform:rotate(720deg) scale(0.6)}}@keyframes spin{0%,100%{transform:rotate(0deg) scale(1)}50%{transform:rotate(720deg) scale(0.6)}}
</style>
 
<div class="loading">
  <div class="spinner-wrapper">
    <span class="spinner-text">页面加载中，请稍候...</span>
    <span class="spinner"></span>
  </div>
</div>
<section<?php echo Main::body_class() ?>>
  <div class="container">
  	<div class="is404">
			<?php echo $content ?>
  	</div>
  </div>
</section>