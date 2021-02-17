<?php session_start();
if (!isset($_SESSION['user_id'])) ?>

<?php

$loggedUser = $_SESSION['username'];
$id = $_SESSION['user_id'];

?>


<?php include("inc/header.php");
include("inc/topnav.php");
//include("inc/member-sidebar.php");
$pagetitle = "Deliverance
        Church | Tithes";
?>
<?php include("./inc/functions.php"); ?>
<?php include("inc/config.php"); ?>
<?php include("inc/db-const.php"); ?>

<link rel="stylesheet" href="assets/DataTables/datatables.min.css">
<link rel="stylesheet" href="assets/DataTables/buttons.dataTables.min.css">



<script src="assets/DataTables/datatables.min.js"> </script>

<script src="assets/DataTables/dataTables.button.min.js"> </script>

<script src="assets/DataTables/buttons.print.min.js"> </script>
<div class="content">
    <h4 class="card-title"><?php echo $pagetitle . ' for ' . $loggedUser ;  ?></h4>



    <div class="row">
        <div class="col-md-12">
            <div class="card" style="width: auto;">
                <div class="card-block">
                    <h5 class="text-bold card-title">My Tithes</h5>
                
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $conn = mysqli_connect('localhost', 'root', '', 'project');
                            $table = mysqli_query($conn, "SELECT * FROM allocations WHERE username = '$loggedUser' ");
                            while ($row = mysqli_fetch_array($table))

                            ///$row = $result->fetch_array(MYSQLI_ASSOC);

                            //while($row = $result->fetch_array(MYSQLI_ASSOC))
                            {; ?>
                                <tr>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['paid']; ?></td>
                                    <td><?php echo $row['others']; ?></td>

                                </tr>


                            <?php }
                            echo "</table>"; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

 


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>