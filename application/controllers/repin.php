<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
Repin controller to handles the repins of a user

* @package pinterest clone controller
* @subpackage
* @uses : To handle all the repin of a user
* @version $id:$
* @since 03-05-2012
* @author Vishal Vijayan
* @copyright Copyright (c) 2007-2010 Cubet Technologies. (http://cubettechnologies.com)
*/
class Repin extends CI_Controller {

    function __construct()
	{
		parent::__construct();
        $this->sitelogin->entryCheck();
	}

    /**
     * Function get and save the repins
     * @param  : <Int> $id
     * @author : Vishal
     * @since  : 03-05-2012
     * @return
     */
     public function index($id=false)
	 {
         $pinDetails = getPinDetails($this->input->post('pin_id'));
         $value              = array(
                                    'user_id'=>$this->session->userdata('login_user_id'),
                                    'pin_url'=>$pinDetails->pin_url,
                                    'source_url'=>$pinDetails->source_url,
                                    'board_id'=>$this->input->post('board_id'),
                                    'type'    =>$pinDetails->type,
                                    'description'=>$this->input->post('description'));
        if(($value['user_id']==0)||(!isset($value['user_id'])))
        {
            echo json_encode(false);
        }
        $id                     = $this->board_model->saveNewPin($value);

        $value['insertId']      = $id;
        $activity['user_id']    = $this->session->userdata('login_user_id');
        $activity['log']        =  "Repined a pin";
        $activity['type']       =  "repin";
        $activity['action_id']  =  $id;
        $activity['link']       =  $pinDetails->pin_url;
        activityList($activity);


        $saveRepin              = array('repin_user_id' => $this->session->userdata('login_user_id'),
                                        'owner_user_id' => $pinDetails->user_id,
                                        'from_pin_id'   => $this->input->post('pin_id'),
                                        'new_pin_id'    => $id
                                        );
        $this->board_model->saveRepin($saveRepin);

        //socialNetworkPost($activity,$value);
        

        $description = $this->input->post('description');
        $pin_url            = $pinDetails->pin_url;
        $sitelink           = site_url('board/pins/'.$this->input->post('board_id').'/'.$id);
        $imglink            = site_url('application/assets/images/facebook_button.png');
        $url                = rawurlencode($sitelink.'&via=pinterest clone&text='.$description);
        $success            = " <h2 style='padding-top:156px; border:none;' >收藏成功！！</h2>
                                <div>
                                <wb:share-button size='big' url='$sitelink'
			title='$description'
			appkey='228825110' relateuid='1993193342'></wb:share-button><script type='text/javascript' src='http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=228825110' charset='utf-8'></script>

                                </div>";
        echo json_encode($success);
     }
     /**
     * Function load the repin view
     * @param  : <Int> $pinId
     * @author : Vishal
     * @since  : 10-05-2012
     * @return
     */
     function load($pinId)
     {   $data['pin'] = $pinId;
         $this->load->view('repin_view',$data);
     }
     /**
     * Function load the repin view for inner popup pin page
     * @param  : <Int> $pinId
     * @author : Vishal
     * @since  : 10-05-2012
     * @return
     */
     function ajaxLoad()
     {   $data['pin']   = $this->input->post('id');
         $data          = $this->load->view('repin_view',$data,true);
         echo json_encode($data);
     }
}
/* End of file repin.php */
/* Location: ./application/controllers/repin.php */