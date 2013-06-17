<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  <br>
  <?php if ($flash_success!='') { ?>
	<div class="formee-msg-success"><h3><?php echo $flash_success; ?></h3></div>
	<?php } ?>	
  <!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/prosess_form_todo">
    <fieldset>
    	<legend>Todo List</legend>
        
		<div class="grid-6-12">
                <label>Tarikh <em class="formee-req">*</em></label>
               <input type="text" class="formee-error" name="tarikh" id="tarikh" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        
        <div class="grid-12-12">
                <label>Catatan <em class="formee-req">*</em></label>
               <textarea rows="" cols="" name="catatan" id="catatan"></textarea>
        </div>
        
        
        <div class="grid-12-12">
               <input class="right" type="submit" title="send" value="send" />
        </div>
	</form>
	<!-- formee-->	
	<!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/del_todo_undone">
		<div class="grid-12-12">
				<input class="right" type="submit" name="delete" value="delete" />
               <input class="right" type="submit" name="done" value="Done" />
        </div>
        <div class="formee-msg-warning">
        	<h3>Todo urgent must done !</h3>
        	<ul>
				<?php
				$bil=1;
          		foreach($list_todo_urgent->result() as $row):?>
          		<li><?php echo $bil++; ?>. <?php echo $row->catatan_todo; ?><strong> <?php echo $row->tarikh; ?></strong> <input name="undone[]" type="checkbox" value="<?php echo $row->id_todo; ?>"/></li>
          		
				<?php endforeach; ?>
        	</ul>
        </div>
		</form>
	<!-- formee end urgent todo-->
	<!-- formee-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/del_todo_undone">
		<div class="grid-12-12">
				<input class="right" type="submit" name="delete" value="delete" />
               <input class="right" type="submit" name="done" value="Done" />
        </div>
		<div class="formee-msg-info">
        	<h3>Todo Undone !</h3>
        	<ul>
				<?php 
				$bil=1;
				
				foreach($list_todo_undone->result() as $row):?>
          		<li><?php echo $bil++; ?>. <?php echo $row->catatan_todo; ?><strong> <?php echo $row->tarikh; ?></strong> <input name="undone[]" type="checkbox" value="<?php echo $row->id_todo; ?>"/></li>
          		
				<?php endforeach; ?>
        	</ul>
        </div>
		</form>
	<!-- formee end todo undone-->
	<form class="formee" method="post" action="<?php echo base_url();?>index.php/main/del_todo_done">
		<div class="grid-12-12">
				<input class="right" type="submit" name="delete" value="delete" />
               <input class="right" type="submit" name="done" value="Undone" />
        </div>
		<div class="formee-msg-success">
        	<h3>Todo Done.</h3>
        	<ul>
				
          		<?php
				$bil=1;
          		foreach($list_todo_done->result() as $row):?>
          		<li><?php echo $bil++; ?>. <?php echo $row->catatan_todo; ?><strong> <?php echo $row->tarikh; ?></strong> <input name="undone[]" type="checkbox" value="<?php echo $row->id_todo; ?>"/></li>
          		
				<?php endforeach; ?>
        	</ul>
        </div>
        </form>
	<!-- formee end todo done-->
    </fieldset>
	
  
	
	
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