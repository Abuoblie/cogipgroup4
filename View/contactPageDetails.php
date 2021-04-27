<?php
  require_once "../include/header.php";
?>
<?php
    $first_name = '';
    $last_name= '';
    $email= '';
    $pswd='';
?>
<div class="container-md">
<table class="table">
	<thead>
		<tr>
			<th>First Name:</th>
			<th>Last Name:</th>
			<th>Telephone:</th>
			<th>Email:</th>
			<th>Company:</th>
			<th>Action</th>
		</tr>
	</thead>
	
      <?php
      $data =  new Validation();
      $result = $data -> getPeople(1,1);
        foreach($result as $row){
        ?>
     <tr>
		<td><?php echo $row['first_name']; ?></td>
		<td><?php echo $row['last_name']; ?></td>
		<td><?php echo $row['telephone']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['id_Company']; ?></td>
		<th>
		 	<a href="detailsOfContact.php?edit=<?php echo $row['id_People'];?>" class="btn btn-info">Details</a>
		</th>
	</tr>
	<?php } ?>
</div>
<?php
require_once "../include/footer.php";
?>
