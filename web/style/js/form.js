$(function(){
    $(".form_submit").click(function(e){
        e.preventDefault();
        var user_name = $("#user_name").val();
        var passwd1 = $("#password").val();
        var passwd2 = $("#password2").val();
        var nick_name = $("#nick_name").val();
        var email = $("#email").val();
        //检查账号
        if(user_name.length < 1){
            alert("账号不能为空");
            return false;
        }
        var ajax_result = true;
        $.ajax({
            "url" : check_user_url,
            async : false,
            "type" : "POST",
            "dataType" : "json",
            "data"  : {"name" : user_name},
            "success" : function(data){
                console.log(data);
                if(data.result == true){
                    ajax_result = false;
                }
            }
        });
        if(ajax_result == false){
            alert(user_name + "已经存在");
            return false;
        }

        //密码检测
        if(passwd1.length < 1 || passwd2.length < 1){
            alert("密码或者重复密码不能为空");
            return false;
        }
        if(passwd1 != passwd2){
            alert("请保持2次输入的密码一致");
            return false;
        }
        //昵称检查
        if(nick_name.length < 1){
            alert("昵称不能为空");
            return false;
        }
        //邮件检查
        if(email.length < 1){
            alert("邮件不能空");
            return false;
        }
        //邮件格式检查
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(email)){
            alert("邮件格式不正确");
            return false;
        }
        //提交表单
        $(this).closest('form')[0].submit();
        return true;
    });


    $("#user_edit").click(function(e){
        e.preventDefault();
        var user_name = $("#user_name").val();
        var nick_name = $("#nick_name").val();
        var email = $("#email").val();
        //检查账号
        if(user_name.length < 1){
            alert("账号不能为空");
            return false;
        }
        //昵称检查
        if(nick_name.length < 1){
            alert("昵称不能为空");
            return false;
        }
        //邮件检查
        if(email.length < 1){
            alert("邮件不能空");
            return false;
        }
        //邮件格式检查
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(email)){
            alert("邮件格式不正确");
            return false;
        }
        //提交表单
        $(this).closest('form')[0].submit();
        return true;
    });

});