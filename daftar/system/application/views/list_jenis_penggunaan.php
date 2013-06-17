<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  <!-- utk table -->
  <div class="datagrid">
  <table>
	<thead>
		<tr>
			<th>Bil.</th>
			<th>Jenis Penggunaan</th>	
			<th>Jenis Penggunaan</th>
			<th>&nbsp;</th>			
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
			<td><?php echo $row['jenis_penggunaan']; ?></td>
			<td><?php if($row['jenis_transaksi']==1){ echo "MASUK"; }else{ echo "KELUAR"; } ?></td>
			<td><a href="<?php echo base_url () ; ?>
				index.php/main/del_jenis_penggunaan/<?php echo $row ['id_jenis_penggunaan'];?>" class="ico ico-delete" 
				onClick = "return confirm('Are you sure? ')"><img src="<?php echo base_url(); ?>images/delete.gif"/></a>
				<a href="<?php echo base_url () ; ?>
				index.php/main/edit_jenis_penggunaan/<?php echo $row ['id_jenis_penggunaan'];?>" class="ico ico-delete" 
				onClick = "return confirm('Are you sure? ')"><img src="<?php echo base_url(); ?>images/edit.gif"/></a>
				</td>
			
		</tr>
		<?php endforeach; ?>
			<?php
				} 
				else 
				{
					echo '<tr ><td colspan="2"><div><strong><center>Tiada Rekod.</center></strong></div></td></tr>';
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