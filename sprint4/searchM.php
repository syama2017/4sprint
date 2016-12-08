<?php

	class searchM extends CI_Model
	{
		
	public function search_Model($data)
	{
		$query=$this->db->query("call user('$data')");
		$result=$query->result_array();
		//print_r($result);
		return $result;

	}
	public function sendRequest($data)
		{
			 print_r($data);
			foreach (array_keys($data) as $i)
			{
				$data[$i]=$this->db->escape($data[$i]);	

			}
			$values=implode(',',$data);
			//print_r($values);
			$this->db->query("call friend1({$values})");
	}
	public function view($data)
	{
		foreach (array_keys($data) as $i) 
		{
			$data[$i]=$this->db->escape($data[$i]);
			//echo $data[$i];
			$values=implode(',',$data);
			
			$query=$this->db->query("call FriendRequest ({$values})");
			$result=$query->result_array();
			return $result;
		}
	}
	public function confirm($data)
	{
		foreach (array_keys($data) as $i)
		{
			$data[$i]=$this->db->escape($data[$i]);
			// echo $data[$i];
		}

		
		$values=implode(',', $data);
		$query=$this->db->query("call RequestConfirm({$values})");
		//$result=$query->result_array($query);
	}	
		public function viewfrnd($data)
		{
			foreach (array_keys($data) as $i) 
			{
			$data[$i]=$this->db->escape($data[$i]);
			}
			
			$values=implode(',', $data);
			$query=$this->db->query("call ViewFriend({$values})");
			$result=$query->result_array();
			return $result;
		}

		public function unfrnd($data)
		{
			foreach (array_keys($data) as $i) 
			{
			$data[$i]=$this->db->escape($data[$i]);
			}
			
			$values=implode(',', $data);
			$query=$this->db->query("call UnFriend({$values})");	
			

		}
		
		
	
}
?>