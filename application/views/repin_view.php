
<div id="Repin_Pop" class="Pop_Up_Blk" style="width:550px;">
    <h2 id="h2_heading">收藏</h2>
    <div class="pop_content">
        <?php $pinDetails = getPinDetails($pin);?>
        <div id="pop_content">
            <div class="left clsFloatLeft">
                <p>
                    <img src="<?php echo $pinDetails->pin_url; ?>" height="170" width="170">
                </p>
            </div>
            <div class="right clsFloatRight" style="float:left;padding-left: 20px;">
                <ul class="repin_right" style="width: 247px;">
                    <li>
                        <label>图墙名</label>
                    </li>
                    <li>
                        <select id="board_id" name="board_id">
                        <?php  $userId  = $this->session->userdata('login_user_id');?>
                        <?php $userBoards   = getUserBoard($userId);?>
                        <?php foreach ($userBoards as $boardKey => $boardValues):?>
                        <option  value="<?php echo $boardValues->id;?>"><?php echo $boardValues->board_name;?></option>
                        <?php endforeach;?>
                        </select>
                    </li>
                    <li>
                        <label>分类</label>
                    </li>
                    <li>
                        <select id="id_category" name="category">
                        <?php $result = getCategoryList();?>
                        <?php foreach($result as $key=>$value):?>
                        <option  value="<?php echo $value->field;?>"><?php echo $value->name;?></option>
                        <?php endforeach;?>
                        </select>
                    </li>
                    <li>
                        <a class="blink4"  id="create_new_board" onclick="boardAction('create')"><span>新建图墙</span></a>
                    </li>
                    <li>
                        <div style="display:none;" id="newboard">
                            <p><input name="new_board" id="new_board" value="请输入图墙名" onclick="this.value='';" maxlength="20" type="text"></p>
                            <span id="errorBoardName" class="val_error"></span>
                            <!--<input type="button" name="button" id="button" />-->
                            <p><button type="button" name="button" id="button" class="bbutton1" onclick="boardAction('save')"><span><span>新建</span></span></button>
                            <button type="button" name="button1" id="button1" class="bbutton1" onclick="boardAction('cancel')"><span><span>取消</span></span></button></p>
                        </div>
                    </li>
                    <li>
                        <textarea name="description" cols="17" rows="2" id="description" style="height: 36px;width: 190px;"><?php echo $pinDetails->description;?></textarea>
                        <span id="errordescription" class="val_error"></span>
                    </li>
                     <li>
                        <input name="bin_id" id="pin_id" value="78" type="hidden">
                        <br clear="all">
                    </li>
                    <li>
                        <input name="button" value="确认收藏" id="submit" onclick="submit()" type="submit" class="Button2 Button13 WhiteButton">
                    </li>

                </ul>
                <div id="loading_gif" style="display: none">收藏。。。.<img src="<?php echo site_url('application/assets/images/loading.gif');?>"/></div>
            </div>
            <div class="clear"></div>
        </div>
        <br><br><br><br><br><br><br><br>


</div>
    <div id="success" style="display: none">

    </div>
</div>

<script type="text/javascript">
function boardAction(type)
{   if(type=='create')
        $('#newboard').show('slow');
    if(type=='cancel')
        $('#newboard').hide('slow');
    if(type=='save')
    {       
        var boardName=$('#new_board').val();
        if(boardName=='')
        {
            $('#errorBoardName').html('Required');
            return false
        }
        else{
            var category    = $('#id_category').val();
            dataString      = 'name='+boardName+'&category='+category+'&type=ajax';
            $.ajax({
	        url: baseUrl+"board/create",
	        type: "POST",
	        data: dataString,
            dataType: 'json',
	        success: function(data){
                $('#board_id').append('<option value='+data+' selected="selected">'+boardName+'</option>');
                $('#newboard').hide('slow');
            }
		})
            
        }
    }
}
function submit()
{    
     var board_id       = $('#board_id').val();
     var pin            = '<?php echo $pin;?>';
     repin              = $('#repin_count_'+pin).html();
     var description    = $("textarea#description").val();
     if(description=='')
     {
        $('#errordescription').html('Required');
        return false
     }
     dataString         = 'board_id='+board_id+'&pin_id='+pin+'&description='+description;
     $('input#submit').hide();
     $('#loading_gif').show();
    
    $.ajax({
        url: baseUrl+"repin/index",
        type: "POST",
        data: dataString,
        dataType: 'json',
        success: function(data){
            if(data!=false)
            {   $('.pop_content').hide('slow');
                $('#h2_heading').hide('slow');
                $('#success').show('slow');
                $('#success').html(data);
                 $('#loading_gif').hide();
                var substr  = repin.split(' ');
                count       = parseFloat(substr[0]) + parseFloat(1);
                $('#repin_count_'+pin).html(count + ' ' +substr[1]);
            }
        }
    })
}

</script>