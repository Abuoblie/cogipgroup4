<?php
 require_once "../include/header.php";
?>

<h1>COGIP : Contact directory</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Company</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $clients = new Validation () ;
    $resultat = $clients->getContact(1,1) ;
    foreach ($resultat as  $row ) {
      echo "
          <tr>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['email']}</td>
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

