<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Tiêu đề</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<style>
div {
    background-color: blue;
    float: left;
    margin-right: 20px;
    height: 100px;
    width: 100px;
}
p {
    clear: both;
}
</style>
<script>
$(function(){
    $('button').click(function(){
        $('.swing').hide(2000,'swing',function(){
            $('span.txtSwing').text('Đã ẩn - swing');
        });
        
        $('.linear').hide(2000,'linear',function(){
            $('span.txtLinear').text('Đã ẩn - linear');
        });
    });
});
</script>
</head>

<body>
<p><button>Click</button></p>
<p><span class="txtSwing"></span></p>
<p><span class="txtLinear"></span></p>
<div class="swing">hide swing</div>
<div class="linear">hide linear</div>
</body>
</html>