	<?php include("inc/header.php");
    include("inc/topnav.php");
    include("inc/sidebar.php");
    $pagetitle = "Deliverance Church| Add Type";
    ?>
	<?php include("inc/functions.php"); ?>
	<?php include("inc/config.php"); ?>
	<?php include("inc/db-const.php"); ?>
	<!-- PAGE CONTENT -->
	<div class="content-wrapper">
	    <div class="content">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="card">
	                    <div class="card-block">
	                        <h4 class="card-title">Add Types</h4>
	                        <p class="content-group-sm"></p>

	                        <legend class="text-bold">Church Type:</legend>
	                        <fieldset class="content-group">
	                            <form method="post" action="type.php">
	                                <div class="form-group row margin-top-10">
	                                    <div class="col-md-2">
	                                        <label class="control-label col-form-label">Type:</label>
	                                    </div>
	                                    <div class="col-md-10">
	                                        <input type="text" name="category" class="form-control">
	                                    </div>
	                                </div>
	                                <div class="pull-right">
	                                    <button type="reset" class="btn btn-secondary">
	                                        Reset
	                                        <i class="fa fa-refresh position-right"></i>
	                                    </button>

	                                    <button type="submit" name="submit" class="btn btn-primary">
	                                        Add Type
	                                        <i class="fa fa-arrow-right position-right"></i>
	                                    </button>
	                                </div>
	                            </form>
	                    </div>
	                </div>
	                <!-- /PAGE CONTENT -->
	            </div>
	        </div>
	        </body>

	        </html>
	        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'project');
            if (isset($_POST['submit'])) {
                $category = $_POST['category'];

                $query = "insert into types (category)values('$category')";

                if (mysqli_query($conn, $query)) {
                    echo '<script>
                    Swal.fire({
                        title: "Success!",
                        icon: "success",
                        text: "Type Added Successfully",
                        timer: 2000,
                        showConfirmButton: false,
                      })
                      </script>';;
                }
            }
            ?>

	    </div>