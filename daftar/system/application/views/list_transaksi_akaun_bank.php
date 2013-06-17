<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  <form class="formee" method="post" action="<?php echo base_url();?>index.php/main/list_transaksi" >
    <fieldset>
    	<legend>Carian</legend>        
        
        
		<div class="grid-6-12">
                <label>Tarikh Mula <em class="formee-req">* (2012-01-01)</em></label>
               <input type="text" name="tarikh_start" id="tarikh_start" class="formee-error" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="grid-6-12">
                <label>Tarikh Hingga<em class="formee-req">* (2012-01-01)</em></label>
               <input type="text" name="tarikh_end" id="tarikh_end" class="formee-error" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="grid-12-12">
                <label>Akaun Bank <em class="formee-req">*</em></label>
				<select class="" name="id_bank" id="id_bank">
				<option value="" selected>-SEMUA-</option>
                    <?php foreach($list_bank->result() as $row):?>
                    <option value="<?php echo $row->id_bank; ?>"><?php echo $row->nama_pemilik; ?><?php //echo $row->nama_bank; ?> ( <?php echo $row->nama_bank; ?> : <?php echo $row->no_akaun_bank; ?>)</option>
                    <?php endforeach; ?>                     
                </select>
               
        </div>
        
        
        <div class="grid-12-12">
               <input class="right" type="submit" name="submit" id="submit" title="send" value="submit" />
        </div>
    </fieldset>
	</form>
  <!-- utk table -->
  <div class="datagrid">
  <table>
	<thead>
		<tr>
			<th>Bil.</th>
			<th>Tarikh</th>
			<th>Akaun Bank</th>
			<th>Bank</th>
			<th>Masuk</th>
			<th>Keluar</th>
			
			<th>Catatan</th>	
			<th>a</th>			
		</tr>
	</thead>
	
	<tbody>
			<?php
				$a = $this->uri->segment(4,0);
			if(!empty($a))
			{
				$bil = $a+1;
			}else{
				$bil=1;
			}
				$total_masuk=0;
				$total_keluar=0;
				if(count($list) > 0) 
				{
					foreach($list as $row):
			?>
		
		<tr>
			<td><?php echo $bil++; ?></td>
			<td><?php echo $row['tarikh_transaksi']; ?></td>
			<td><a href="<?php echo base_url();?>index.php/main/edit_transaksi/<?php echo $row['id_transaksi']; ?>"><?php echo $row['nama_pemilik']; ?> : <?php echo $row['no_akaun_bank']; ?>)</a></td>	
			<td><?php echo $row['nama_bank']; ?> </td>			
			<td><?php echo $row['jumlah_transaksi'];  ?></td>	
			<td ><?php  echo $row['jumlah_penggunaan'];  ?></td>	
			
			<td><?php //echo $row['catatan_penggunaan']; ?></td>	<td><a href="<?php echo base_url () ; ?>
				index.php/main/del_transaksi/<?php echo $row ['id_transaksi'];?>" class="ico ico-delete" 
				onClick = "return confirm('Are you sure? ')"><img src="<?php echo base_url(); ?>images/delete.gif"/></a>
				
				</td>			
		</tr>
		<?php 
		
		$total_masuk =$total_masuk + $row['jumlah_transaksi']; 
		
		$total_keluar =$total_masuk - $row['jumlah_transaksi']; 
		
		endforeach; ?>
			<?php
				} 
				else 
				{
					echo '<tr ><td colspan="4"><div><strong><center>Tiada Rekod.</center></strong></div></td></tr>';
				}
			?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>Jumlah Masuk</td>
			<td>Jumlah Keluar</td>					
			<td>Baki</td>				
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><?php echo $jumlah_masuk; ?></td>
			<td><?php echo $jumlah_keluar; ?></td>					
			<td><?php echo $jumlah_masuk-$jumlah_keluar; ?></td>				
		</tr>
		<tr>
			<td colspan="8"><div class="pagination">
            <?php echo $this->pagination->create_links(); ?>
          </div></td>
							
		</tr>
		
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