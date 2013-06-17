<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lib_general {
		function __construct()
		{
			//parent::__construct();
			//$CI =& get_instance();	
			//$CI->load_templates();
			
		}
		 
		//check user telah login atau tidak
		function check_login()
		{
			$CI =& get_instance();	
			$logged_in = $CI->session->userdata('logged_in');
			$getUrl = $CI->uri->segment(1)."/".$CI->router->method;
			
			//jika belum login ke page login
			if($logged_in==FALSE){
				 redirect('pengguna/login');
				 $CI->session->set_flashdata('flash_error', 'Sila login terlebih dahulu!');
				 
			//jika telah login check  capaian modul yang boleh dicapai
			}else{
				$group_id = $CI->session->userdata('sess_group_id');
			
				/*$query = $CI->db->query("SELECT * FROM modul
					JOIN peranan_modul ON (peranan_modul.id_peranan ='$group_id'
					AND modul.nama_fungsi = '$getUrl'
					AND peranan_modul.id_modul = modul.id_modul)"); */
					$query = $CI->db->query("SELECT * FROM adm_modul
					JOIN adm_peranan_modul ON (adm_peranan_modul.	id_adm_peranan_rela ='$group_id'
					AND adm_modul.nama_fungsi = '$getUrl'
					AND adm_peranan_modul.id_adm_modul = adm_modul.id_adm_modul)");
					
					$query->num_rows();									
					
						if($query->num_rows()==''){
							//return 0;
							$CI->session->set_flashdata('flash_error', 'Anda tidak dibenarkan mencapai page tersebut!. Sila hubungi admin');
							
							redirect('pengguna');
						}
						
					
			}	
			
		}
		
		function list_assign_modul()
		{
			
					
			$CI =& get_instance();	
			$group_id = $CI->session->userdata('sess_group_id');
			$query ="SELECT * FROM adm_modul
					JOIN adm_peranan_modul ON ( adm_peranan_modul.id_adm_peranan_rela ='$group_id'
					AND adm_peranan_modul.id_adm_modul = adm_modul.id_adm_modul )";
					
			return  $CI->db->query($query);		
			
		}
		
		
		
		function alldata_session($username)
		{
			$CI =& get_instance();
			$query = $CI->db->query("SELECT * FROM adm_pengguna where id_pengguna ='$username'");
			$query->num_rows();						
			
			if ($query->num_rows() == 1) {
				foreach($query->result() as $row) {
					$nama = $row->nama;					
					$group_id = $row->id_adm_peranan_rela;
				}
			}		
			
			$data = array( 'sess_username'=> $username,'sess_nama'=>$nama,'sess_group_id'=>$group_id,'logged_in' => TRUE );
			
			$CI->session->set_userdata($data);
		}
		
		function load_templates()
		{
			
		}
		
		function fungsi()
		{
			$this->CI =& get_instance();
		}
		
		function create_combobox($name,$dbobj,$key,$value,$extra='',$edit='')
		{
			$select = '<select class="select" name="'.$name.'" '.$extra.'>';
			$select .= '<option value="">:: PILIH ::</option>';
			foreach($dbobj->result() as $row)
			{
				$selected = '';
				if($edit!='')
				{
					if($row->$key == $edit)
					{
						$selected = "selected='selected'";
					}
				}
				$select .= '<option value="'.$row->$key.'" '.$selected.'>'.$row->$value.'</option>';
			}
			$select .= '</select>';
			return $select;
		}
		//untuk insert ke table audit trail
		function audit_log()
		{								
			$CI =& get_instance();				
			$sess_id_adm_pengguna = $CI->session->userdata('sess_id_adm_pengguna');
			$getUrl = $CI->uri->segment(1)."/".$CI->router->method;		
			
			$query = $CI->db->query("SELECT id_adm_modul,nama_fungsi FROM adm_modul where nama_fungsi ='$getUrl'");
			$query->num_rows();						
			
			if ($query->num_rows() == 1) {
				foreach($query->result() as $row) {
					$id_adm_modul = $row->id_adm_modul;	
					
				}
			}	
			
			$data = array(			
					
						'id_adm_modul' => $id_adm_modul,	'id_adm_pengguna' => $sess_id_adm_pengguna,
						'created_on'=> date('Y-m-d H:i:s'),
						'ip_pengguna'=>$CI->input->ip_address(),
						'browser_pengguna'=>$CI->agent->browser()
					
					);		
			//insert ke table user
			$CI->db->insert('adm_audit_trail', $data);	
		}
	
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */