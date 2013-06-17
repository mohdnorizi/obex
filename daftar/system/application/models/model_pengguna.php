<?php
/**********************************************/
/* Unit Pasukan Pembangunan Aplikasi 
/* Bahagian Teknologi Maklumat
/* Kementerian Dalam Negeri

/* Dibangunkan pada Mac 2012 
/*
/* Ketua Projek 
/*	---> Puan Ibriza Binti Ibrahim F48
/*
/* Penasihat Projek 
/*	---> Puan Izyanie Binti Mustafar F44
/*
/*	
/* Ketua Pengaturcaraan 
/*	---> Mohd Norizi Bin Abd Manah F29
/*			*norizi@gmail.com
/*			*012 2010 335
/*		
/* Penganalisis Pangkalan Data
/*	---> En Naim Bin Ibrahim F41
/*	---> Mohd Norizi Bin Abd Manah F29
/*	---> En Nazri Bin Salim F32
/*
/* Pasukan Pengaturcaraan  
/*	---> Mohamad Farin Bin Mustafa F29
/*	---> Noor Arasiah F29
/*	---> Janarthanam F29
/*	---> Fauziah Awang PSH
/*	
/*
/**********************************************/

class model_pengguna extends Model {


	function model_pengguna()
	{
		parent::Model();		
	}
	
	function list_pengguna($perPage,$uri,$type,$nilai)
	{
		
		//Untuk Carian
		if(!empty($nilai)){
			if($type=='nokp'){
				$this->db->where('id_pengguna',$nilai);
			}else{			
				$this->db->where('nama',$nilai);		
			}	
		}
		
		$this->db->select('*');
		$this->db->join('adm_peranan_rela', 'adm_peranan_rela.id_adm_peranan_rela = adm_pengguna.id_adm_peranan_rela');
		$this->db->from('adm_pengguna');
		  
		$getData = $this->db->get('',$perPage, $uri);

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
	
		$getData = $this->db->query("SELECT adm_modul.id_adm_modul as id_adm_modul, jenis_modul, nama_modul,nama_fungsi FROM adm_modul LEFT JOIN adm_peranan_modul ON adm_modul.id_adm_modul = adm_peranan_modul.id_adm_modul AND id_adm_peranan_rela = '$id' WHERE adm_peranan_modul.id_adm_peranan_rela IS NULL ORDER BY jenis_modul");
		
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
	
	
	function list_audit($perPage,$uri)
	{
		
		
		
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
	
}

