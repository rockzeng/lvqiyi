Hi<?php if (strlen($username) > 0) { ?> <?php echo $username; ?><?php } ?>,

忘记了密码？请别担心。
修改密码，请点击下面的链接：

<?php echo site_url('/auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>


您收到这封邮件， 因为<?php echo $site_name; ?> 用户确认新邮箱地址。如果你是误收到，请别点击链接或者直接删除此邮件。


谢谢！
The <?php echo $site_name; ?> Team