<?php
  require_once "../include/header.php";



      
$verify = new Validation();
      if (isset($_POST['submit'])) {
              
              $verify->validatePeople();
      }
      


?>

<div class="row justify-content-center">
 
		<form action="newContact.php" method="POST">
              
			<div
				style="width: 50%; height: 30%; position: relative; margin-left: auto; margin-right: auto;">
				<div class="form-group mb-2">
					<label class="control-label" for="firstName">First Name:</label> <input
						type="text" id="firstName" required maxlength="48"
						name="firstName" class="form-control"
						placeholder="Enter your First Name">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="lastName">Last Name:</label> <input
						type="text" id="lastName" required maxlength="48" name="lastName"
						class="form-control" placeholder="Enter your Surname">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="telephone">Telephone</label> <input
						type="text" id="telephone" required maxlength="48" name="telephone"
						class="form-control" placeholder="Enter your Phone Number">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="email">Email:</label> <input
						type="text" id="email" required maxlength="48" name="email"
						class="form-control" placeholder="Enter your Email">
				</div>
				<div class="form-group mb-2">
					<label class="control-label" for="id_Company">Company:</label>
					   
						
				    <select name="id_company" id="company"> 
				       <?php
				       $dataCompany =  new Validation();
    				      $resultCompany = $dataCompany -> getCompanies(1,1);
    				      foreach($resultCompany as $row ){
    				    		 echo "<option value='{$row['id_Company']}'>{$row['name']}</option>"; 
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
