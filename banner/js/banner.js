var time=null;
//记录当前位子
var nexImg = 0;
//用于获取轮播图图片个数
var imgLength = $("#fist_banner .banner ul li").length;
//当时动态数据的时候使用,上面那个删除
// var imgLength =0;
//设置底部第一个按钮样式
$("#fist_banner .jumpBtn ul li[jumpImg="+nexImg+"]").css("background-color","black");

//页面加载
$(document).ready(function(){
    // dynamicData();
    //启动定时器,设置时间为3秒一次
    time =setInterval(intervalImg,3000);
});

//点击上一张
$(".preImg").click(function(){
    //清楚定时器
    clearInterval(time);
    var nowImg = nexImg;
    nexImg = nexImg-1;
    console.log(nexImg);
    if(nexImg<0){
        nexImg=imgLength;
    }
    //底部按钮样式设置
    $("#fist_banner .jumpBtn ul li").css("background-color","white");
    $("#fist_banner .jumpBtn ul li[jumpImg="+nexImg+"]").css("background-color","black");

    //将当前图片试用绝对定位,下一张图片试用相对定位
    $("#fist_banner  .banner ul img").eq(nowImg).css("position","absolute");
    $("#fist_banner  .banner ul img").eq(nexImg).css("position","relative");

    //轮播淡入淡出
    $("#fist_banner  .banner ul li").eq(nexImg).css("display","block");
    $("#fist_banner  .banner ul li").eq(nexImg).stop().animate({"opacity":1},1000);
    $("#fist_banner  .banner ul li").eq(nowImg).stop().animate({"opacity":0},1000,function(){
        $("#fist_banner  ul li").eq(nowImg).css("display","none");
    });

    //启动定时器,设置时间为3秒一次
    time =setInterval(intervalImg,3000);
})

//点击下一张
$(".nexImg").click(function(){
    clearInterval(time);
    intervalImg();
    time =setInterval(intervalImg,3000);
})

//轮播图
function intervalImg(){
    if(nexImg<=imgLength-1){
        nexImg++;
    }else{
        nexImg=0;
    }
   console.log(nexImg);
   console.log('banner的time:'+time);
    //将当前图片试用绝对定位,下一张图片试用相对定位
    $("#fist_banner  .banner ul img").eq(nexImg-1).css("position","absolute");
    $("#fist_banner  .banner ul img").eq(nexImg).css("position","relative");

    $("#fist_banner  .banner ul li").eq(nexImg).css("display","block");
    $("#fist_banner  .banner ul li").eq(nexImg).stop().animate({"opacity":1},1000);
    $("#fist_banner  .banner ul li").eq(nexImg-1).stop().animate({"opacity":0},1000,function(){
        $("#fist_banner  .banner ul li").eq(nexImg-1).css("display","none");
    });
    $("#fist_banner  .jumpBtn ul li").css("background-color","white");
    $("#fist_banner  .jumpBtn ul li[jumpImg="+nexImg+"]").css("background-color","black");
}

//轮播图底下按钮
//动态数据加载的试用应放在请求成功后执行该代码,否则按钮无法使用
$("#fist_banner  .jumpBtn ul li").each(function(){
    //为每个按钮定义点击事件
    $(this).click(function(){
        clearInterval(time);
        $("#fist_banner  .jumpBtn ul li").css("background-color","white");
        jumpImg = $(this).attr("jumpImg");
        if(jumpImg!=nexImg){
            var after =$("#fist_banner  .banner ul li").eq(jumpImg);
            var befor =$("#fist_banner  .banner ul li").eq(nexImg);

            //将当前图片试用绝对定位,下一张图片试用相对定位
            $("#fist_banner  .banner ul img").eq(nexImg).css("position","absolute");
            $("#fist_banner  .banner ul img").eq(jumpImg).css("position","relative");

            after.css("display","block");
            after.stop().animate({"opacity":1},1000);
            befor.stop().animate({"opacity":0},1000,function(){
                befor.css("display","none");
            });
            nexImg=jumpImg;
        }
        $(this).css("background-color","black");
        time =setInterval(intervalImg,3000);
    });
});