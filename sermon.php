<?php session_start();
if (!isset($_SESSION['user_id']))
    header("Location: index.php"); ?>
<?php include("inc/header.php");
include("inc/topnav.php");
include("inc/sidebar.php");
$pagetitle = "Deliverance Church| Sermons";
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
                        <h5 class="card-title">Add Sermon</h5>
                        <form method="post" action="sermon.php" class="form-horizontal">
                            <div class="form-group row margin-top-30">
                                <div class="col-md-3">
                                    <label class="control-label col-form-label">Sermon Topic</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="topic" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row margin-top-30">
                                <div class="col-md-3">
                                    <label class="control-label col-form-label">Preacher</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="preacher" class="form-control">
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
                                    <label class="control-label col-form-label">Sermon</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text-area" name="sermon" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label col-form-label">Bible Verses</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" name="verse" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="pull-right">
                                <button type="reset" class="btn btn-secondary">
                                    Reset
                                    <i class="fa fa-refresh position-right"></i>
                                </button>

                                <button type="submit" name="submit" class="btn btn-primary">
                                    Add Sermon
                                    <i class="fa fa-arrow-right position-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><?php
                    $conn = mysqli_connect('localhost', 'root', '', 'project');
                    if (isset($_POST['submit'])) {
                        $topic = $_POST['topic'];
                        $date = $_POST['date'];
                        $sermon = $_POST['sermon'];
                        $verse = $_POST['verse'];
                        $preacher = $_POST['preacher'];


                        $query = "insert into sermons (topic, date, preacher, sermon, verse)values('$topic', '$date', '$preacher', '$sermon', '$verse')";

                        if (mysqli_query($conn, $query)) {
                            echo '<script>
                            Swal.fire({
                                title: "Success!",
                                icon: "success",
                                text: "Sermon Added Successfully",
                                timer: 2000,
                                showConfirmButton: false,
                              })
                              </script>';;
                        }
                    }
                    ?><p></p>