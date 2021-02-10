  <?php session_start();
    if (!isset($_SESSION['user_id']))
        header("Location: index.php"); ?>
  <?php include("inc/header.php");
    include("inc/topnav.php");
    include("inc/sidebar.php");
    $pagetitle = "Deliverance Church | Offering";
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
                          <h5 class="card-title">Process Tithe | Offering</h5>
                          <form method="POST" action="offering.php" class="form-horizontal">

                              <div class="form-group row">
                                  <div class="col-md-3">
                                      <label class="control-label col-form-label">Name</label>
                                  </div>
                                  <div class="col-md-9">
                                      <select name="name" class="form-control" required>
                                          <OPTION VALUE=0>Choose
                                              <?php
                                                $conn = mysqli_connect('localhost', 'root', '', 'project');
                                                $result = mysqli_query($conn, "SELECT name FROM `members`");
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
                                      <label class="control-label col-form-label">Paid</label>
                                  </div>
                                  <div class="col-md-9">
                                      <input type="number" name="paid" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-3">
                                      <label class="control-label col-form-label">Description</label>
                                  </div>
                                  <div class="col-md-9">
                                      <select name="others" class="form-control" required>
                                          <option VALUE=0>Choose </option>
                                          <option VALUE=Tithe>Tithe </option>
                                          <option VALUE=Offering>Offering </option>
                                      </select>
                                  </div>
                              </div>
                              


                              <div class="pull-right">
                                  <button type="reset" class="btn btn-secondary">
                                      Reset
                                      <i class="fa fa-refresh position-right"></i>
                                  </button>

                                  <button type="submit" name="submit" class="btn btn-primary">
                                      Record Offering | Tithe
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
                    $name = $_POST['name'];
                    $paid = $_POST['paid'];
                    $others = $_POST['others'];



                    $query = "INSERT INTO allocations (username, paid, others) VALUES('$name', '$paid', '$others')";


                    if (mysqli_query($conn, $query)) {
                        echo '<script>
                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                                text: "Tithe/Offering Added Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                              })
                              </script>';;
                    } else {
                        echo mysqli_error($conn);
                    }
                }
                ?>