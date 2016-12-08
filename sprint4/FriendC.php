<?php
class FriendC extends CI_Controller
	{
		public function search()
			{
			
				$fname=$this->input->get_post('fname');
				 	//echo $fname;
				$this->load->model('searchM');
				$result=$this->searchM->search_Model($fname);
				echo json_encode($result);
			}

		public function FriendRequest()
		{
			$friend['sender']=$this->input->get_post('sender');
			$friend['receiver']=$this->input->get_post('receiver');
			$friend['active']=0;
			//print_r($friend);
			
			$this->load->model('searchM');
			$this->searchM->sendrequest($friend);
		}
		public function views()
		{

			$friend['receiver']=$this->input->get_post('receiver');
			//print_r($friend);
			$this->load->model('searchM');
			$json=$this->searchM->view($friend);
			echo json_encode($json);

		}
		
		public function ConfirmRequest()
		{
			$friend['sender']=$this->input->get_post('sender');
			$friend['receiver']=$this->input->get_post('receiver');
			$emailid=$this->input->get_post('email');
			//print_r($friend);



			$this->load->model('searchM');
			if(!$this->searchM->confirm($friend))
			{
				$json=array('response code'=>502,'message'=>'success');
				echo json_encode($json);
			}
/*
						$config= Array( 
				'crlf' => '\r\n',      //should be "\r\n"
				'newline' => '\r\n',   //should be "\r\n"
				'protocol' => 'smtp', 
				'smtp_host' => 'ssl://smtp.googlemail.com', 
				'smtp_port' => 465, 
				'smtp_user' => 'syamadamodharanmkl96@gmail.com',// here goes your mail 
				'smtp_pass' => 'ascii999', // here goes your mail password 
				'mailtype'  => 'html', 
    			'charset'   => 'utf-8',
    			'wordwrap' => TRUE 
				
				);
				$this->load->library('email', $config);
				$this->email->initialize($config);    
				$message = 'hiiiiii'; 
				$this->email->set_newline("\r\n"); 
				$this->email->from('syamadamodharanmkl96@gmail.com'); // here goes your mail 
				$this->email->to($emailid);// here goes your mail 
				$this->email->subject('Resume from JobsBuddy'); 
				$this->email->message($message); 
				if($this->email->send())
				{
					echo "mail send";
				}
				else
				{
					show_error($this->email->print->debugger());
				}*/
		}

		public function ViewFriend()
		{
			$friend['receiver']=$this->input->get_post('receiver');
			//print_r($friend);

			$this->load->model('searchM');
			$json=$this->searchM->viewfrnd($friend);
			echo json_encode($json);
		}

		public function UnFriend()
		{
			$friend['sender']=$this->input->get_post('sender');
			$friend['receiver']=$this->input->get_post('receiver');
			//print_r($friend);

			$this->load->model('searchM');
			$this->searchM->unfrnd($friend);
		}

		public function UpdateStatus()
		{
			$friend['user_id']=$this->input->get_post('user_id');
			$friend['status']=$this->input->get_post('status');
			print_r($friend);

			$this->load->model('searchM');
			$this->searchM->updtsts($friend);
		}
	
	}


?>