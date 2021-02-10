  <?php session_start();
    if (!isset($_SESSION['user_id']))
        header("Location: index.php"); ?>
  <?php include("inc/header.php");
    include("inc/topnav.php");
    include("inc/sidebar.php");
    $pagetitle = "Deliverance Church | Events";
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
                          <h5 class="card-title">Add Event</h5>
                          <form method="post" action="events.php" class="form-horizontal">
                              <div class="form-group row margin-top-30">
                                  <div class="col-md-3">
                                      <label class="control-label col-form-label">Event Name</label>
                                  </div>
                                  <div class="col-md-9">
                                      <input type="text" name="event" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-3">
                                      <label class="control-label col-form-label">Date</label>
                                  </div>
                                  <div class="col-md-9">
                                      <input type="date" name="date" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-3">
                                      <label class="control-label col-form-label">Venue</label>
                                  </div>
                                  <div class="col-md-9">
                                      <input type="text" name="venue" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-3">
                                      <label class="control-label col-form-label">RSVP</label>
                                  </div>
                                  <div class="col-md-9">
                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="fa fa-user"></i>
                                          </span>
                                          <input type="text" name="rsvp" class="form-control">
                                      </div>
                                  </div>
                              </div>

                              <div class="pull-right">
                                  <button type="reset" class="btn btn-secondary">
                                      Reset
                                      <i class="fa fa-refresh position-right"></i>
                                  </button>

                                  <button type="submit" name="submit" class="btn btn-primary">
                                      Add Event
                                      <i class="fa fa-arrow-right position-right"></i>
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div><?php
                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                    if (isset($_POST['submit'])) {
                        $event = $_POST['event'];
                        $date = $_POST['date'];
                        $venue = $_POST['venue'];
                        $rsvp = $_POST['rsvp'];


                        $query = "insert into events (event, date, venue, rsvp)values('$event', '$date', '$venue', '$rsvp')";

                        if (mysqli_query($conn, $query)) {
                            echo '<script>
                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                                text: "Event Added Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                              })
                              </script>';;
                        }
                    }
                    ?>