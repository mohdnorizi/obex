<?php echo $this->load->view('top'); ?>
<br />
<br />

<center>
  <h3>Login</h3>
</center>
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
	<form class="formee" method="post" id="myform" name="myform" action="<?php echo base_url();?>index.php/main/login_proses" onsubmit="return(validate());">
    
        
        
        
        
        
        
        
        <div class="grid-12-12">
                <label>Pin : <em class="formee-req">*</em></label>
               <input type="text" class="formee-error" name="pin" id="pin"  value="" />
        </div>
        
		
		
        
        
        
        
        
        
        
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
 	var pin = pin.value;
   if( document.myform.pin.value == "" )
   {
     alert( "Sila Masukkan Pin!" );
     document.myform.pin.focus() ;
     return false;
   }   
     
   
		
   
   return( true );
}
//-->
</script>