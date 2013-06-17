<?php echo $this->load->view('top'); ?>
<div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
<br />
<br />

<center><h3>SEMAKAN KEAHLIAN PERKASA</h3></center>
  <div class="grid_3">
    <?php //echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  <form class="formee" method="post" action="<?php echo base_url();?>index.php/main/semakan" >
         
        
        
		
        <div class="grid-12-12">
                <label>Sila masukkan No. Kad Pengenalan :<em class="formee-req"></em></label>
				<input type="text" class="formee-error" name="nokp" id="nokp"  maxlength="12" placeholder="Contoh : 650320015067"/>
               
        </div>
        
        
        <div class="grid-12-12">
               <input class="right" type="submit" name="submit" id="submit" title="send" value="Semak" />
        </div>
   
	</form>
  <!-- utk table -->
  <?php if($papar==1){?>
  <div class="datagrid">
  <table>
	<thead>
		<tr>
			
			<th>Nama</th>
			<th>No. Kad Pengenalan</th>		
            <th>Negeri</th>				
		</tr>
	</thead>
	
	<tbody>
			<?php
			
				if(!empty($nokp)) 
				{
					
			?>
		
		<tr>
		
			<td><?php echo $nama; ?></td>
			<td> <?php echo $nokp; ?></td>	
			<td> <?php echo $negeri; ?></td>				
		</tr>
		<?php 
		
		
		
		 ?>
			<?php
				} 
				else 
				{
					echo '<tr ><td colspan="4"><div><strong><center>Tiada Rekod.</center></strong></div></td></tr>';
				}
			?>
		
		<tr>
			<td colspan="8"><div class="pagination">
            <?php echo $this->pagination->create_links(); ?>
          </div></td>
		</tr>
	</tbody>
</table>
<?php } ?>

</div>

  <!-- end table -->
  

  </div>
  <!-- end .grid_9 -->
  
 <div class="grid_12">
 <center>
   <?php //echo $this->load->view('footer'); ?>
   </center>
  </div> 
</div>
<!-- end .container_12 -->


</body>
</html>