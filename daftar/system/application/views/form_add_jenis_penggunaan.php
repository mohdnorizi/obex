<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  <!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/prosess_add_jenis_penggunaan">
    <fieldset>
    	<legend>Tambah Jenis Bank</legend>
        
        
        
        
        <div class="grid-12-12">
                <label>Jenis Bank <em class="formee-req">*</em></label>
               <input type="text" name="jenis_bank" id="jenis_bank" value="" />
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