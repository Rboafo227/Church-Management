 <?php session_start();
    if (!isset($_SESSION['user_id']))
        header("Location: index.php"); ?>
 <?php include("inc/header.php");
    include("inc/topnav.php");
    include("inc/sidebar.php");
    $pagetitle = "Deliverance Church | Locations";
    ?>
 <?php include("inc/functions.php"); ?>
 <?php include("inc/config.php"); ?>
 <?php include("inc/db-const.php"); ?><div class="content-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-block">
                         <h5 class="card-title">Add Branch | Location</h5>
                         <form method="post" action="location.php" class="form-horizontal">
                             <div class="form-group row margin-top-30">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">District</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="district" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Country</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="country" class="form-control">
                                 </div>
                             </div>


                             <div class="pull-right">
                                 <button type="reset" class="btn btn-secondary">
                                     Reset
                                     <i class="fa fa-refresh position-right"></i>
                                 </button>

                                 <button type="submit" name="submit" class="btn btn-primary">
                                     Add District
                                     <i class="fa fa-arrow-right position-right"></i>
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div><?php
                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                    if (isset($_POST['submit'])) {
                        $district = $_POST['district'];
                        $country = $_POST['country'];


                        $query = "insert into location (district, country)values('$district', '$country')";

                        if (mysqli_query($conn, $query)) {
                            echo '<script>
                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                                text: "Location Added Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                              })
                              </script>';;
                        }
                    }
                    ?>