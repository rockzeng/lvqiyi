欢迎来到 <?php echo $site_name; ?>,

非常感谢您加入 <?php echo $site_name; ?>.
请通过下面地址验证您的邮箱：

<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>


请在 <?php echo $activation_period; ?> 小时内验证您的邮箱地址，否则你的注册将为无效注册，您将需要重新注册。
<?php if (strlen($username) > 0) { ?>

用户名： <?php echo $username; ?>
<?php } ?>

邮箱地址： <?php echo $email; ?>
<?php if (isset($password)) { /* ?>

Your password: <?php echo $password; ?>
<?php */ } ?>



祝您玩的愉快！
The <?php echo $site_name; ?> Team