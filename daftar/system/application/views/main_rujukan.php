<?php echo $this->load->view('top'); ?>
  <div class="grid_3">
    <?php echo $this->load->view('left'); ?>
  </div>
  <!-- end .grid_3 -->
  <div class="grid_9">
  
  <!-- utk table -->
  <div class="datagrid"><table>
<thead><tr><th>header</th><th>header</th><th>header</th><th>header</th></tr></thead>
<tfoot><tr><td colspan="4">
<div id="paging_table"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>
<tbody><tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>
</tbody>
</table></div>
  <!-- end table -->
  <div class="formee-msg-info">
    	<h3>Information Message</h3>
        <ul>
        	<li>Don't forget to use <strong>for=""</strong> and <strong>id=""</strong> to make your form more accessible</li>
        	<li>We only used <strong>javascript</strong> to guarantee equal height elements (using the <strong>.formee-equal</strong> class)</li>
        </ul>
    
    </div>
	
		<div class="formee-msg-info"><h3>Information Message</h3></div>
        
        <div class="formee-msg-warning"><h3>Warning Message</h3></div>
        
        <div class="formee-msg-error"><h3>Error Message</h3></div>
        
        <div class="formee-msg-success"><h3>Success Message</h3></div>
		
  <!-- formee-->
	<form class="formee" action="">
    <fieldset>
    	<legend>Example of form using Message Box (summary)</legend>
        
        <div class="formee-msg-error">
        	<h3>Can you fix please?</h3>
        	<ul>
          		<li>Please enter a valid <strong>E-Mail ID</strong>.</li>
          		<li>Please enter a valid <strong>Password</strong>.</li>
        	</ul>
        </div>
        <div class="grid-6-12">
                <label>Login <em class="formee-req">*</em></label>
               <input type="text" class="formee-error" value="Fill up the field" />
        </div>
        <div class="grid-6-12">
                <label>Password <em class="formee-req">*</em></label>
               <input type="text" class="formee-error" value="Fill up the field" />
        </div>
        <div class="grid-12-12">
                <label>Field Label aa<em class="formee-req">*</em></label>
               <input type="text" value="Fill up the field" />
        </div>
        <div class="grid-12-12">
                <label>Field Label <em class="formee-req">*</em></label>
               <textarea rows="" cols="" ></textarea>
        </div>
        <div class="grid-12-12">
                <label>Field Label <em class="formee-req">*</em></label>
               <input type="text" class="formee-small" value="Fill up the field" />
               <input type="text" class="formee-medium" value="Fill up the field" />
               <input type="submit" title="send" value="send" />
        </div>
        <div class="grid-12-12">
                <label>Field Label <em class="formee-req">*</em></label>
               <input type="text" class="formee-small" value="Fill up the field" />
                <select class="formee-small">
                    <option>Select</option>
                    <option>Select</option>
                    <option>Select</option>
                </select>
        </div>
        <div class="grid-12-12">
                <label>Field Label <em class="formee-req">*</em></label>
                <select class="formee-small">
                    <option>Select</option>
                    <option>Select</option>
                    <option>Select</option>
                </select>
                <select class="formee-small">
                    <option>Select</option>
                    <option>Select</option>
                    <option>Select</option>
                </select>
               <input type="submit" title="send" value="send" />
               <input type="submit" title="send" value="send" />
               <input type="submit" title="send" value="send" />
        </div>
        <div class="grid-12-12">
                <label>Field Label <em class="formee-req">*</em></label>
               <input type="file" class="formee-small" value="Fill up the field" />
        </div>
        <div class="grid-12-12">
                <label>Field Label <em class="formee-req">*</em></label>
                <ul class="formee-list">
                    <li><input name="checkbox-01" type="checkbox" /> <label>Option 01</label></li>
                    <li><input name="checkbox-01" type="checkbox" /> <label>Option 02</label></li>
                    <li><input name="checkbox-01" type="checkbox" /> <label>Option 03</label></li>
                    <li><input name="checkbox-01" type="checkbox" /> <label>Option 04</label></li>
                </ul>
        </div>
        <div class="grid-12-12">
                <label>Field Label <em class="formee-req">*</em></label>
                <ul class="formee-list">
                    <li><input name="radio-01" type="radio" /><label>Option 01</label></li>
                    <li><input name="radio-01" type="radio" /><label>Option 02</label></li>
                    <li><input name="radio-01" type="radio" /><label>Option 03</label></li>
                    <li><input name="radio-01" type="radio" /><label>Option 04</label></li>
                </ul>
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