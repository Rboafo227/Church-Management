	<?php include("inc/header.php");
	include("inc/topnav.php");
	//include("inc/member-sidebar.php");
	$pagetitle = "Deliverance
         Church | Member";
	?>
	<?php include("./inc/functions.php"); ?>
	<?php include("inc/config.php"); ?>
	<?php include("inc/db-const.php"); ?>
	<center>
		<div class="content-wrapper">
			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="card-title"><?php echo $pagetitle; ?></h4>
						<p>
							<div class="row-fluid">
								<div class="span12">
									<div class="alert alert-info">
										Welcome to our Church Management Information System code named: <strong>Deliverance Church</strong>. Get your account from your Pastor!
										<a href="#" data-dismiss="alert" class="close">×</a>
									</div>
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-block">
								<h5 class="text-bold card-title">Church Branches Directory</h5>
								<table class="table">
									<thead>
										<tr>
											<th>Date</th>
											<th>Event</th>
											<th>Venue</th>
											<th>RSVP</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$conn = mysqli_connect('localhost', 'root', '', 'project');
										$table = mysqli_query($conn, 'SELECT * FROM events');
										while ($row = mysqli_fetch_array($table))

										///$row = $result->fetch_array(MYSQLI_ASSOC);

										//while($row = $result->fetch_array(MYSQLI_ASSOC))
										{; ?>
											<tr>
												<td><?php echo $row['date']; ?></td>
												<td><?php echo $row['event']; ?></td>
												<td><?php echo $row['venue']; ?></td>
												<td><?php echo $row['rsvp']; ?></td>

											</tr>


										<?php }
										echo "</table>"; ?>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
	</center>