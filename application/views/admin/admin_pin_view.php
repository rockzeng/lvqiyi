<?php $this->load->view('admin/admin_header');?>
<div id="Main_Wrapper" class="clearfix">
<?php $this->load->view('admin/admin_sidebar');?>
    <div id="Content_Wrapper">
    	<div class="Box">
        	<div class="Box_Head"></div>
                <div class="Box_Content">
                    <div id="Shorts_key" class="sub_box">
                        <h2>收藏管理</h2>
                        <!--search for a user -->
                        <form method="post" action="<?php echo site_url('administrator/pin/view') ?>">
                            <input type="text" name="search" id="search" />
                            <input type="submit" name="submit" id="submit" value="查询" />
                        </form>
                        
                        <div id="pin_pagination">
                        <?php echo $this->pagination->create_links(); ?>
                        </div>
                        <?php ?>
                        <?php if(!empty ($result)):?>
                            <table>
                                <thead>
                                    <th>收藏 id</th>
                                    <th>收藏名</th>
                                    <th>图墙 id</th>
                                    <th>图墙名</th>
                                    <th>用户名</th>
                                    <th>喜欢统计</th>
                                    <th>编辑</th>
                                    <th>删除</th>

                                </thead>
                                <tbody>
                                    <?php foreach ($result as $key => $value):?>
                                        <tr id="tr_<?php echo $value->id;?>">

                                            <td><?php echo $value->id;?></td>

                                            <td><?php echo $value->description;?></td>

                                            <td><?php echo $value->board_id;?></td>

                                            <?php $boardDetails = getBoardDetails($value->board_id);?>
                                            <td><?php echo $boardDetails->board_name?></td>

                                            <?php $userDetails = userDetails($value->user_id);?>
                                            <td><?php echo $userDetails['name']?></td>

                                            <td><?php echo getPinLikeCount($value->id)?></td>

                                            <td id="edit_<?php echo $value->id;?>"><a href="<?php echo site_url('administrator/editPin/'.$value->id);?>" rel="facebox"><img src="<?php echo site_url('application/assets/images/admin/edit.png');?>"/></a></td>
                                            <td id="remove_<?php echo $value->id;?>"><a href="<?php echo site_url('administrator/confirmDeletePin/'.$value->id);?>" rel="facebox"><img src="<?php echo site_url('application/assets/images/admin/delete.png');?>"/></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>

                            </table>
                            <?php $current=current_url();?>
                        <?php endif?>
                        <span id="message"></span>
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

<script type="text/javascript">
function editUser(actionid,userid)
{
    val ='username='+username+'&password='+password;
    $.ajax({
	        url: baseUrl+"administrator/login",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
               if(data==true)
               window.location.replace(baseUrl+"administrator/index");
               else
                  $('#message').html('');
                  $('#message').html('登录失败');
            }
        })

}
</script>
<script type="text/javascript">
$().ready(function() {
	$("#search").autocomplete(baseUrl+"administrator/autoComplete", {
		width: 260,
		matchContains: true,
		selectFirst: false,
        formatResult: function (data) {
                    var one = data;
                    var two= one.toString().split("-");
                    return two[1];
                }

	});
});
</script>
