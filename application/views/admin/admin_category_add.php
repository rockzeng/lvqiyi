<?php $this->load->view('admin/admin_header');?>
<div id="Main_Wrapper" class="clearfix">
<?php $this->load->view('admin/admin_sidebar');?>
    <div id="Content_Wrapper">
    	<div class="Box">
        	<div class="Box_Head"></div>
                <div class="Box_Content">
                    <div id="Shorts_key" class="sub_box">
                        <h2>品类管理 </h2>
<!--                        search for a user
                        <form method="post" action="<?php //echo site_url('administrator/pin/view') ?>">
                            <input type="text" name="search" id="search" />
                            <input type="submit" name="submit" id="submit" value="submit" />
                        </form>-->
                        <table>
                                <tr>
                                    <td><label>领域</label></td>
                                    <td><input type="text" name="field" value="" id="field" /></td>
                                    <td><div id="error_field" class="validation-message"></div></td>
                                </tr>
                                 <tr>
                                    <td><label>名称</label></td>
                                    <td><input type="text" name="name" value="" id="name" /></td>
                                    <td><div id="error_name" class="validation-message"></div></td>
                                </tr>
                                <tr>
                                    <td><input type="button" class="Button2 Button13 WhiteButton" name="submit" value="保存" id="submit" onClick=" return categoryAdd();"/></td>
                                    <td id="saving" style="display: none;">保存。。。<div id="loading"></div></td></tr>
                            </table>
                      
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
function categoryAdd()
{
    name         = $('input#name').val();
    field        = $('input#field').val();
    $('#error_name').html('');
    $('#error_field').html('');
    var failed = 0;
    if(name=="")
    {
        $('#error_name').html('请输入名称');
       var failed = 1;
    }
    if(field=="")
    {
        $('#error_field').html('请输入领域');
        var failed = 1;
    }
    if(failed==1)
    {
        return false;
    }
    val ='name='+name+'&field='+field;
    $('#submit').hide();
    $('#saving').show();
    $('#loading').show();
    $.ajax({
	        url: baseUrl+"administrator/saveNewCategory",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
            if(data)
            {
                name         = $('input#name').val('');
                field        = $('input#field').val('');
                $('#submit').show();
                $('#saving').hide();
                $('#loading').hide();
                $('#message').html('');
                $('#message').html('保存成功');
            }
            else{
                $('#message').html('');
                $('#message').html('对不起，出错了 ');
            }
                
        }
    })
}
</script>
