欢迎来到 <?php echo $site_name; ?>,

谢谢您加入 <?php echo $site_name; ?>.
登录绿奇异请点击链接：

<?php echo site_url('/auth/login/'); ?>

<?php if (strlen($username) > 0) { ?>

用户名： <?php echo $username; ?>
<?php } ?>

邮箱地址： <?php echo $email; ?>

<?php /* Your password: <?php echo $password; ?>

*/ ?>

祝您玩的愉快！
The <?php echo $site_name; ?> Team