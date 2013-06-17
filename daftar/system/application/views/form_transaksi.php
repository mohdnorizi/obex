<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  
  
	
		
		
  <!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/prosess_form_transaksi" >
    <fieldset>
    	<legend>Tambah Transaksi</legend>
        
        
		
        <div class="grid-6-12">
                <label>Jenis Transaksi <em class="formee-req">*</em></label>
				 <?php echo $this->lib_general->create_combobox('kategori',$list_negeri,'id_jenis_transaksi','jenis_transaksi','onchange="tampilkan_subkategori()"');?>
               
        </div>
        <div class="grid-6-12">
                <label>Tarikh <em class="formee-req">* (2012-01-01)</em></label>
               <input type="text" name="tarikh" id="tarikh" class="formee-error" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="grid-12-12">
                <label>Jumlah <em class="formee-req">*</em></label>
               <input type="text" name="jumlah" id="jumlah" value="" />
        </div>
        <div class="grid-6-12">
                <label>Akaun Bank <em class="formee-req">*</em></label>
				<select class="" name="id_bank" id="id_bank">
				<?php foreach($list_bank->result() as $row):?>
                    <option value="<?php echo $row->id_bank; ?>"><?php echo $row->nama_pemilik; ?><?php //echo $row->nama_bank; ?>-<?php echo $row->no_akaun_bank; ?></option>
                    <?php endforeach; ?>                    
                </select>
               
        </div>
        
        
        
    </fieldset>
	
	<fieldset>
    	<legend>Maklumat Penggunaan</legend>
        
        
        <div class="grid-6-12">
                <label>jenis Penggunaan <em class="formee-req">*</em></label>
				<span id='subkategori'></span>
               
        </div>
        <div class="grid-6-12">
                <label>Tarikh Penggunaan<em class="formee-req">* (2012-01-01)</em><input type="checkbox" name="tarikh_" onclick="FillTarikh(this.form)"> Samakan dengan Tarikh di atas.</label>
               <input type="text" name="tarikh_penggunaan" id="tarikh_penggunaan" class="formee-error" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="grid-12-12">
                <label>Jumlah Penggunaan <em class="formee-req">*</em><input type="checkbox" name="billingtoo" onclick="FillBilling(this.form)"> Samakan dengan jumlah di atas.</label>
               <input type="text" name="jumlah_penggunaan" id="jumlah_penggunaan"  />
        </div>
        <div class="grid-12-12">
                <label>catatan<em class="formee-req">*</em></label>
               <textarea rows="" cols="" name="catatan" id="catatan"></textarea>
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

<script language='javascript' type='text/javascript'>
function load(page,div)
{
    var site = "<?php echo site_url();?>";
    $.ajax({
        url: site+"/"+page,
        success: function(response){
            $(div).html(response);
        },
    dataType:"html"
    });
    return false;
}
function tampilkan_subkategori()
{
    var selected_kategori = $('select[name=kategori]').val();
    load('main/tampilkan_subkategori/'+selected_kategori,'#subkategori');
}
</script>
<script type = "text/javascript">
function FillBilling(f) {
  if(f.billingtoo.checked == true) {
    f.jumlah_penggunaan.value = f.jumlah.value;
	
    
  }
}

function FillTarikh(f) {
  if(f.tarikh_.checked == true) {
    f.tarikh_penggunaan.value = f.tarikh.value;
	
    
  }
}

</script>
</body>
</html>