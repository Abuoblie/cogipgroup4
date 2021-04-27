<?php
   require_once "../include/header.php";




      $verify = new Validation();
      if (isset($_POST['submit'])) {
              
              $verify->validateInvoice();
	     
      }
      


?>

<div class="row justify-content-center">
 
		<form action="newInvoice.php" method="POST">
              
			<div
				style="width: 50%; height: 30%; position: relative; margin-left: auto; margin-right: auto;">
				<div class="form-group mb-2">
					<label class="control-label" for="number">invoice number</label> <input
						type="text" id="number" required maxlength="48"
						name="number" class="form-control"
						placeholder="Enter invoice number">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="invoice_date">invoice date</label>:</label> <input
						type="date" id="invoice_date" required maxlength="48" name="invoice_date"
						class="form-control" placeholder="Enter invoice date">
				</div>
				
				
				<div class="form-group mb-2">
					<label class="control-label" for="id_Company">Company:</label>
					   
						
				    <select name="id_company" id="company"> 
				       <?php
    				      $dataInvoice=  new Validation();
    				      $resultInvoice = $dataInvoice -> getCompanies(1,1);
                                      var_dump($resultInvoice);
    				      foreach($resultInvoice as $row ){
    				    		 echo "<option  value='{$row['id_Company']}'>{$row['name']}</option>"; 
    				      } 
				       ?> 		    			
				     </select>
                                   
				</div>
                                <div class="form-group mb-2">
					<label class="control-label" for="id_Company">Contact person:</label>
					   
                                     <select name="id_people" id="company" > 
				       
				       <?php
    				      
    				      $resultInvoice = $dataInvoice -> getPeople(1,1);
    				      foreach($resultInvoice as $row ){
    				    		 echo "<option  value='{$row['id_People']}'>{$row['first_name']} {$row['last_name']}</option>"; 
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
