<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  <!-- utk table -->
  <?php //if($jumlah_transaksi>$jumlah_penggunaan){
  ?>
  <a href="<?php echo base_url();?>index.php/main/form_penggunaan/<?php echo $id_transaksi; ?>">Tambah Transaksi <?php echo $jumlah_transaksi; ?>--<?php echo $jumlah_penggunaan; ?></a>
  <?php
  //}
  ?>
  
  
  
  
  <div class="datagrid">
  
  <table>
    
	<thead>
		<tr>
			<th>Bil.</th>
			<th>Jenis Penggunaan</th>
			<th>Tarikh Penggunaan</th>
			<th>Jumlah Penggunaan</th>				
			<th>Catatan</th>
			<th>a</th>			
		</tr>
	</thead>
	
	<tbody>
			<?php
				$a=1;
				if(count($list) > 0) 
				{
					foreach($list as $row):
			?>
		<tr>
			<td><?php echo $a++; ?></td>
			<td><a href="<?php echo base_url();?>index.php/main/edit_penggunaan/<?php echo $row['id_penggunaan']; ?>"><?php echo $row['jenis_penggunaan']; ?></a></td>	
			<td><?php echo $row['tarikh_penggunaan']; ?></td>				
			
			<td><?php echo $row['jumlah_penggunaan']; ?></td>
			<td><?php echo $row['catatan_penggunaan']; ?></td>	
			<td><a href="<?php echo base_url () ; ?>
				index.php/main/del_penggunaan/<?php echo $row ['id_penggunaan'];?>" class="ico ico-delete" 
				onClick = "return confirm('Are you sure? ')"><img src="<?php echo base_url(); ?>images/delete.gif"/></a>
				
				</td>
		</tr>
		<?php endforeach; ?>
			<?php
				} 
				else 
				{
					echo '<tr ><td colspan="4"><div><strong><center>Tiada Rekod.</center></strong></div></td></tr>';
				}
			?>
	</tbody>
</table>
</div>
  <!-- end table -->
  

  </div>
  <!-- end .grid_9 -->
  
 <div class="grid_12">
   <?php echo $this->load->view('footer'); ?>
  </div> 
</div>
<!-- end .container_12 -->


</body>
</html>