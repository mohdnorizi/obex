<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  
  
	
		
		
  <!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/prosess_edit_penggunaan" >
    <fieldset>
    	<legend>Maklumat Penggunaan</legend>
        
        
        <div class="grid-6-12">
                <label>jenis Penggunaan <em class="formee-req">*</em></label>
				<select class="" name="jenis_penggunaan" id="jenis_penggunaan">
                    <?php foreach($list_jenis_penggunaan->result() as $row):?>
                    <option value="<?php echo $row->id_jenis_penggunaan; ?>" <?php if($id_jenis_penggunaan==$row->id_jenis_penggunaan){ echo "selected"; } ?>><?php echo $row->jenis_penggunaan; ?></option>
                    <?php endforeach; ?>                     
                </select>
               
        </div>
        <div class="grid-6-12">
                <label>Tarikh Penggunaan<em class="formee-req">* (2012-01-01)</em></label>
               <input type="text" name="tarikh_penggunaan" id="tarikh_penggunaan" class="formee-error" value="<?php echo $tarikh_penggunaan; ?>" />
        </div>
        <div class="grid-12-12">
                <label>Jumlah Penggunaan<em class="formee-req">*</em></label>
               <input type="text" name="jumlah_penggunaan" id="jumlah_penggunaan" value="<?php echo $jumlah_penggunaan; ?>" />
        </div>
        <div class="grid-12-12">
                <label>catatan<em class="formee-req">*</em></label>
               <textarea rows="" cols="" name="catatan" id="catatan"><?php echo $catatan_penggunaan; ?></textarea>
        </div>
        
        <div class="grid-12-12">
		<input class="right" type="hidden" name="key" id="key" value="<?php echo $id_penggunaan; ?>" />
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