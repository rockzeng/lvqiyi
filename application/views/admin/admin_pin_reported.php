<?php $this->load->view('admin/admin_header');?>
<div id="Main_Wrapper" class="clearfix">
<?php $this->load->view('admin/admin_sidebar');?>
    <div id="Content_Wrapper">
    	<div class="Box">
        	<div class="Box_Head"></div>
                <div class="Box_Content">
                    <div id="Shorts_key" class="sub_box">
                        <h2>举报</h2>
                        <!--search for a user -->
                        <form method="post" action="<?php echo site_url('administrator/pin/view') ?>">
                            <input type="text" name="search" id="search" />
                            <input type="submit" name="submit" id="submit" value="submit" />
                        </form>

                        
                        <?php ?>
                        <?php if(!empty ($result)):?>
                            <table>
                                <thead>
                                    <th>收藏 id</th>
                                    <th>收藏名称</th>
                                    <th>图墙 id</th>
                                    <th>图墙名</th>
                                    <th>拥有者</th>
                                    <th>举报者</th>
                                    <th>理由</th>
                                    <th>查看</th>
                                    <th>删除</th>

                                </thead>
                                <tbody>
                                    <?php foreach ($result as $key => $value):?>
                                        <tr id="tr_<?php echo $value->pin_id;?>">


                                            <?php $pinDetails = getPinDetails($value->pin_id);?>

                                            <td><?php echo $pinDetails->id;?></td>
                                            

                                            <td><?php echo $pinDetails->description;?></td>

                                            <td><?php echo $value->board_id;?></td>

                                            <?php $boardDetails = getBoardDetails($value->board_id);?>
                                            <td><?php echo $boardDetails->board_name?></td>

                                            <?php $userDetails = userDetails($pinDetails->user_id);?>
                                            <td><?php echo $userDetails['name']?></td>

                                            <?php $userDetails = userDetails($value->user_id);?>
                                            <td><?php echo $userDetails['name']?></td>

                                             <td><?php echo $value->reason;?></td>

                                              <td><a href="<?php echo site_url('board/pins/'.$value->board_id.'/'.$value->pin_id);?>"/>查看</a></td>

                                            
                                            <td id="remove_<?php echo $value->pin_id;?>"><a href="<?php echo site_url('administrator/confirmDeletePin/'.$value->pin_id);?>" rel="facebox"><img src="<?php echo site_url('application/assets/images/admin/delete.png');?>"/></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>

                            </table>
                            <?php $current=current_url();?>
                        <?php else:?>
                            <h1>没有举报</h1>
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
