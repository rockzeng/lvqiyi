<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>欢迎来到 <?php echo $site_name; ?>!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">欢迎来到 <?php echo $site_name; ?>!</h2>
非常感谢您加入 <?php echo $site_name; ?>. <br />
请通过下面地址验证您的邮箱：<br />
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;">完成您的注册…</a></b></big><br />
<br />
链接无法点击？请复制下面的链接到你的浏览器地址栏：<br />
<nobr><a href="<?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/activate/'.$user_id.'/'.$new_email_key); ?></a></nobr><br />
<br />
请在 <?php echo $activation_period; ?> 小时内验证您的邮箱地址，否则你的注册将为无效注册，您将需要重新注册。<br />
<br />
<br />
<?php if (strlen($username) > 0) { ?>用户名： <?php echo $username; ?><br /><?php } ?>
邮箱地址： <?php echo $email; ?><br />
<?php if (isset($password)) { /* ?>Your password: <?php echo $password; ?><br /><?php */ } ?>
<br />
<br />
祝您玩的愉快！<br />
The <?php echo $site_name; ?> Team
</td>
</tr>
</table>
</div>
</body>
</html>