<?php echo $this->load->view('top'); ?>
<div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
<br />
<br />

<center><h3>BORANG PENDAFTARAN</h3></center>
  <br />
  <!-- end .grid_3 -->
  <div class="grid_9">
  <?php if ($flash_success!='') { ?>
	<div class="formee-msg-success"><h3><?php echo $flash_success; ?></h3></div>
	<?php } ?>	
    
    <?php if ($flash_error!='') { ?>
	<div class="formee-msg-error"><h3><?php echo $flash_error; ?></h3></div>
	<?php } ?>	
  
  
	
		
		
  <!-- formee-->
	<form class="formee" method="post" id="myform" name="myform" action="<?php echo base_url();?>index.php/main/daftar_proses" onsubmit="return(validate());">
    
        
        
        
        
        <div class="grid-12-12">
                <label>Nama : <em class="formee-req">*</em></label>
               <input type="text" name="nama" id="nama" class="formee-error" value="" />
        </div>
        
        <div class="grid-12-12">
                <label>No. KP : <em class="formee-req">*</em></label>
               <input type="text" name="nokp" id="nokp" class="formee-error" value="" maxlength="12" placeholder="Contoh : 650320015067"/>  
        </div>
        
        <div class="grid-12-12">
                <label>Alamat Penuh : <em class="formee-req">* (Sila isi semua ruang alamat.)</em></label>
               <input type="text" name="alamat1" id="alamat1" class="formee-error" value="" />
        </div>
        
        <div class="grid-12-12">
                <label> <em class="formee-req"></em></label>
               <input type="text" name="alamat2" id="alamat2"  value="" />
        </div>
        
        <div class="grid-12-12">
                <label> <em class="formee-req"></em></label>
               <input type="text" name="alamat3" id="alamat3"  value="" />
        </div>
        
        <div class="grid-12-12">
                <label>Poskod : <em class="formee-req">*</em></label>
               <input type="text" name="poskod" id="poskod"  value="" />
        </div>
        
        <div class="grid-6-12">
                <label>Negeri : <em class="formee-req">*</em></label>				
                <select name="negeri" id="negeri" class="formee-error">
                    <option value="0">-Pilih Negeri-</option>
                    <option value="JOHOR">JOHOR</option>
                    <option value="KEDAH">KEDAH</option>
                    <option value="KELANTAN">KELANTAN</option>
                    <option value="MELAKA">MELAKA</option>
                    <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
                    <option value="PAHANG">PAHANG</option>
                    <option value="PERAK">PERAK</option>
                    <option value="PERLIS">PERLIS</option>
                    <option value="PULAU PINANG">PULAU PINANG</option>
                    <option value="SABAH">SABAH</option>
                    <option value="SARAWAK">SARAWAK</option>
                    <option value="SELANGOR">SELANGOR</option>
                    <option value="TERENGGANU">TERENGGANU</option>
                    <option value="WILAYAH PERSEKUTUAN">WILAYAH PERSEKUTUAN</option>
                    <option value="WP PUTRAJAYA">WP PUTRAJAYA</option>
		</select>                  
               
        </div>
        
        <div class="grid-12-12">
                <label>Daerah : <em class="formee-req">*</em></label>
               <input type="text" name="daerah" id="daerah"  value=""class="formee-error" />
        </div>
        
        
        <?php /*?>
        <div class="grid-12-12">
                <label>Tarikh Lahir : <em class="formee-req">* Cth : 14-01-2013</em></label>
               <input type="text" name="tarikh_lahir" id="tarikh_lahir"  value="" class="formee-error" />
        </div>
       
         <div class="grid-12-12">
                <label>No. Tel Rumah : <em class="formee-req"></em></label>
               <input type="text" name="notel_rumah" id="notel_rumah"  value="" />
        </div>
        <div class="grid-12-12">
                <label>No. Tel. Pejabat : <em class="formee-req"></em></label>
               <input type="text" name="notel_pej" id="notel_pej"  value="" />
        </div>
		 <?php */?>
        <div class="grid-12-12">
                <label>No. Tel. Bimbit : <em class="formee-req">*</em></label>
               <input type="text" name="notel_hp" id="notel_hp"  value="" class="formee-error"/>
        </div>
        
      <?php /*?>  <div class="grid-6-12">
                <label>Negeri Lahir : <em class="formee-req">*</em></label>
				
                <select class="formee-error" name="negeri_lahir" id="negeri_lahir">
                    <option value="0">-Pilih Negeri-</option>
                    <option value="JOHOR">JOHOR</option>
                    <option value="KEDAH">KEDAH</option>
                    <option value="KELANTAN">KELANTAN</option>
                    <option value="MELAKA">MELAKA</option>
                    <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
                    <option value="PAHANG">PAHANG</option>
                    <option value="PERAK">PERAK</option>
                    <option value="PERLIS">PERLIS</option>
                    <option value="PULAU PINANG">PULAU PINANG</option>
                    <option value="SABAH">SABAH</option>
                    <option value="SARAWAK">SARAWAK</option>
                    <option value="SELANGOR">SELANGOR</option>
                    <option value="TERENGGANU">TERENGGANU</option>
                    <option value="WILAYAH PERSEKUTUAN">WILAYAH PERSEKUTUAN</option>
                    <option value="WP PUTRAJAYA">WP PUTRAJAYA</option>
		</select>  
               
        </div>
        
        <div class="grid-6-12">
                <label>Jantina : <em class="formee-req">*</em></label>
				<select class="formee-error" name="jantina" id="jantina">
                    <option value="Lelaki">Lelaki</option>
                    <option value="Perempuan">Perempuan</option>                    
                </select>
               
        </div>
        
        <div class="grid-12-12">
                <label>Pekerjaan : <em class="formee-req"></em></label>
               <input type="text" name="pekerjaan" id="pekerjaan"  value="" />
        </div>
        
        <div class="grid-6-12">
                <label>Perkasa Negeri : <em class="formee-req">*</em></label>
				                
                <select class="formee-error"name="perkasa_negeri" id="perkasa_negeri">
                    <option value="0">-Pilih Negeri-</option>
                    <option value="JOHOR">JOHOR</option>
                    <option value="KEDAH">KEDAH</option>
                    <option value="KELANTAN">KELANTAN</option>
                    <option value="MELAKA">MELAKA</option>
                    <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
                    <option value="PAHANG">PAHANG</option>
                    <option value="PERAK">PERAK</option>
                    <option value="PERLIS">PERLIS</option>
                    <option value="PULAU PINANG">PULAU PINANG</option>
                    <option value="SABAH">SABAH</option>
                    <option value="SARAWAK">SARAWAK</option>
                    <option value="SELANGOR">SELANGOR</option>
                    <option value="TERENGGANU">TERENGGANU</option>
                    <option value="WILAYAH PERSEKUTUAN">WILAYAH PERSEKUTUAN</option>
                    <option value="WP PUTRAJAYA">WP PUTRAJAYA</option>
		</select>  
               
        </div>
        
        
        <div class="grid-12-12">
                <label>Perkasa Daerah : <em class="formee-req">*</em></label>
               <input type="text" class="formee-error" name="perkasa_daerah" id="perkasa_daerah"  value="" />
        </div><?php */?>
        
		
		
        
        
        
        
        
        
        
        <div class="grid-12-12">
               <input class="right" type="submit" title="send" value="send" />
        </div>
   
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

<script type="text/javascript">
<!--
// Form validation code will come here.
function validate()
{
 	var nokp = nokp.value;
   if( document.myform.nama.value == "" )
   {
     alert( "Sila Masukkan Nama!" );
     document.myform.nama.focus() ;
     return false;
   }
   
   if( document.myform.nokp.value == "" )
   {
     alert( "Sila Masukkan No KP!" );
     document.myform.nokp.focus() ;
     return false;
   }
   
   if(nokp.length < 11){
		alert( "Sila Masukkan No KP 12 Digit" );
     
     	return false;
	}
		
   
   return( true );
}
//-->
</script>