<?php $this->load->view('admin/admin_header');?>
<div id="Main_Wrapper" class="clearfix">
	<?php $this->load->view('admin/admin_sidebar');?>
    <div id="Content_Wrapper">
    	<div class="Box">
        	<div class="Box_Head"></div>
                <div class="Box_Content">
                    <div id="Shorts_key" class="sub_box">
                        <h2>仪表盘</h2>
                        <div class="sub_box_content">
                            <ul class="clearfix">
                                <li>
                                    <a href="<?php echo site_url();?>administrator/dbBackup">

                                        <p><img src="<?php echo site_url();?>application/assets/images/cubetboard/db.png"/></p>
                                        <p>备份数据库</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url();?>administrator/settings">
                                        <p><img src="<?php echo site_url();?>application/assets/images/cubetboard/setting.png"/></p>
                                        <p>设置</p>

                                    </a>
                                </li>
<!--                                <li>
                                    <a href="javascript:;" id="show_hide_chart">
                                        <p><img src="http://products.cogzidel.com/pinterest-clone/css/admin/images/chart_bar.png"/></p>
                                        <p>Satistics</p>
                                    </a>
                                </li>-->

                                <li>
                                    <a href="<?php echo site_url();?>administrator/pin/view">
                                        <p><img src="<?php echo site_url();?>application/assets/images/cubetboard/pushpin.png"/></p>
                                        <p>收藏管理</p>
                                    </a>
                                </li>
<!--                                <li>
                                    <a href="http://products.cogzidel.com/pinterest-clone/index.php/administrator/page/view">

                                        <p><img src="http://products.cogzidel.com/pinterest-clone/css/admin/images/static_page.png"/></p>
                                        <p>Static Page</p>
                                    </a>
                                </li>-->
                            </ul>
                            <div id="bar_chat_wrapper" class="k-content">
                                <div class="chart-wrapper">
                                    <div id="chart"></div>

                                </div>

                            </div>
                      </div>
                   </div>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function validateLogin()
{
    username = $('input#username').val()
    password = $('input#password').val()
    if((username=="")||(password==""))
    {
            $('#message').html('Enter input details');
            return false;
    }
    val ='username='+username+'&password='+password;
    $.ajax({
	        url: baseUrl+"administrator/login",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
               if(data==true)
               window.location.replace(baseUrl+"administrator/home");
               else
                  $('#message').html('');
                  $('#message').html('登录失败');
            }
        })

}
</script>