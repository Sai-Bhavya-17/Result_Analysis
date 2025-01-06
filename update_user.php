<!-- delete modal -->
	<div class="modal fade" id="update_modal<?php echo $row['Database']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header">
					<h3 class="modal-title">Delete Database</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Database</label>
							
							<input type="text" name="db" value="<?php echo $row['Database']?>" class="form-control" required="required"/>
						</div>
						
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span> Delete</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
	
	<?php 
if(ISSET($_POST['update'])){
    $db = $_POST['db'];
    
    $insert= $conn->query("Drop DATABASE $db");
    if($insert ){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
         var r= window.confirm('Succesfully Removed..');
    if (r)
    {
      window.location.href='';
    }
    else
   {
    window.location.href='';
            
    }
       </SCRIPT>
       ");
    }else{
        echo '<script language="javascript">';
        echo 'alert("Operation failed, please try again.")';
        echo '</script>';
        
    }
    
    
}
?>
	