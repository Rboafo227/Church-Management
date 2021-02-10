<?php include("inc/header.php");
include("inc/topnav.php");
//include("inc/member-sidebar.php");
$pagetitle = "Deliverance Church";
?>

<script>
	$(document).ready(function() {
		$.ajax({
			url: 'https://dailyverses.net/get/verse?language=niv&isdirect=1&url=' + window.location.hostname,
			dataType: 'JSONP',
			success: function(json) {
				$(".dailyVersesWrapper").prepend(json.html);
			}
		});
	});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- PAGE CONTENT -->
<center>
	<div class="content-wrapper">
		<div class="content">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="card-title">Members Home Page</h4>
					<p>
						<div class="row-fluid">
							<div class="span12">
								<div class="alert alert-info">
									<strong>Welcome to Deliverance Church Management System Member's Portal.Navigate using the Menu Section bar.Enjoy!!</strong>
									<a href="#" data-dismiss="alert" class="close">×</a></div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="alert alert-danger">
										<strong>Verse of the Day!</strong>: <div class="dailyVersesWrapper"></div>

									</div>
								</div>
							</div>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
</center>