<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎来到绿奇异</title>
<link href="<?php echo base_url(); ?>application/assets/css/cubetboard.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>application/assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>application/scripts/jquery-ui-1.8.1.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">

        function register()
        {
            //The complect form values on submit
            dataString = $("#register_form").serialize();
            //username            = document.getElementById("username").value;
            var email               = document.getElementById("email").value;


            //check for validation
            //$('#errorusername').html("")
            $('#erroremail').html("")
//
//            if(username=="")
//            {
//                $('#errorusername').html("please enter a value!")
//                var failed= true;
//            }

            normal = '<?php echo $normal_entry;?>';
            if(normal==1)
            {
                $('#errorpass1').html("")
                $('#errorpass2').html("")
                $('#errorfirstname').html("")
                $('#errorlastname').html("")
                $('#errorimg').html("")
                firstname           = document.getElementById("firstname").value;
                lastname            = document.getElementById("lastname").value;
                pass1               = document.getElementById("pass1").value;
                pass2               = document.getElementById("pass2").value;
                img                 = document.getElementById("file").value;

                if(pass1=="")
                {
                    $('#errorpass1').html("请输入密码！")
                    var failed= true;
                }
                if(pass2=="")
                {
                    $('#errorpass2').html("请确认密码！")
                    var failed= true;
                }
                 if(pass1!=pass2)
                {
                        $("#message_added").show();
                        $('#message_added').html("password missmatch!") ;
                        return false;
                }
                if(firstname=="")
                {
                    $('#errorfirstname').html("请输入姓！")
                    var failed= true;
                }
                if(lastname=="")
                {
                    $('#errorlastname').html("请确认名！")
                    var failed= true;
                }
                if(img!='')
                {
                     image = img.toString().split(".");

                     if((image[1]!='png')&&(image[1]!='jpg')&&(image[1]!='gif')&&(image[1]!='jpeg')&&(image[1]!='PNG')&&(image[1]!='GIF')&&(image[1]!='JPG')&&(image[1]!='JPEG'))
                     {
                        $('#errorimg').html('无效的头像！');
                         var failed= true;
                     }
                }
            }
            if(email=="")
            {
                $('#erroremail').html("请输入Email地址！")
                var failed= true;
            }
            else{

                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email))
                {
                     $('#erroremail').html("无效的Email地址！")
                      var failed= true;
                }


                var login_with    =  '<?php echo $login_with;?>';
                if(login_with=='facebook')
                {

                    var orginal_email = '<?php echo $orginal_email;?>';
                    if(orginal_email!=null)
                    {
                        if(email!=orginal_email)
                        {     //alert(email)
                            //alert(orginal_email)
                              $('#erroremail').html("此邮箱不能注册 "+login_with+ " 账户。")
                              var failed= true;
                        }
                    }

                }
                var o = <?php echo json_encode($emailList ); ?>;
                for (key in o){
                    if(o[key]==email){
                            $('#erroremail').html("此Email已存在！")
                            var failed= true;
                    }
                }


            }

            //return false on validation failure
            if(failed==true)
                return false;

             setTimeout(function() {
                            $('#message_added').fadeOut("slow");
                        }, 5000);

            }
     </script>
</head>

<body>
<div class="outer">
    <div class="header"><!-- starting Header -->
        <div class="container"><!-- starting container -->
            <div class="header_box">
               <div class="logo"><a href="<?php echo site_url();?>"><img src="<?php echo site_url()?>/application/assets/images/cubetboard/logo.png"/></a></div>
            </div>
        </div><!-- closing container -->
    </div><!-- closing Header -->
    <div class="white_strip"></div>

    <div class="clear"></div>

    <div class="middle-banner_bg"><!-- staing middlebanner -->
        <div class="container"><!-- staing container -->
            
            <?php if(isset($check_entry)&&($check_entry==true)):?>
            <div class="alert_messgae">
              <h2>此用户名已被占用，请使用别的用户名！</h2>
            </div>
                <?php elseif(isset($message)):?>
            <div class="alert_messgae">
               <h2><?php echo $message;?></h2>
            </div>
            <?php else:?>



<!--            <form id="register_form" class="Form StaticForm" method="post" enctype="multipart/form-data" onsubmit="return register()" action="/ci/pinterest/invite/register">-->
<form id="register_form" class="Form StaticForm" method="post" enctype="multipart/form-data" onsubmit="return register()" action="<?php echo site_url('invite/register'); ?>">
            <div class="editprofile_insidebox">

                <span class="reg_form">
                    <h3>使用<?php echo $login_with; ?>注册</h3>
               <ul>
                   <?php if(($normal_entry==1)):?>
                    <li>
                        <label class="label">姓</label>
                        <input type="text" class="firstname" id="firstname" name="firstname" value=""/>
                        <div class="validation-message" id="errorfirstname" ></div>
                    </li>
                    <li>
                        <label  class="label" >名</label>
                        <input type="text" class="lastname" id="lastname" name="lastname" value=""/>
                        <div class="validation-message" id="errorlastname" ></div>
                    </li>
                    <li>
                        <label  class="label" >请输入密码：</label>
                        <input type="password" class="email" id="pass1" name="pass1" value=""/>
                        <div class="validation-message" id="errorpass1" ></div>
                    </li>
                    <li>
                        <label  class="label" >请再确认密码：</label>
                        <input type="password" class="email" id="pass2" name="pass2" />
                        <div class="validation-message"  id="errorpass2"></div>
                        <div class="validation-message" id="message_added"></div>
                    </li>
                    <li>
                        <label  class="label" >请上传头像</label>
                        <input type="file" class="file" id="file" name="file" value=""/>
                        <div class="validation-message" id="errorimg"></div>
                    </li>
                    <?php endif?>
    <!--                            <li>
                         <label  class="label" >User name</label>
                        <input type="text" class="username" id="username" name="username" value=""/>
                        <div class="validation-message" id="errorusername" style="color:red;"></div>
                    </li>-->
                    <li>
                        <label  class="label" >Email地址：</label>
                        <input type="text" class="email" id="email" name="email" value="<?php echo $email?>"/>
                        <div class="validation-message" id="erroremail" ></div>
                    </li>

                    <li>
                         <label  class="description-label" >个人介绍：</label>
                        <textarea class="description" id="description" name="description" value=""></textarea>
                    </li>
                    <li>
                        <label  class="label" >家庭地址：</label>
                        <input type="text" class="location" id="location" name="location" value=""/>
                    </li>
                    
                    <div><input id="SendInvites" class="Button2 Button13 WhiteButton" type="submit"  value="注册" name="submit"/></div>
                </ul>
              </span>
            </div>
       </form>
       <?php endif;?>
    </div><!-- closing container -->
</div><!-- closing middlebanner -->
    <?php $this->load->view('footer');?>

</div>
</body>
</html>