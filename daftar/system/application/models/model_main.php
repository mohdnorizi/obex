<?php

class model_main extends Model {


	function model_main()
	{
		parent::Model();		
	}
	
	function check_user($pin) 
	{
		$this->db->where('pin',$pin);		
		$query = $this->db->get('user');
		
		if($query->num_rows() > 0) {		
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
}

