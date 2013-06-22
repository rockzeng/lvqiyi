<script src="<?php echo base_url(); ?>application/scripts/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>application/src/facebox.js" type="text/javascript"></script>

<script type="text/javascript">

function proceed(type)
{
    if(type=='yes')
    {
           id = '<?php echo $id ?>';
           dataString = 'id='+id;
           $('#deleting').show();
           $('#loading').show();
           $.ajax({
                    url: "<?php echo site_url('administrator/deleteCategory');?>",
                    type: "POST",
                    data: dataString,
                    dataType: 'json',
                    cache: false,
                    success: function (data) {
                        alert('deleted');
                        $.facebox.close();
                        window.location.reload()
                        //window.location.replace(baseUrl+"board/index/"+boardId);

                    }
           });
    }
    else{
        $.facebox.close();

    }
}
</script>

<div id="fancybox-outer">
<div class="fancybox-bg" id="fancybox-bg-n">
</div>
<div class="fancybox-bg" id="fancybox-bg-ne"></div>
<div class="fancybox-bg" id="fancybox-bg-e"></div>
<div class="fancybox-bg" id="fancybox-bg-se"></div>
<div class="fancybox-bg" id="fancybox-bg-s"></div>
<div class="fancybox-bg" id="fancybox-bg-sw"></div
><div class="fancybox-bg" id="fancybox-bg-w"></div>
<div class="fancybox-bg" id="fancybox-bg-nw"></div>
<div style="border-width: 10px; width: 580px; height: auto;" id="fancybox-content">
    <div style="width: auto; height: auto; overflow: auto; position: relative;">
        <div id="Repin_Pop" class="Pop_Up_Blk">
            <h2>删除分类</h2>
            <div class="pop_content">
                <div id="pop_content">
                    <div class="right clsFloatRight" style="float: left;width: auto;">
                        <p>你确认删除此分类吗？删除后所有数据将无法恢复！</p>
                        <p>你确认继续吗？</p>
                        <br clear="all">
                        <input  type="button" class="Button2 Button13 WhiteButton" name="yes" value="是" onclick="proceed('yes')"/>
                        <input  type="button" class="Button2 Button13 WhiteButton" name="no" value="否" onclick="proceed('no')"/>
                        <p id="deleting" style="display: none;">删除。。。<div id="loading"></div></p>
                    </div>
                    <div class="clear"></div>
                </div>

            <div style="display: none;" id="repin_msg">
                    Repinned to <a href="#" id="board_view">beatuy.</a><br>
                    Shared with your followers. <a href="#" id="repin_view">See it now.</a>
            </div>
        </div>
    </div>
</div>
</div>
<a style="display: inline;" id="fancybox-close" ></a>
<div style="display: none;" id="fancybox-title"></div>
<a style="display: none;" href="javascript:;" id="fancybox-left">
<span class="fancy-ico" id="fancybox-left-ico"></span>
</a>
<a style="display: none;" href="javascript:;" id="fancybox-right">
<span class="fancy-ico" id="fancybox-right-ico"></span>
</a>
</div>
