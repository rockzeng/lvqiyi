<?php $this->load->view('admin/admin_header');?>
<div id="Main_Wrapper" class="clearfix">
<?php $this->load->view('admin/admin_sidebar');?>
    <div id="Content_Wrapper">
    	<div class="Box">
        	<div class="Box_Head"></div>
                <div class="Box_Content">
                    <div id="Shorts_key" class="sub_box">
                        <h2>图墙管理</h2>
<!--                        search for a user
                        <form method="post" action="<?php //echo site_url('administrator/pin/view') ?>">
                            <input type="text" name="search" id="search" />
                            <input type="submit" name="submit" id="submit" value="submit" />
                        </form>-->
                        
                            <table>
                                <tr>
                                    <td><label>图墙名</label></td>
                                    <td><input id="board_name" type="text" name="board_name" value=""/></td>
                                    <td> <span id="error_board" class="validation-message"></span></td>
                                </tr>
                                <tr>
                                    <td><label>图墙描述</label></td>
                                    <td><textarea rows="2" name="details" maxlength="500" id="description" cols="40" class="description" style="width:316px;height: 31px;"></textarea></td>
                                    <td><div id="error_description" class="validation-message"></div></td>
                                </tr>
                                <tr>
                                    <td><label>用户名</label></td>
                                    <td><input id="user_name" type="text" name="user_name" value=""/></td>
                                    <td> <span id="error_user" class="validation-message"></span></td>
                                </tr>
                                <tr>
                                    <td><label>图墙分类</label></td>
                                    <td>
                                        <select id="category" name="category">
                                            <?php $result = getCategoryList();?>
                                            <?php foreach($result as $key=>$value):?>
                                                <option  value="<?php echo $value->field;?>"><?php echo $value->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="process_action" style="display: none;">保存。。。<div id="loading"></div></td>
                                    <td><input type="submit" class="Button2 Button13 WhiteButton" name="submit" id="board_create_submit" value="创建图墙" onclick="return createBoard()"/></td>

                                </tr>
                            </table>
                        <div id="message_board"></div>
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
$().ready(function() {
	$("#user_name").autocomplete(baseUrl+"administrator/autoComplete", {
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
<script type="text/javascript">
function createBoard()
{
    board_name          = $('input#board_name').val();
    description         = $('textarea#description').val();
    user_name           = $('input#user_name').val();
    category            = $("#category option:selected").val();


    $('#error_board').html('');
    $('#error_user').html('');
    var failed = 0;
    if(board_name=="")
    {
        $('#error_board').html('请输入图墙名');
       var failed = 1;
    }
    if(user_name=="")
    {
        $('#error_user').html('请输入用户名');
        var failed = 1;
    }
    else{
        userId = user_name.toString().split(" ")[0];
        if(isNaN(userId))
        {
                $('#error_user').html('用户名应该从用户ID中选择');
                var failed = 1;
        }
    }
    if(failed==1)
    {
        return false;
    }
    
    val ='user='+user_name+'&board_name='+board_name+'&description='+description+'&category='+category;
    $('#board_create_submit').hide();
    $('#process_action').show();
    $('#loading').show();
    $.ajax({
	        url: baseUrl+"administrator/createNewBoard",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
            if(data)
            {
                $('input#board_name').val('');
                $('textarea#description').val('');
                $('input#user_name').val('');
                $('#board_create_submit').show('');
                $('#process_action').hide();
                $('#loading').hide();
                $('#message_board').html('');
                $('#message_board').html('保存成功');
            }
            else{
                $('#message_board').html('');
                $('#message_board').html('对不起，出错了 ');
            }

        }
    })
}
</script>
