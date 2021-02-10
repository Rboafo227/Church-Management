 <?php session_start();
    if (!isset($_SESSION['user_id']))
        header("Location: index.php"); ?>
 <?php include("inc/header.php");
    include("inc/topnav.php");
    include("inc/sidebar.php");
    $pagetitle = "Deliverance Church Management System | Locations";
    ?>
 <?php include("inc/functions.php"); ?>
 <?php include("inc/config.php"); ?>
 <?php include("inc/db-const.php"); ?>
 <div class="content-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-lg-12">
                 <div class="row">
                     <div class="col-lg-12">
                         <h4 class="card-title">Reports</h4>
                         <p class="content-group">
                             <div class="row-fluid">
                                 <div class="span12">
                                     <div class="alert alert-danger">
                                         This is Pages section for reports.You can also use the sidebar menu for these.<a href="#" data-dismiss="alert" class="close">×</a>
                         </p>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-md-6">
                         <div class="card">
                             <div class="card-block text-center">
                                 <h6 class="text-bold">Deliverance Church Reports</h6>
                                 <div id="accordion" role="tablist" aria-multiselectable="true" class="accordion">
                                     <div class="card">
                                         <div class="card-header" role="tab" id="headingOne">
                                             <h5 class="mb-0">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                     Pastors
                                                 </a>
                                             </h5>
                                         </div>

                                         <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                             <div class="card-block">
                                                 This is Directory for Pastors.<a href="pastors.php">Click Here</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card">
                                         <div class="card-header" role="tab" id="headingTwo">
                                             <h5 class="mb-0">
                                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                     Members
                                                 </a>
                                             </h5>
                                         </div>
                                         <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                             <div class="card-block">
                                                 This is a report on Church Members.<a href="members.php">Click Here</a>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="card">
                                         <div class="card-header" role="tab" id="headingThree">
                                             <h5 class="mb-0">
                                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                     Churches
                                                 </a>
                                             </h5>
                                         </div>
                                         <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                             <div class="card-block">
                                                 This is directory of Churches and Branches.<a href="churches.php">Click Here</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>