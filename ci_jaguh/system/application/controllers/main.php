<?php

class Main extends Controller {

	function Main()
	{
		parent::Controller();	
	}
	
	function index()
	{
		
		$this->borang_daftar();
	}
	
	
	
	function borang_daftar(){		
		
		$this->load->view('borang_daftar');
	}
	
	function prosess_form_transaksi(){
			$data = array (
				
				'jenis_transaksi'=> $this->input->post('kategori'),
				'tarikh_transaksi'=> $this->input->post('tarikh'),
				'jumlah_transaksi'=> $this->input->post('jumlah'),
				'id_bank'=> $this->input->post('id_bank')			
				
			);
				
			$this->db->insert ('transaksi',$data);

			$last_id_transaksi = $this->db->insert_id();	
			$data_jenis_penggunaan = array (
				
				'id_jenis_penggunaan'=> $this->input->post('subkategori'),
				'tarikh_penggunaan'=> $this->input->post('tarikh_penggunaan'),
				'jumlah_penggunaan'=> $this->input->post('jumlah_penggunaan'),
				'id_transaksi'=> $last_id_transaksi,
				'catatan_penggunaan'=> $this->input->post('catatan')			
				
			);
				
			$this->db->insert ('penggunaan',$data_jenis_penggunaan);
			
			//$this->session->set_flashdata('flash_success','Tahniah !.Maklumat Berjaya di Simpan');
			redirect ('main/list_transaksi' , 'refresh');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */