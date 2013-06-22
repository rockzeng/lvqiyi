Hi<?php if (strlen($username) > 0) { ?> <?php echo $username; ?><?php } ?>,

需要修改密码？
请牢记修改后的密码。
<?php if (strlen($username) > 0) { ?>

用户名： <?php echo $username; ?>
<?php } ?>

邮箱地址： <?php echo $email; ?>

<?php /* Your new password: <?php echo $new_password; ?>

*/ ?>

谢谢！
The <?php echo $site_name; ?> Team