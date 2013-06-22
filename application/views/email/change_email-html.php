<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>变更 <?php echo $site_name; ?> 上的邮箱地址</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
<table width="80%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="5%"></td>
<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">变更 <?php echo $site_name; ?> 上的邮箱地址</h2>
您在 <?php echo $site_name; ?> 上的邮箱地址已经改变。<br />
请点击下面的链接确认新的邮箱地址：<br />
<br />
<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url('/auth/reset_email/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;">验证您的新邮箱</a></b></big><br />
<br />
    链接无法点击？请复制下面的链接到你的浏览器地址栏：<br />
<nobr><a href="<?php echo site_url('/auth/reset_email/'.$user_id.'/'.$new_email_key); ?>" style="color: #3366cc;"><?php echo site_url('/auth/reset_email/'.$user_id.'/'.$new_email_key); ?></a></nobr><br />
<br />
<br />
邮箱地址： <?php echo $new_email; ?><br />
<br />
<br />
    您收到这封邮件， 因为 <a href="<?php echo site_url(''); ?>" style="color: #3366cc;"><?php echo $site_name; ?></a> 用户确认新邮箱地址。如果你是误收到，请别点击链接或者直接删除此邮件。<br />
<br />
<br />
谢谢！<br />
The <?php echo $site_name; ?> Team
</td>
</tr>
</table>
</div>
</body>
</html>