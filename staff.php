 <?php session_start();
    if (!isset($_SESSION['user_id']))
        header("Location: index.php"); ?>
 <?php include("inc/header.php");
    include("inc/topnav.php");
    include("inc/sidebar.php");
    $pagetitle = "Deliverance Church | Staff";
    ?>
 <?php include("inc/functions.php"); ?>
 <?php include("inc/config.php"); ?>
 <?php include("inc/db-const.php"); ?>
 <div class="content-wrapper">
     <div Deliverance Church class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-block">
                         <h5 class="card-title">Add Staff | Official</h5>
                         <form method="POST" action="staff.php" class="form-horizontal">
                             <div class="form-group row margin-top-30">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Username</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="username" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Password</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="password" name="password" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Name</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="name" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Cell</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="cell" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Email</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="email" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Role</label required>
                                 </div>
                                 <div class="col-md-9">
                                     <SELECT name="role">
                                         <OPTION VALUE=0>Choose
                                             <?php
                                                $conn = mysqli_connect('localhost', 'root', '', 'project');
                                                $result = mysqli_query($conn, "SELECT * FROM `role`");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $name = $row["name"];
                                                    echo '<OPTION VALUE="' . $name . '">' . $name . '</OPTION>';
                                                }
                                                mysqli_close($conn); //stänger connectio till DB system;
                                                ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Station</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="station" class="form-control" required>
                                 </div>
                             </div>

                             <div class="pull-right">
                                 <button type="reset" class="btn btn-secondary">
                                     Reset
                                     <i class="fa fa-refresh position-right"></i>
                                 </button>

                                 <button type="submit" name="submit" class="btn btn-primary">
                                     Add Staff | Official
                                     <i class="fa fa-arrow-right position-right"></i>
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <?php
                $conn = mysqli_connect('localhost', 'root', '', 'project');
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $name = $_POST['name'];
                    $cell = $_POST['cell'];
                    $email = $_POST['email'];
                    $role = $_POST['role'];
                    $station = $_POST['station'];

                    $query = "insert into staff (username, password, name, cell, email, role, station)values('$username', '$password', '$name', '$cell', '$email', '$role', '$station')";

                    if (mysqli_query($conn, $query)) {
                        echo '<script>
                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                                text: "Staff Added Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                              })
                              </script>';;
                    }
                }
                ?>