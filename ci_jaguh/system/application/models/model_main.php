<?php

class model_main extends Model {


	function model_main()
	{
		parent::Model();		
	}
	
	function list_transaksi($perPage,$uri,$id_bank)
	{
		//Untuk Carian
		if(!empty($id_bank)){
					
			$this->db->where('transaksi.id_bank',$id_bank);	
		}	
		
		$this->db->distinct('id_transaksi.id_transaksi');
		$this->db->select('transaksi.tarikh_transaksi as tarikh_transaksi,transaksi.id_transaksi as id_transaksi,bank.nama_pemilik as nama_pemilik,bank.no_akaun_bank as no_akaun_bank,jenis_bank.nama_bank as nama_bank,transaksi.jenis_transaksi as jenis_transaksi,transaksi.jumlah_transaksi,penggunaan.catatan_penggunaan as catatan_penggunaan');
		$this->db->from('transaksi');		
		$this->db->join('bank','bank.id_bank=transaksi.id_bank','LEFT');
		$this->db->join('jenis_bank','bank.id_jenis_bank=jenis_bank.id_jenis_bank','LEFT');
		$this->db->join('penggunaan','penggunaan.id_transaksi=transaksi.id_transaksi','LEFT');
		$this->db->join('jenis_penggunaan','penggunaan.id_jenis_penggunaan=jenis_penggunaan.id_jenis_penggunaan','LEFT');
		$this->db->group_by('transaksi.id_transaksi');

		$this->db->order_by('tarikh_transaksi','DESC');
		 
		  
		$getData = $this->db->get('',$perPage, $uri);

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	function list_transaksi_detail($id)
	{
		
		//Untuk Carian
		if(!empty($nilai)){
			if($type=='nokp'){
				$this->db->where('nokp',$nilai);
			}else{			
				$this->db->where('nama_pengguna',$nilai);		
			}	
		}
		
		/* $this->db->select('jumlah_transaksi, tarikh_transaksi, SUM(
		CASE WHEN jenis_transaksi =1
		THEN 1
		ELSE 0
		END ) AS masuk, SUM(
		CASE WHEN jenis_transaksi =2
		THEN 1
		ELSE 0
		END ) AS keluar');	*/	
		$this->db->select('*');
		$this->db->from('penggunaan');
		$this->db->join('jenis_penggunaan','penggunaan.id_jenis_penggunaan=jenis_penggunaan.id_jenis_penggunaan');
		$this->db->where('id_transaksi',$id);
		$this->db->where('jumlah_penggunaan !=','0');
		//$this->db->join('penggunaan','penggunaan.id_transaksi=transaksi.id_transaksi','LEFT');
		//$this->db->group_by('tarikh_transaksi');
		 
		  
		$getData = $this->db->get('');

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	
	function list_jenis_bank()
	{
		
		//Untuk Carian
		if(!empty($nilai)){
			if($type=='nokp'){
				$this->db->where('nokp',$nilai);
			}else{			
				$this->db->where('nama_pengguna',$nilai);		
			}	
		}
		
		$this->db->select('*');		
		$this->db->from('jenis_bank');
		  
		$getData = $this->db->get('');

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	function list_bank()
	{
		
		//Untuk Carian
		if(!empty($nilai)){
			if($type=='nokp'){
				$this->db->where('nokp',$nilai);
			}else{			
				$this->db->where('nama_pengguna',$nilai);		
			}	
		}
		
		$this->db->select('*');		
		$this->db->from('bank');
		$this->db->join('jenis_bank','bank.id_jenis_bank=jenis_bank.id_jenis_bank');
		  
		$getData = $this->db->get('');

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	function list_jenis_penggunaan()
	{
		
		//Untuk Carian
		if(!empty($nilai)){
			if($type=='nokp'){
				$this->db->where('nokp',$nilai);
			}else{			
				$this->db->where('nama_pengguna',$nilai);		
			}	
		}
		
		$this->db->select('*');		
		$this->db->from('jenis_penggunaan');
		  
		$getData = $this->db->get('');

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	
	function update_data($table,$key,$data,$field_key)
	{
		$this->db->where($field_key,$key);
		$this->db->update($table, $data); 
	}
	
	function check_user($username, $password) 
	{
		$this->db->where('id_pengguna',$username);
		$this->db->where('katalaluan',$password);
		$query = $this->db->get('adm_pengguna');
		
		if($query->num_rows() > 0) {		
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	function list_kumpulan()
	{
		$this->db->select('*');
		$this->db->from('adm_peranan_rela');
		  
		$getData = $this->db->get('');

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	function list_modul($perPage,$uri,$nama_modul)
	{
		//carian
		if(!empty($nama_modul)){	
			$this->db->like('nama_modul',$nama_modul);
		}
		
		$this->db->orderby('jenis_modul','ASC');
		$this->db->select('*');		
		$this->db->from('adm_modul');		  
		$getData = $this->db->get('',$perPage, $uri);

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	function list_unassign_modul($id)
	{
	
		$getData = $this->db->query("SELECT adm_modul.id_adm_modul as id_adm_modul, jenis_modul, nama_modul,nama_fungsi FROM adm_modul LEFT JOIN adm_peranan_modul ON adm_modul.id_adm_modul = adm_peranan_modul.id_adm_modul AND id_adm_peranan_rela = '$id' WHERE adm_peranan_modul.id_adm_peranan_rela IS NULL");
		
		/*
		$this->db->select('modul.id_modul as id_modul, modul.modul as modul, modul.nama_modul as nama_modul,modul.nama_fungsi as nama_fungsi');
		$this->db->from('modul');
		$this->db->join('peranan_modul', 'modul.id_modul = peranan_modul.id_modul', 'LEFT');
		$this->db->where('id_peranan', $id);
		$this->db->where('peranan_modul.id_peranan',NULL);
		$getData = $this->db->get('');
		*/
		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	function list_assign_modul_access($id)
	{
		$this->db->from('adm_peranan_modul');
		$this->db->order_by('jenis_modul','asc');
		$this->db->where('id_adm_peranan_rela', $id);	
		$this->db->join('adm_modul', 'adm_peranan_modul.id_adm_modul = adm_modul.id_adm_modul');
		$getData= $this->db->get();				

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	
	function list_audit($perPage,$uri,$type,$nilai)
	{
		
		//Untuk Carian
		if(!empty($nilai)){
			if($type=='nokp'){
				$this->db->where('nokp',$nilai);
			}else{			
				$this->db->where('nama_pengguna',$nilai);		
			}	
		}
		
		$this->db->select('*');
		$this->db->join('adm_pengguna', 'adm_pengguna.id_adm_pengguna = adm_audit_trail.id_adm_pengguna');
		$this->db->join('adm_modul', 'adm_modul.id_adm_modul = adm_audit_trail.id_adm_modul');
		$this->db->orderby('created_on', 'DESC');
		$this->db->from('adm_audit_trail');
		  
		$getData = $this->db->get('',$perPage, $uri);

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
	
	function list_transaksi_akaun_bank($perPage,$uri,$id_bank)
	{
		//Untuk Carian
		if(!empty($id_bank)){
					
			$this->db->where('transaksi.id_bank',$id_bank);	
		}	
		
		//$this->db->distinct('id_transaksi.id_transaksi');
		$this->db->from('transaksi');		
		$this->db->join('bank','bank.id_bank=transaksi.id_bank');
		$this->db->join('jenis_bank','bank.id_jenis_bank=jenis_bank.id_jenis_bank');
		$this->db->where('transaksi.jenis_transaksi','1');
		$this->db->join('penggunaan','penggunaan.id_transaksi=transaksi.id_transaksi','LEFT');
		//$this->db->join('jenis_penggunaan','penggunaan.id_jenis_penggunaan=jenis_penggunaan.id_jenis_penggunaan','LEFT');
		//$this->db->group_by('transaksi.id_transaksi');

		$this->db->order_by('tarikh_transaksi','DESC');
		 
		  
		$getData = $this->db->get('',$perPage, $uri);

		if($getData->num_rows() > 0)
			return $getData->result_array();
		else
			return null;
	}
	
}

