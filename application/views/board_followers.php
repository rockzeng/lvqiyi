<?php $this->load->view('header');?>
<script type="text/javascript">
function followsFn(type,id)
{
    val = 'id='+id;
    if(type=='follow')
    {
        $.ajax({
	        url: baseUrl+"follow/all",
	        type: "POST",
	        data: val,
            dataType: 'json',
	        success: function(data){
                $('#follow_btn_'+id).hide();
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
                $('#unfollow_btn_'+id).hide();
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

<?php $userFollows = getBoardFollowers($boardId); ?>
<div class="white_strip"></div>
<div class="middle-banner_bg"><!-- staing middlebanner -->

    <!-- Display the information about the page-->
    <div class="info_bar">
        <div class="left">
            <div class="right">
                <?php $boardDetails = getBoardDetails($boardId)?>
                <?php $userDetails = userDetails($boardDetails->user_id)?>
                <div class="mid">
                    <div id="info"><label>关注<?php echo $boardDetails->board_name ?>的粉丝</label></div>
                </div>
            </div>
        </div>
    </div>
    <div id="Container" style="margin-left: 250px;">
        <div id="alpha" class="container Mcenter clearfix transitions-enabled">
            <?php if(is_array($userFollows)):?>
                <?php foreach($userFollows as $userFollowsKey=>$userFollowsValue):?>
                    <?php $userDetails  = userDetails($userFollowsValue->user_id);?>
                    <?php $pinCount     = getAllPins($userFollowsValue->user_id);?>

                    <div class="pin_item">

                        <!--Follow/un follow button -->
                        <?php $id_ref =$userFollowsValue->user_id;?>
                        <div id="follow_unfollow_<?php echo $id_ref;?>" class="follow_unfollow">
                            <?php if(!isFollowAll($userFollowsValue->user_id)):?>
                                <?php if($userFollowsValue->user_id!=$this->session->userdata('login_user_id')):?>
                                    <a id="follow_btn_<?php echo $id_ref;?>" onclick="followsFn('follow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong >全部关注</strong><span></span></a>
                                 <?php endif?>
                            <?php else:?>
                                <a id="unfollow_btn_<?php echo $id_ref;?>" onclick="followsFn('unfollow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong>取消关注全部</strong><span></span></a>
                            <?php endif?>
                        </div>
                        <div class="follow_unfollow">
                            <span id="ajax_follow_btn_<?php echo $id_ref;?>" style="display: none;"><a onclick="followsFn('follow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong>全部关注</strong><span></span></a></span>
                            <span id="ajax_unfollow_btn_<?php echo $id_ref;?>" style="display: none;"><a onclick="followsFn('unfollow',<?php echo $id_ref;?>);" class="Button2 Button13 WhiteButton"><strong>取消全部关注</strong><span></span></a></span>
                        </div>

                        <!--user image -->
                        <div class="pin_img">
                            <a href="<?php echo site_url()?>user/index/<?php echo $userFollowsValue->user_id;?>" class="fancyboxForm1"><img src="<?php echo $userDetails['image'].'?type=large';?>"  style="width: 180px;height: 135px;"/></a>
                        </div>

                        <!--like/comment/repins/followers/following counts -->
                        <div class="comm_des">
                            <p class="des"><?php echo $userDetails['name'];?></p>
                            <p class="comm_like">
                                <span><a href="<?php echo site_url('pins/index/'.$userFollowsValue->user_id);?>" title="<?php echo $userDetails['name'];?>的收藏"><?php echo count($pinCount)?> 收藏</a></span>
                                <span><a href="<?php echo site_url('like/index/'.$userFollowsValue->user_id);?>" title="<?php echo $userDetails['name'];?>喜欢的收藏"><?php echo pinLikes($userFollowsValue->user_id)?> 喜欢</a></span>
                                <span><a href="<?php echo site_url('activity/index/'.$userFollowsValue->user_id);?>" title="activities of <?php echo $userDetails['name'];?>"><?php echo activityCount($userFollowsValue->user_id)?> Activities</a></span>
                            </p>
                            <p class="comm_like">
                                <span><a href="<?php echo site_url('follow/followers/'.$userFollowsValue->user_id);?>" title="<?php echo $userDetails['name'];?>的粉丝"><strong id="followers_count_<?php echo $id_ref;?>"><?php echo getUserFollowersCount($userFollowsValue->user_id)?></strong> 粉丝</a></span>
                                <span><a href="<?php echo site_url('follow/following/'.$userFollowsValue->user_id);?>" title="<?php echo $userDetails['name'];?>的关注"><strong id="following_count_<?php echo $id_ref;?>"><?php echo getUserFollowingCount($userFollowsValue->user_id)?></strong>关注</a></span>
                            </p>
                        </div>

                        <!--Display some pins of that user-->
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
                    <h2>暂时没有人关注 <?php echo $boardDetails->board_name ?></h2>
                </div>
            <?php endif?>
        </div> <!-- #alpha -->
    </div>
</div>
<?php $this->load->view('footer');?>
</body>
</html>
<div class="scroll_top">
	<a href="#top">回到顶部</a>
</div>