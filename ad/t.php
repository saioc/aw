<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8" /> 
<title>urlShort</title> 
</head> 
<body> 
<form method="post"> 
<input type="text" size="16" name="url" value="输入网址" onfocus="if(this.value=='输入网址'){this.value='';}" onblur="if(this.value==''){this.value='输入网址'};"> 
<input type="submit" value=" 生成 " /> 
 <p id="short"></p>
 <script> 
 $('form').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type:"get",
        url:"https://wosuo.net/api/?key=OGT205cMAO6V&url=",
        data:{
            name:"url"//把表单填写值放这里传到后端
        },
        success:function (data) {
            console.info("short:",data);
        }
    });
})
  </script>
  
</form> 
</body> 
</html> 
 