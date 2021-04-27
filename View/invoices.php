<?php
 require_once "../include/header.php";
?>

<h4>COGIP : Invoice</h4>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice number</th>
      <th scope="col">Invoice date</th>
      <th scope="col">Contact person</th>
      <th scope="col">Company</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $clients = new validation () ;
    $resultat = $clients->getInvoice (1,1) ;
    foreach ($resultat as  $row ) {
      echo "
          <tr>
            <td>{$row['number']}</td>
            <td>{$row['invoice_date']}</td>
            <td>{$row['first_name']} {$row['last_name']}</td>
            <td>{$row['name']}</td>
          </tr>
      ";

    }
    ?>
  </tbody>
</table>
  </tbody>
</table>

<?php 
require_once "../include/footer.php";
?>
