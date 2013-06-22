Hi<?php if (strlen($username) > 0) { ?> <?php echo $username; ?><?php } ?>,

变更 <?php echo $site_name; ?> 上的邮箱地址.
请点击下面的链接确认新的邮箱地址：

<?php echo site_url('/auth/reset_email/'.$user_id.'/'.$new_email_key); ?>


邮箱地址： <?php echo $new_email; ?>


您收到这封邮件， 因为 <?php echo $site_name; ?> 用户确认新邮箱地址。如果你是误收到，请别点击链接或者直接删除此邮件。


谢谢！
The <?php echo $site_name; ?> Team