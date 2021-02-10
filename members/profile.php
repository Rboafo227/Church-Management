	<?php session_start();
	if (!isset($_SESSION['user_id']))
		header("Location: index.php"); ?>
	<?php include("inc/header.php");
	include("inc/topnav.php");
	//include("inc/member-sidebar.php");
	$pagetitle = "Deliverance Church | Profile";
	?>
	<?php include("./inc/functions.php"); ?>
	<?php include("inc/config.php"); ?>
	<?php include("inc/db-const.php"); ?>
	<!DOCTYPE html>
	<center>
		<div class="content-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-block">
								<img src="assets/img/profile-picture.jpg" width="136" height="148">
								<?php

								error_reporting(0);
								if (logged_in() == true) {
									redirect_to("profile.php");
								} else {
									redirect_to("index.php");
								}
								if (isset($_GET['id']) && $_GET['id'] != "") {
									$id = $_GET['id'];
								} else {
									$id = $_SESSION['user_id'];
								}

								if (empty($_SESSION['user_id'])) {
									// If they are not, redirect them to the login page.
									// header("Location: login.php");

								}
								## connect mysql server
								$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
								$data = mysqli_query($dbc, "SELECT * FROM members, allocations WHERE members.username = allocations.user-username AND members.username='" . $id . "'");


								# check connection
								if ($mysqli->connect_errno) {
									echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
									exit();
								}
								## query database
								# fetch data from mysql database


								$sql1 = "SELECT * FROM members WHERE id = {$id}";




								if ($result = $mysqli->query($sql1)) {
									$new = $result->fetch_array();
								}


								?>
								<div class="container"><?php
														$sql = "SELECT * FROM members WHERE id = {$id}";
														if ($result = $mysqli->query($sql))

															///$row = $result->fetch_array(MYSQLI_ASSOC);

															while ($row = $result->fetch_array(MYSQLI_ASSOC)) {; ?>
										<h2> <?php echo $row['name']; ?> </h2>
										<p>This is My Profile:</p>
										<div class="card" style="width:400px">
											<div class="card-body">
												<h4 class="card-title">Church Branch:<?php echo $row['branch']; ?></h4>
												<p class="card-text">Member Group:<?php echo $row['type']; ?></p>
												<a href="#" class="btn btn-primary">Contact Number:<?php echo $row['cell'];
																								} ?></a>
											</div>
										</div>
	</center>