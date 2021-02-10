 <?php session_start();
    if (!isset($_SESSION['user_id']))
        header("Location: index.php"); ?>
 <?php include("inc/header.php");
    include("inc/topnav.php");
    include("inc/sidebar.php");
    $pagetitle = "eNkonzweni Church Management System | Church";
    ?>
 <?php include("inc/functions.php"); ?>
 <?php include("inc/config.php"); ?>
 <?php include("inc/db-const.php"); ?>
 <div class="content-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-block">
                         <h5 class="card-title">Add Church Branch </h5>
                         <form method="post" action="church.php" class="form-horizontal">
                             <div class="form-group row margin-top-30">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Name</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="name" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Location</label>
                                 </div>
                                 <div class="col-md-9">
                                     <SELECT name="location">
                                         <OPTION VALUE=0>Choose
                                             <?php
                                                $conn = mysqli_connect('localhost', 'root', '', 'project');
                                                $result = mysqli_query($conn, "SELECT * FROM `location`");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $district = $row["district"];
                                                    echo '<OPTION VALUE="' . $district . '">' . $district . '</OPTION>';
                                                }
                                                mysqli_close($conn); //stänger connectio till DB system;
                                                ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Cell</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="cell" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Capacity</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="number" name="capacity" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Address</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="address" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Type</label>
                                 </div>
                                 <div class="col-md-9">
                                     <SELECT name="type">
                                         <OPTION VALUE=0>Choose
                                             <?php
                                                $conn = mysqli_connect('localhost', 'root', '', 'project');
                                                $result = mysqli_query($conn, "SELECT * FROM `types`");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $category = $row["category"];
                                                    echo '<OPTION VALUE="' . $category . '">' . $category . '</OPTION>';
                                                }
                                                mysqli_close($conn); //stänger connectio till DB system;
                                                ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Capital Fund</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="number" name="capital" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Account</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="account" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Rating</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="number" name="rating" class="form-control">
                                 </div>
                             </div>

                             <div class="pull-right">
                                 <button type="reset" class="btn btn-secondary">
                                     Reset
                                     <i class="fa fa-refresh position-right"></i>
                                 </button>

                                 <button type="submit" name="submit" class="btn btn-primary">
                                     Add Church Branch
                                     <i class="fa fa-arrow-right position-right"></i>
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div><?php
                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $location = $_POST['location'];
                        $cell = $_POST['cell'];
                        $capacity = $_POST['capacity'];
                        $address = $_POST['address'];
                        $type = $_POST['type'];
                        $capital = $_POST['capital'];
                        $account = $_POST['account'];
                        $rating = $_POST['rating'];



                        $query = "insert into entities (name, location, cell, capacity, address, type, capital, account, rating)values('$name', '$location', '$cell', '$capacity', '$address', '$type', '$capital', '$account', '$rating')";

                        if (mysqli_query($conn, $query)) {
                            echo '<script>
                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                                text: "Church Added Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                              })
                              </script>';;
                        }
                    }
                    ?>