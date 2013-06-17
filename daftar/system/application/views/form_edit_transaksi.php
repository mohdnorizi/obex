<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  
  
	
		
		
  <!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/prosess_edit_transaksi" >
    <fieldset>
    	<legend>Kemaskini Transaksi</legend>
        
        
        <div class="grid-6-12">
                <label>Jenis Transaksi <em class="formee-req">*</em></label>
				<select class="" name="jenis_transaksi" id="jenis_transaksi">
                    <option value="1"  <?php if($jenis_transaksi=='1'){ echo "selected"; } ?>>MASUK</option>
                    <option value="2" <?php if($jenis_transaksi=='2'){ echo "selected"; } ?>>KELUAR</option>                    
                </select>
               
        </div>
        <div class="grid-6-12">
                <label>Tarikh <em class="formee-req">* (2012-01-01)</em></label>
               <input type="text" name="tarikh" id="tarikh" class="formee-error" value="<?php if($act=='edit_transaksi'){ echo $tarikh_transaksi;  }else{echo date('Y-m-d'); } ?>" />
        </div>
        <div class="grid-12-12">
                <label>Jumlah <em class="formee-req">*</em></label>
               <input type="text" name="jumlah" id="jumlah" value="<?php echo $jumlah_transaksi; ?>" />
        </div>
        <div class="grid-12-12">
                <label>Akaun Bank <em class="formee-req">*</em></label>
				<select class="" name="id_bank" id="id_bank">
				<?php foreach($list_bank->result() as $row):?>
                    <option value="<?php echo $row->id_bank; ?>" <?php if($id_bank==$row->id_bank){ echo "selected"; } ?>><?php echo $row->nama_pemilik; ?><?php //echo $row->nama_bank; ?>-<?php echo $row->no_akaun_bank; ?></option>
                    <?php endforeach; ?>                    
                </select>
               
        </div>
        
        
        
		<div class="grid-12-12">
				<input class="right" type="hidden" name="key" id="key" value="<?php echo $id_transaksi; ?>" />
               <input class="right" type="submit" title="send" value="send" />
        </div>
        
        
        
    </fieldset>
	
	</form>
	<!-- formee-->

  </div>
  <!-- end .grid_9 -->
  
 <div class="grid_12">
   <?php echo $this->load->view('footer'); ?>
  </div> 
</div>
<!-- end .container_12 -->


</body>
</html>