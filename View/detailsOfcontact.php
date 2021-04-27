<?php
  require_once "../include/header.php";


    
    $first_name = '';
    $last_name= '';
    $email= '';
    $pswd='';

    $data =  new Validation();
    $result = $data -> getInvoice('i.id_People',$_GET['edit']);
        foreach($result as $row){
 ?>
<h4 style='text-align:center'>Contact: <?php echo " {$row['first_name']} {$row['last_name']}" ?></h4>
<h5 style='margin-left:7%'>Contact:  <?php echo " {$row['first_name']} {$row['last_name']}" ?></h5>
<h5 style='margin-left:7%'>Company: <?php echo $row['name'];?></h5>
<h5 style='margin-left:7%'>Email: <?php echo $row['email'];?></h5>
<h5 style='margin-left:7%'>Phone: <?php echo $row['telephone'];?></h5>

</br></br>
<h4 style='margin-left:7%'>Contact Person for these invoices:</h4>

<div class="container-md">
    <table class="table">
    	<thead>
    		<tr>
    			<th>Invoice Number:</th>
    			<th>Date:</th>
    		</tr>
    	</thead>
    	
         
         <tr>
    		<td><?php echo $row['number']; ?></td>
    		<td><?php echo $row['invoice_date']; ?></td>
    		
    	</tr>
    	<?php } ?>
    </table>
</div>
<?php
require_once "../include/footer.php";
?>
