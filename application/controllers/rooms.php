<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {

	public function __construct()
 	{
 		parent::__construct();
 	}

 	public function index (
	 		$add_room_error_msg = NULL, 
	 		$add_room_error_action = NULL, 
	 		$reg_error_msg = NULL
 		) {

        //check kung naka-login
		if($this->session->userdata('is_logged_in')) {

			$data = array (
				'current_user' => $this->session->userdata('displayname'),
				'current_username' => $this->session->userdata('username'),
				'add_room_error_msg' => $add_room_error_msg,
				'add_room_error_action' => $add_room_error_action

			);

			$this->load->view('includes/nocache');
	        $this->load->view('includes/header2');
	        $this->load->view('rooms_view', $data);
	        $this->load->view('includes/footer2');

			
		}

		else {
			
			//kung hindi naka-login balik sa main page
			redirect(base_url(), 'refresh');
		}
 	}

}