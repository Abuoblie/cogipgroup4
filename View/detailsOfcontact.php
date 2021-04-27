<?php 
  require_once "../include/header.php";


    
    $first_name = '';
    $last_name= '';
    $email= '';
    $pswd='';

    $data =  new Validation();
    $contact = $data -> getContact('id_People',$_GET['edit']);
    $result = $data -> getInvoice('i.id_People',$_GET['edit']);
    foreach($contact as $row){
      echo"<h4 style='text-align:center'> Contact:  {$row['first_name']} {$row['last_name']}</h4>
           <h5 style='margin-left:7%'> Contact:  {$row['first_name']} {$row['last_name']} </h5>
           <h5 style='margin-left:7%'> Company: {$row['name']}</h5>
           <h5 style='margin-left:7%'>Email: {$row['email']}</h5>
           <h5 style='margin-left:7%'>Phone: {$row['telephone']}</h5>";}



    echo "</br></br>
          <h4 style='margin-left:7%'>Contact Person for these invoices:</h4>

        <div class='container-md'>
            <table class='table'>
            	<thead>
            		<tr>
            			<th>Invoice Number:</th>
            			<th>Date:</th>
            		</tr>
            	</thead>";
            	
              foreach($result as $row){ 
                echo "<tr>
            		      <td> {$row['number']}</td>
            		      <td>{$row['invoice_date']}</td            		
            	        </tr>";}
        echo "  </table>
        </div>";

 require_once "../include/footer.php";       
?>



