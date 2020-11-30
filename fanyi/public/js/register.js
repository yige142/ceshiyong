/**
 * Created by Administrator on 2018/4/15 0015.
 */
$(document).ready(function(){

});

function ajaxPost(){
    var password=$('#password').val();
    var password2=$('#password2').val();
    //判断两次密码是否正确
    if(password!==password2){
        alert('两次输入密码不准确');
        return false;
    }

    $.ajax({
        type:"POST",
        url:SCOPE['add_user'],
        data:{
            user_name:$('#user_name').val(),
            code:$('#code').val(),
            password:password,
            mobile_phone:$('#mobile_phone').val()
        },
        success:function(data){
           // alert($('user_name').val());
            if(data==1){
                alert('恭喜，注册成功！');
                    //$('#user_name').val(''),
                    //$('#code').val(''),
                    //$('#password').val(''),
                    //$('#mobile_phone').val('');
                window.location.href = SCOPE['index'];
            }else if(data==-1){
                alert('对不起，验证码不正确');
                history.back(-1);
            }else if(data==0){
                alert('对不起，填写的数据不能为空');
            }
        }
    });

}
//点击刷新验证码
function refreshVerify(){
    var ts = Date.parse(new Date())/1000;
    $('.code_img').attr("src", "/home/captcha?id="+ts);
}