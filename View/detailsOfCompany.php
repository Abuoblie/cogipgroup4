<?php
  require_once "../include/header.php";
 
?>
 <?php
 $data =  new Validation();
         $result = $data -> getCompanies('c.id_Company',$_GET['edit']);
     
        foreach($result as $row){
  ?>
<div class="container-md"> 
<h4 style='text-align:center'>Company: <?php echo $row['name'];?></h4>
<table class="table">
	<thead>
		<tr>
			<th>Company Name:</th>
			<th>Country:</th>
			<th>TVA Number:</th>
		</tr>
	</thead>
	
     
      <h5>VAT:<?php echo  $row['vat'];?></h5>
      <?php if($row['id_Type'] == 1){ ?>
        <h5>Type: Provider</h5>  
      <?php } else{ ?>
        <h5>Type: Client</h5>
      <?php } ?>
      </br></br>
      <h5>Contact Persons:</h5>  
     <tr>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['country']; ?></td>
		<td><?php echo $row['vat']; ?></td>
		
	</tr>
	<?php } ?>
	
</table>
<table class="table">
    <?php
	$resultFactures = $data -> getInvoice('c.id_Company',$_GET['edit']);
		 foreach($resultFactures as $row){
	?>
	<thead>
		<tr>
			<th>Invoice Number</th>
			<th>Invoice Date</th>
			<th>Email</th>
		</tr>
	</thead>	
	
	    </br></br>
	    <h5>Factures:</h5>
     <tr>
		<td><?php echo $row['number']; ?></td>
		<td><?php echo $row['invoice_date']; ?></td>
		<td><?php echo $row['email']; ?></td>
		
	<?php } ?>
</table>	
	
	 <?php
	   //edit
	   if(isset($_GET['edit'])){
	       $id = $_GET['edit'];
	       $idTeste = $id;
	       $update = true;
	       $resultEdit = $data -> getCompanies('id_Company',$id);
	       if($resultEdit != null ){
	         
	         foreach($resultEdit as $row){
	           $name = $row['name'];
	           $country= $row['country'];
	           $vat= $row['vat'];  
	         }
	     }
	 }
     ?>           
</table>
</div>
<?php
require_once "../include/footer.php";
?>
