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
     <div class="content">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-block">
                         <h5 class="card-title">Add Church Member | Baptismal Registration</h5>
                         <form method="post" action="member.php" class="form-horizontal">
                             <div class="form-group row margin-top-30">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Name</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="name" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">National ID</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="natid" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Gender</label>
                                 </div>
                                 <div class="col-md-9">
                                     <select name="gender" class="form-control" required>
                                         <option value="Female">Female</option>
                                         <option value="Male">Male</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">DOB</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="date" name="dob" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Type</label>
                                 </div>
                                 <div class="col-md-9">
                                     <select name="type" class="form-control" required>
                                         <option value="Youth">Youth</option>
                                         <option value="Young Adult">Young Adult</option>
                                         <option value="Adult">Adult</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Email</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="email" name="email" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Username</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="username" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Password</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="password" name="password" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-md-3">
                                     <label class="control-label col-form-label">Address</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="address" class="form-control" required>
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
                                     <label class="control-label col-form-label">Church</label>
                                 </div>
                                 <div class="col-md-9" required>
                                     <SELECT name="branch">
                                         <OPTION VALUE=0>Choose
                                             <?php
                                                $conn = mysqli_connect('localhost', 'root', '', 'project');
                                                $result = mysqli_query($conn, "SELECT * FROM `entities`");
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
                                     <label class="control-label col-form-label">Baptismal Date</label>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="date" name="baptism" class="form-control" required>
                                 </div>
                             </div>

                             <div class="pull-right">
                                 <button type="reset" class="btn btn-secondary">
                                     Reset
                                     <i class="fa fa-refresh position-right"></i>
                                 </button>

                                 <button type="submit" name="submit" class="btn btn-primary">
                                     Add Church Member | Baptismal
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
                        $natid = $_POST['natid'];
                        $gender = $_POST['gender'];
                        $dob = $_POST['dob'];
                        $type = $_POST['type'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        $cell = $_POST['cell'];
                        $branch = $_POST['branch'];
                        $baptism = $_POST['baptism'];

                        $query = "insert into members (name, natid, gender, dob, type, email, username, password, address, cell,  branch, baptism)values('$name', '$natid', '$gender', '$dob', '$type', '$email', '$username', '$password', '$address', '$cell', '$branch', '$baptism')";

                        if (mysqli_query($conn, $query)) {
                            echo '<script>
                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                                text: "Member Added Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                              })
                              </script>';
                        }
                    }
                    ?>