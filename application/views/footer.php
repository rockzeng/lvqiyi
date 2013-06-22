<div class="footer_bg"><!-- starting Footer -->
    <div class="container"><!-- starting container -->
        <div class="bottom_box">
            <ul class="bottomlinks">
                <li><a href="<?php echo site_url();?>welcome/underconstruction">帮助</a></li>
                <li><a href="<?php echo site_url();?>welcome/underconstruction">收藏按钮</a></li>
                <li><a href="<?php echo site_url();?>welcome/underconstruction">专业</a></li>
                <li><a href="<?php echo site_url();?>welcome/underconstruction">我们的团队</a></li>
                <li><a href="<?php echo site_url();?>welcome/underconstruction">博客</a></li>
            </ul>

            <ul class="bottomlinks">
                <li><a href="<?php echo site_url();?>welcome/underconstruction">服务条款</a></li>
                <li><a href="<?php echo site_url();?>welcome/underconstruction">隐私政策</a></li>
                <li><a href="<?php echo site_url();?>welcome/underconstruction">版权</a></li>
                <li><a href="<?php echo site_url();?>welcome/underconstruction">商标</a></li>
            </ul>

            <div class="bottomlink-box-right">
                <ul class="bottomlinks">
                    <li><a href="<?php echo site_url();?>invite">邀请好友</a></li>
                    <li><a href="<?php echo site_url();?>pins/videos">视频</a></li>
                    <li><a href="<?php echo site_url();?>gift/index/0/100">商品</a></li>
                </ul>

                <ul class="bottomlinks-right">
                    <li><a href="<?php echo site_url();?>welcome/mostLiked">最喜欢的</a></li>
                    <li><a href="<?php echo site_url();?>welcome/mostRepinned">流行的</a></li>
                    <?php if($this->session->userdata('login_user_id')):?>
                    <li><a href="<?php echo site_url();?>auth/logout">退出</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
        <div class="copyright_box">
            <p>©绿奇异 沪ICP备13020343号 <script src="http://s9.cnzz.com/stat.php?id=5409519&web_id=5409519" language="JavaScript"></script> </p>
        </div>
    </div><!-- closing container -->
</div><!-- closing Footer -->
