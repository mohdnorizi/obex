<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  <br>
  <!-- utk table -->
  <div class="datagrid">
  <table>
	<thead>
	
		<tr>
			<th>Ringkasan Laporan Keseluruhan Kewangan anda.</th>
			<th>(RM)</th>
					
		</tr>
	</thead>
	
	<tbody>
		<?php foreach($sum_by_bank->result() as $row):?>
		<tr>
			<td>Jumlah Keseluruhan <?php echo $row->nama_bank; ?>-<?php echo $row->no_akaun_bank; ?></td>
			<td><?php echo $row->sum; ?></td>
						
		</tr>
		<?php endforeach; ?>	
		<tr>
			<td>Jumlah Keseluruhan Pendapatan</td>
			<td><?php echo $jumlah_masuk; ?></td>
						
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Pengeluaran</td>
			<td><?php echo $jumlah_keluar; ?></td>
						
		</tr>
		<tr>
			<td>Jumlah Baki Keseluruhan </td>
			<td><?php echo $jumlah_masuk-$jumlah_keluar; ?></td>
						
		</tr>
		
	</tbody>
</table>
</div>
  <!-- end table -->
  <br>
  
  <br>
  <!-- utk table -->
  <div class="datagrid">
  <table>
	<thead>
		<tr>
			<th>Ringkasan Laporan Bulan <?php echo date('m-Y'); ?> Kewangan anda.</th>
			<th>(RM)</th>
					
		</tr>
	</thead>
	
	<tbody>
		
		<tr>
			<td>Jumlah Keseluruhan Pendapatan</td>
			<td><?php echo $jumlah_masuk_ths_month; ?></td>
						
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Pengeluaran</td>
			<td><?php echo $jumlah_keluar_ths_month; ?></td>
						
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Baki</td>
			<td><?php echo $jumlah_masuk_ths_month-$jumlah_keluar_ths_month; ?></td>
				
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Penggunaan Pengeluaran </td>
			<td><?php echo $jumlah_penggunaan_ths_month; ?></td>
				
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Di Tangan <?php echo $a = $jumlah_keluar_lastmonth-$jumlah_penggunaan_lastmonth; ?>-<?php echo $jumlah_penggunaan_ths_month; ?></td>
			<td><?php $a = $jumlah_keluar_lastmonth-$jumlah_penggunaan_lastmonth;
			
			echo ($a+$jumlah_keluar_ths_month)-$jumlah_penggunaan_ths_month; ?></td>
				
		</tr>
		
	</tbody>
</table>
</div>
  <!-- end table -->
  <br>
  <!-- utk table -->
  <div class="datagrid">
  <table>
	<thead>
		<tr>
			<th>Ringkasan Laporan Bulan <?php 
						$lastmonth = mktime(0,0,0,date("m")-1,date("d"),date("Y"));
			$lastmonth = date("m-Y", $lastmonth);
						
						echo $lastmonth; ?> Kewangan anda.</th>
			<th>(RM)</th>
					
		</tr>
	</thead>
	
	<tbody>
		
		<tr>
			<td>Jumlah Keseluruhan Pendapatan</td>
			<td><?php echo $jumlah_masuk_lastmonth; ?></td>
						
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Pengeluaran</td>
			<td><?php echo $jumlah_keluar_lastmonth; ?></td>
						
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Baki</td>
			<td><?php echo $jumlah_masuk_lastmonth-$jumlah_keluar_lastmonth; ?></td>
				
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Penggunaan Pengeluaran </td>
			<td><?php echo $jumlah_penggunaan_lastmonth; ?></td>
				
		</tr>
		<tr>
			<td>Jumlah Keseluruhan Di Tangan <?php echo $jumlah_keluar_lastmonth; ?>-<?php echo $jumlah_penggunaan_lastmonth; ?></td>
			<td><?php echo $jumlah_keluar_lastmonth-$jumlah_penggunaan_lastmonth; ?></td>
				
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
    load('main/prosess_todo_done/'+selected_kategori,'#subkategori');
}
</script>
</html>