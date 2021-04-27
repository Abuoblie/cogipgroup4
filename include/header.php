<?php
require_once "../Controller/verification.php";
session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../assets/style.scss">
	<title>codip</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light navagation">
			<div class="container-fluid">
				<button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand " href="#">
					<img class="img-fluid " height="30%" width="40%" src="../assets/logo.jpeg" alt="foto"></a>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						
						<?php if (!empty($_SESSION)) {
							echo "<li class='nav-item'><a class='nav-link ' aria-current='' href='../View/Logout.php'>Logout</a></li>";
						} else{
                                                       echo "<li class='nav-item'><a class='nav-link' aria-current='' href='../View/Login.php'>Login</a></li>";
						}
						
						?>
						
						<li class="nav-item"><a class="nav-link " aria-current="" href="../index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link " href="../View/invoices.php">Invoices</a></li>
						<li class="nav-item"><a class="nav-link " href="../View/companiesDetails.php">Companies</a></li>
						<li class="nav-item"><a class="nav-link " href="../View/contactPageDetails.php">Contacts</a></li>
						<li class="nav-item">
							<?php if (!empty($_SESSION)) { ?>

								<div class="dropdown">
									<button class="btn btn-sm navbar nav-link" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Admin
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
										<li><a class="dropdown-item" href="">Dashboard</a></li>
										<li><a class="dropdown-item" href="newContact.php">New Contact</a></li>
										<li><a class="dropdown-item" href="newInvoice.php">New Invoice</a></li>
										<li><a class="dropdown-item" href="newCompany.php">New Company</a></li>
									</ul>
								</div>
							<?php } ?>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>