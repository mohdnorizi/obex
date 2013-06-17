<?php

class Main extends Controller {

	function Main()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$pin = $this->session->userdata('sess_pin');
		
		if($pin==''){
			$this->login();
		}else{
			redirect('main/daftar','refresh');	
		}	
	}
	
	function login(){
		$data ['flash_success'] = $this->session->flashdata('flash_success');
		$data ['flash_error'] = $this->session->flashdata('flash_error');
			
		$this->load->view('login',$data);
	}
	
	function login_proses(){
		$pin = $this->input->post('pin',TRUE);
		//checking user 
		$user= $this->model_main->check_user($pin);
		
		if($user == TRUE){	
			
			
			$data = array('sess_pin'=> $pin,'logged_in' => TRUE );			
			$this->session->set_userdata($data);	
			redirect('main/daftar','refresh');	
			
		}else{
			$this->session->set_flashdata('flash_error', 'Pin tidak sah.'); 
				
	        redirect('main','refresh');
			
		}
	}
	
	function daftar(){
		$pin = $this->session->userdata('sess_pin');
		
		if($pin!=''){
			$data ['flash_success'] = $this->session->flashdata('flash_success');
			$data ['flash_error'] = $this->session->flashdata('flash_error');
				
			$this->load->view('daftar',$data);
		}else{
			$this->session->set_flashdata('flash_error', 'Sila login.');		
	        redirect('main','refresh');			
		}	
	}
	
	function daftar_proses(){
	
			$tarikh_lahir = $this->input->post('tarikh_lahir');
			if($tarikh_lahir=='0000-00-00'){
				$explode = explode("-", $tarikh_lahir);
				 $a = $explode[0];
				 $b = $explode[1];
				 $c = $explode[2];
				 //echo $a;
				 $tarikh_lahir = $c."-".$b."-".$a;
			}
			 //echo $tarikh_lahir;exit();
			 $pin = $this->session->userdata('sess_pin');
			 
			$data = array (
				
				'nama'=> $this->input->post('nama'),
				'nokp'=> $this->input->post('nokp'),
				'alamat1'=> $this->input->post('alamat1'),
				'alamat2'=> $this->input->post('alamat2'),
				'alamat3'=> $this->input->post('alamat3'),
				'poskod'=> $this->input->post('poskod'),
				'negeri'=> $this->input->post('negeri'),
				'daerah'=> $this->input->post('daerah'),
				'tarikh_lahir'=> $tarikh_lahir,
				'notel_rumah'=> $this->input->post('notel_rumah'),
				'notel_pej'=> $this->input->post('notel_pej'),
				'notel_hp'=> $this->input->post('notel_hp'),
				'negeri_lahir'=> $this->input->post('negeri_lahir'),
				'jantina'=> $this->input->post('jantina'),
				'pekerjaan'=> $this->input->post('pekerjaan'),
				'perkasa_negeri'=> $this->input->post('perkasa_negeri'),
				'perkasa_daerah'=> $this->input->post('perkasa_daerah'),
				'createdby'=> $pin
			);
		
		$no_kp = $this->input->post('nokp');
		
		$this->db->where('nokp', $no_kp);
		$this->db->from('biodata');
		$check = $this->db->count_all_results();
		//semak data dari table telah wujud atau tidak
		if ($check){
			$this->session->set_flashdata('flash_error','Ralat Nombor Kad Pengenalan  telah wujud.');
			redirect ('main' , 'refresh');
		}else{	
			
			$this->db->insert ('biodata',$data);			
			$this->session->set_flashdata('flash_success', 'Tahniah  Pendaftaran berjaya.'); 
			redirect ('main/daftar' , 'refresh');
		}	
	}
	function semakan(){
		$pin = $this->session->userdata('sess_pin');
		
		if($pin!=''){
		
			if(isset($_POST['submit']))
			{
				$nokp = $this->input->post('nokp');		
				
				$query = $this->db->query("SELECT * FROM biodata where nokp='$nokp'");	

				if($query->num_rows() > 0)
				{
					$row = $query->row();
					
					/* umpukkan variable ke field dari table user */
					$data['nama'] = $row->nama;
					$data['nokp'] = $row->nokp;
					$data['negeri'] = $row->negeri;
					
				}
				$value = 1;
			}else{
				$value = 0;
			}
			
			$data ['flash_success'] = $this->session->flashdata('flash_success');
			$data ['flash_error'] = $this->session->flashdata('flash_error');
			//
			$data ['papar'] = $value;	
			$this->load->view('semakan',$data);
		}else{
			$this->session->set_flashdata('flash_error', 'Sila login.');		
	        redirect('main','refresh');			
		}	
	}
	
	
	function logout(){
		
		
		// Destroy all the session
		$this->session->sess_destroy();
				
		redirect('main'); // sesudah logout di redirect ke halaman utama
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */