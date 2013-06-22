<script type="text/javascript">
function followFn(type,id)
{   val = 'id='+id;
    if(type=='follow')
    {
        $.ajax({
	        url: baseUrl+"follow/all",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
                $('#follow_unfollow_'+id).hide();
                $('#ajax_unfollow_btn_'+id).show();
                $('#ajax_follow_btn_'+id).hide();
                count = $('#followers_count_'+id).html();
                count = parseInt(count) + parseInt(1);
                $('#followers_count_'+id).html(count);
                
            }
            })

    }
    else{
        $.ajax({
	        url: baseUrl+"follow/unFollowAll",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
                $('#follow_unfollow_'+id).hide();
                $('#ajax_follow_btn_'+id).show();
                $('#ajax_unfollow_btn_'+id).hide();
                count = $('#followers_count_'+id).html();
                count = parseInt(count) - parseInt(1);
                $('#followers_count_'+id).html(count);
            }
            })

    }

}
</script>
<?php
$searchUsers = $result;
?>
<div id="top"></div>
<div class="white_strip"></div>
<div class="middle-banner_bg"><!-- staing middlebanner -->
    <div class="info_bar">
    <div class="left">
        <div class="right">
            <div class="mid">
                <div id="info">
                    <label>
                        <?php if($searchItem !=''):?>
                        <h3>搜索内容是 <?php echo $searchItem;?></h3>
                        <?php else:?>
                        <h3>输入关键词搜索</h3>
                        <?php endif;?>

                    </label></div>
                <div id="info_center">
                    <h3>可用下列对象进行搜索</h3>
                    <?php  $searchItem = str_replace(' ', '%20', $searchItem);?>
                    <a href="<?php echo site_url('search/filter/pin/'.$searchItem)?>">收藏名</a> | <a href="<?php echo site_url('search/filter/board/'.$searchItem)?>">图墙名</a> | <a style="color:#CB2027;">用户名</a>
                </div>
            </div>
        </div>
    </div>
</div>
   
    <div id="Container">
        <div id="alpha" class="container Mcenter clearfix transitions-enabled" style="position: relative; height: 390px; width: 1150px;">
            <?php if(is_array($searchUsers)):?>
                <?php foreach($searchUsers as $searchUsersKey=>$searchUsersValue):?>
                    <?php $userDetails  = userDetails($searchUsersValue->id);?>
                    <?php $pinCount     = getAllPins($searchUsersValue->id);?>

                    <div class="pin_item">

                        <?php $id_ref =$searchUsersValue->id;?>
                        <div id="follow_unfollow_<?php echo $id_ref;?>" class="follow_unfollow">
                        <?php if(!isFollowAll($searchUsersValue->id)):?>
                            <?php if($searchUsersValue->id!=$this->session->userdata('login_user_id')):?>
                                <a  onclick="followFn('follow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong >全部关注</strong><span></span></a>
                            <?php endif;?>
                        <?php else:?>
                            <a  onclick="followFn('unfollow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong>取消全部关注</strong><span></span></a>
                        <?php endif?>
                        </div>
                        <div class="follow_unfollow">
                        <span id="ajax_follow_btn_<?php echo $id_ref;?>" style="display: none;"><a onclick="followFn('follow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong>全部关注</strong><span></span></a></span>
                        <span id="ajax_unfollow_btn_<?php echo $id_ref;?>" style="display: none;"><a onclick="followFn('unfollow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong>取消全部关注</strong><span></span></a></span>
                        </div>

                        <div class="pin_img">
                            <a href="<?php echo site_url()?>user/index/<?php echo $searchUsersValue->id;?>" class="fancyboxForm1"><img src="<?php echo $userDetails['image'].'?type=large';?>"  style="width: 180px;height: 135px;"/></a>
                        </div>
                        <div class="comm_des">
                            <p class="des"><?php echo $userDetails['name'];?></p>
                            <p class="comm_like">
                                <span><a href="<?php echo site_url('pins/index/'.$searchUsersValue->id);?>" title=" <?php echo $userDetails['name'];?>的收藏"><?php echo count($pinCount)?> 收藏</a></span>
                                <span><a href="<?php echo site_url('like/index/'.$searchUsersValue->id);?>" title="<?php echo $userDetails['name'];?>喜欢的收藏"><?php echo pinLikes($searchUsersValue->id)?> 喜欢</a></span>
                                <span><a href="<?php echo site_url('activity/index/'.$searchUsersValue->id);?>" title="activities of <?php echo $userDetails['name'];?>"><?php echo activityCount($searchUsersValue->id)?> Activities</a></span>
                            </p>
                            <p class="comm_like">
                                <span><a href="<?php echo site_url('follow/followers/'.$searchUsersValue->id);?>" title="<?php echo $userDetails['name'];?>的粉丝"><strong id="followers_count_<?php echo $id_ref;?>"><?php echo getUserFollowersCount($searchUsersValue->id)?></strong> 粉丝</a></span>
                                <span><a href="<?php echo site_url('follow/following/'.$searchUsersValue->id);?>" title="<?php echo $userDetails['name'];?>的关注"><strong id="following_count_<?php echo $id_ref;?>"><?php echo getUserFollowingCount($searchUsersValue->id)?></strong> 关注</a></span>
                            </p>
                        </div>
                        <div class="convo_blk attribution">
                            <?php $i=0;?>
                            <?php if(is_array($pinCount)):?>
                                <?php foreach ($pinCount as $key => $value):?>
                                     <?php if($i<=9):?>
                                     <span style="width:36px;height:36px"><img src='<?php echo $value->pin_url;?>' style="width:36px;height:36px;"/></span>
                                     <?php endif;?>
                                     <?php $i++;?>
                                 <?php endforeach;?>
                             <?php endif;?>


                        </div>

                    </div>
                <?php endforeach;?>
            <?php else:?>
            <div class="alert_messgae">
                <h2 style="margin-left:96px;">抱歉，没有找到。</h2>
            </div>
            <?php endif?>

        </div> <!-- #alpha -->
    </div>
</div>
<?php $this->load->view('footer');?>
</body>
</html>
<div class="scroll_top" style="display: none;">
	<a href="#top">返回顶部</a>
</div>
<script type="text/javascript">

$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('.scroll_top').fadeIn();
		} else {
			$('.scroll_top').fadeOut();
		}
	});
});
</script>