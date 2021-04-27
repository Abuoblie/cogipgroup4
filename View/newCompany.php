<?php 
  require_once "../include/header.php";

?>
 <?php
      
 $verify = new Validation();
      if (isset($_POST['submit'])) {
              
              $verify->validateCompany();
      }
      


?>

<div class="row justify-content-center">
 
		<form action="newCompany.php" method="POST">
              
			<div
				style="width: 50%; height: 30%; position: relative; margin-left: auto; margin-right: auto;">
				<div class="form-group mb-2">
					<label class="control-label" for="name">company name:</label> <input
						type="text" id="name" required maxlength="48"
						name="name" class="form-control"
						placeholder="Enter your company Name">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="vat">vat Number:</label> <input
						type="text" id="vat required maxlength="48" name='vat'
						class="form-control" placeholder="Enter vat number">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="country">country:</label> <input
						type="text" id="country" required maxlength="48" name='country'
						class="form-control" placeholder="Enter country">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="phone">phone</label> <input
						type="text" id="phone" required maxlength="48" name="phone"
						class="form-control" placeholder="Enter your Phone Number">
				</div>
				
				<div class="form-group mb-2">
					<label class="control-label" for="id_Company">Type of Company</label>:</label>
					   
						
				    <select name="id_Type" id="id_Type"> 
				       <?php
				       $Type =  new Validation();
    				      $resultType = $Type -> getType();
				      
    				      foreach($resultType as $row ){
    				    		 echo "<option value='{$row['id_Type']}'>{$row['label']}</option>"; 
    				      } 
				       ?> 		    			
				     </select>
				</div>

				<div class="form-group">
				    
					<button type="submit" class="btn btn-primary"  name="submit">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
require_once "../include/footer.php";
?>
