<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  
  
	
		
  <!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/prosess_form_akaun_bank">
    <fieldset>
    	<legend>Tambah Maklumat Akaun bank</legend>
        
        
        
        <div class="grid-12-12">
                <label>Jenis Bank <em class="formee-req">*</em></label>
               
                <select class="formee-small" name="id_jenis_bank" id="id_jenis_bank">
				<?php foreach($list_jenis_bank->result() as $row):?>
                    <option value="<?php echo $row->id_jenis_bank; ?>"><?php echo $row->nama_bank; ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="grid-12-12">
                <label>Nama Pemilik <em class="formee-req">*</em></label>
               <input type="text" name="nama_pemilik" id="nama_pemilik" value="" />
        </div>
		<div class="grid-12-12">
                <label>No. Akaun <em class="formee-req">*</em></label>
               <input type="text" name="no_akaun" id="no_akaun" value="" />
        </div>
        
        
        
        
        
        
        
        <div class="grid-12-12">
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