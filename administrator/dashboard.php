<?php
include('header.php');
$left=1;
?>
<style>

/* -------------------------------------------------
   MAIN DASHBOARD
------------------------------------------------- */

.kids-admin {
    background:
        radial-gradient(circle at 5% 10%, rgba(255, 224, 102, .35) 0, transparent 18%),
        radial-gradient(circle at 95% 20%, rgba(125, 211, 252, .35) 0, transparent 20%),
        radial-gradient(circle at 50% 100%, rgba(196, 181, 253, .30) 0, transparent 25%),
        #f4f9ff;

    min-height: 100vh;
    font-family:Arial;
}


/* -------------------------------------------------
   TOP HEADER
------------------------------------------------- */

.kids-topbar {
    min-height: 100px;

    padding: 20px 30px;

    background:
        linear-gradient(
            135deg,
            #5bc0eb 0%,
            #48bfe3 45%,
            #6c63ff 100%
        );

    border-radius: 0 0 28px 28px;

    position: relative;
    overflow: hidden;

    box-shadow: 0 8px 25px rgba(52, 152, 219, .20);

    display: flex;
    align-items: center;
    justify-content: space-between;
}


.kids-topbar:before,
.kids-topbar:after {
    content: "";
    position: absolute;

    background: rgba(255,255,255,.15);

    border-radius: 50%;
}

.kids-topbar:before {
    width: 180px;
    height: 180px;

    right: 80px;
    top: -100px;
}

.kids-topbar:after {
    width: 130px;
    height: 130px;

    right: 300px;
    bottom: -90px;
}


.kids-topbar-title {
    display: flex;
    align-items: center;

    position: relative;
    z-index: 2;
}


.kids-emoji {
    width: 65px;
    height: 65px;

    background: rgba(255,255,255,.95);

    border-radius: 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 34px;

    margin-right: 18px;

    box-shadow: 0 7px 18px rgba(0,0,0,.12);
}


.kids-topbar h2 {
    margin: 0;

    color: #fff;

    font-size: 28px;

    font-weight: 500;
}


.kids-topbar p {
    margin: 3px 0 0;

    color: rgba(255,255,255,.9);

    font-size: 14px;

    font-weight: 600;
}


.kids-clouds {
    position: relative;

    z-index: 2;

    font-size: 35px;

    letter-spacing: 12px;

    opacity: .85;
}


/* -------------------------------------------------
   DASHBOARD BODY
------------------------------------------------- */

.kids-dashboard-body {
    padding: 30px 15px 60px;
}


.kids-card-row {
    margin-left: -10px;
    margin-right: -10px;
}


.kids-card-row > div {
    padding-left: 10px;
    padding-right: 10px;
    margin-bottom: 20px;
}


/* -------------------------------------------------
   CARDS
------------------------------------------------- */

.kids-card-link {
    text-decoration: none !important;

    display: block;

    height: 100%;
}


.kids-card {
    position: relative;

    min-height: 155px;

    border-radius: 25px;

    overflow: hidden;

    transition:
        transform .25s ease,
        box-shadow .25s ease;

    box-shadow:
        0 8px 25px rgba(50, 80, 120, .13);

    border: 4px solid rgba(255,255,255,.75);
}


.kids-card:hover {
    transform: translateY(-7px) rotate(-.5deg);

    box-shadow:
        0 16px 35px rgba(50, 80, 120, .20);
}


.kids-card:before {
    content: "";

    position: absolute;

    width: 110px;
    height: 110px;

    border-radius: 50%;

    background: rgba(255,255,255,.18);

    right: -25px;
    top: -35px;
}


.kids-card:after {
    content: "";

    position: absolute;

    width: 70px;
    height: 70px;

    border-radius: 50%;

    background: rgba(255,255,255,.12);

    left: -20px;
    bottom: -30px;
}


/* -------------------------------------------------
   CARD CONTENT
------------------------------------------------- */

.kids-card-content {
    position: relative;

    z-index: 3;

    min-height: 155px;

    padding: 25px;

    display: flex;

    align-items: center;

    justify-content: space-between;
}


.kids-number {
    color: #fff;

    font-size: 34px;

    line-height: 1;

    font-weight: 500;

    margin-bottom: 9px;
}


.kids-label {
    color: #fff;

    font-size: 17px;

    font-weight: 600;

    line-height: 1.2;
}


.kids-small {
    color: rgba(255,255,255,.82);

    font-size: 11px;

    margin-top: 6px;

    font-weight: 600;
}


.kids-icon {
    width: 65px;
    height: 65px;

    min-width: 65px;

    border-radius: 22px;

    background: rgba(255,255,255,.92);

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 32px;

    box-shadow:
        0 7px 15px rgba(0,0,0,.10);

    transform: rotate(4deg);

    transition: transform .25s ease;
}


.kids-card:hover .kids-icon {
    transform:
        rotate(-7deg)
        scale(1.08);
}


/* -------------------------------------------------
   CARD COLORS
------------------------------------------------- */

/* Orange */
.kids-orange {
    background:
        linear-gradient(
            135deg,
            #ff9f43,
            #ff6b6b
        );
}


/* Blue */
.kids-blue {
    background:
        linear-gradient(
            135deg,
            #48c6ef,
            #2980b9
        );
}


/* Coral */
.kids-coral {
    background:
        linear-gradient(
            135deg,
            #ff6b81,
            #ee5253
        );
}


/* Green */
.kids-green {
    background:
        linear-gradient(
            135deg,
            #55efc4,
            #00b894
        );
}


/* Purple */
.kids-purple {
    background:
        linear-gradient(
            135deg,
            #a78bfa,
            #7c3aed
        );
}


/* Yellow */
.kids-yellow {
    background:
        linear-gradient(
            135deg,
            #feca57,
            #f39c12
        );
}


/* Sky */
.kids-sky {
    background:
        linear-gradient(
            135deg,
            #74b9ff,
            #0984e3
        );
}


/* Red */
.kids-red {
    background:
        linear-gradient(
            135deg,
            #ff7675,
            #d63031
        );
}


/* Mint */
.kids-mint {
    background:
        linear-gradient(
            135deg,
            #81ecec,
            #00cec9
        );
}


/* -------------------------------------------------
   MOBILE
------------------------------------------------- */

@media (max-width: 767px) {

    .kids-topbar {
        min-height: 90px;

        padding: 15px 18px;

        border-radius: 0 0 22px 22px;
    }


    .kids-emoji {
        width: 50px;
        height: 50px;

        font-size: 27px;

        border-radius: 16px;

        margin-right: 12px;
    }


    .kids-topbar h2 {
        font-size: 22px;
    }


    .kids-topbar p {
        font-size: 12px;
    }


    .kids-clouds {
        display: none;
    }


    .kids-dashboard-body {
        padding: 20px 8px 40px;
    }


    .kids-card {
        min-height: 135px;

        border-radius: 20px;
    }


    .kids-card-content {
        min-height: 135px;

        padding: 18px;
    }


    .kids-number {
        font-size: 27px;
    }


    .kids-label {
        font-size: 14px;
    }


    .kids-small {
        font-size: 10px;
    }


    .kids-icon {
        width: 50px;
        height: 50px;

        min-width: 50px;

        font-size: 25px;

        border-radius: 17px;
    }
}


/* -------------------------------------------------
   EXTRA SMALL MOBILE
------------------------------------------------- */

@media (max-width: 480px) {

    .kids-card-row > div {
        width: 100%;
    }

    .kids-card {
        min-height: 125px;
    }

    .kids-card-content {
        min-height: 125px;
    }

}


/* -------------------------------------------------
   OPTIONAL FONT
------------------------------------------------- */

@import url(
    'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap'
);

</style>

<!-- main menu-->
<?php include('leftpanel.php') ?>
<!-- / main menu-->
 
<div class="app-content content container-fluid kids-admin">
    <div class="content-wrapper">

        <!-- TOP BAR -->
        <div class="content-header row"></div>

        <div class="kids-topbar">
            <div class="kids-topbar-title">
                <span class="kids-emoji"></span>
                <div>
                    <h2>ITDB Abacus </h2>
                    <p>Admin Dashboard</p>
                </div>
            </div>

            <div class="kids-clouds">
                
            </div>
        </div>

        <div class="content-body kids-dashboard-body">

            <?php if(getUser($conn,$fid12,'type')=='F'){ ?>

            <!-- ================= FACULTY / FRANCHISE DASHBOARD ================= -->
            <div class="row kids-card-row">

                <?php if(getModulePermission($conn,$_SESSION['fid'],'Total Student')>0) {?>
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="total-student.php" class="kids-card-link">
                        <div class="kids-card kids-orange">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalStudentApplication($conn)?>
                                    </div>
                                    <div class="kids-label">Applied Student</div>
                                    <div class="kids-small">New applications</div>
                                </div>

                                <div class="kids-icon">
                                  
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>

                <?php if(getModulePermission($conn,$_SESSION['fid'],'Approved Student')>0) {?>
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="fran.php" class="kids-card-link">
                        <div class="kids-card kids-blue">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalFranchise($conn)?>
                                    </div>
                                    <div class="kids-label">Total Franchise</div>
                                    <div class="kids-small">Active centers</div>
                                </div>

                                <div class="kids-icon">
                                 
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>

                <?php if(getModulePermission($conn,$_SESSION['fid'],'Completed Student')>0) {?>
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="completed-student.php" class="kids-card-link">
                        <div class="kids-card kids-coral">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getCompletedStudent($conn)?>
                                    </div>
                                    <div class="kids-label">Accepted Student</div>
                                    <div class="kids-small">Successfully accepted</div>
                                </div>

                                <div class="kids-icon">
                                  
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>

                <?php if(getModulePermission($conn,$_SESSION['fid'],'Dropout Student')>0) {?>
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="drop-student.php" class="kids-card-link">
                        <div class="kids-card kids-purple">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getDropoutStudent($conn)?>
                                    </div>
                                    <div class="kids-label">Registered Student</div>
                                    <div class="kids-small">Currently registered</div>
                                </div>

                                <div class="kids-icon">
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>

                <?php if(getModulePermission($conn,$_SESSION['fid'],'Total Due')>0) {?>
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="view-total-due.php" class="kids-card-link">
                        <div class="kids-card kids-yellow">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalMonthlyDue($conn)?>
                                    </div>
                                    <div class="kids-label">Certified Student</div>
                                    <div class="kids-small">Certification complete</div>
                                </div>

                                <div class="kids-icon">
                                 
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>

            </div>


            <?php } else { ?>


            <!-- ================= ADMIN DASHBOARD ================= -->
            <div class="row kids-card-row">

                <!-- Applied Student -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="student-application.php?status=I" class="kids-card-link">
                        <div class="kids-card kids-orange">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalStudentApplication($conn)?>
                                    </div>
                                    <div class="kids-label">Applied Student</div>
                                    <div class="kids-small">New applications</div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>


                <!-- Franchise -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="fran.php" class="kids-card-link">
                        <div class="kids-card kids-blue">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalFranchise($conn)?>
                                    </div>
                                    <div class="kids-label">Total Franchise</div>
                                    <div class="kids-small">Active centers</div>
                                </div>

                                
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Accepted -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="student-accepted.php" class="kids-card-link">
                        <div class="kids-card kids-coral">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalAcceptedStudent($conn)?>
                                    </div>
                                    <div class="kids-label">Accepted Student</div>
                                    <div class="kids-small">Approved applications</div>
                                </div>

                                
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Registered -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="student-registered.php" class="kids-card-link">
                        <div class="kids-card kids-green">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalRegisteredStudent($conn)?>
                                    </div>
                                    <div class="kids-label">Registered Student</div>
                                    <div class="kids-small">Active students</div>
                                </div>

                                
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Certified -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="student-certified.php" class="kids-card-link">
                        <div class="kids-card kids-purple">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalCertifiedStudent($conn)?>
                                    </div>
                                    <div class="kids-label">Certified Student</div>
                                    <div class="kids-small">Certificates issued</div>
                                </div>

                                
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Deposit -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="payment-deposite.php" class="kids-card-link">
                        <div class="kids-card kids-sky">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalDeposite($conn)?>
                                    </div>
                                    <div class="kids-label">Total Deposit</div>
                                    <div class="kids-small">Payment received</div>
                                </div>

                                
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Deduct -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="payment-deduct.php" class="kids-card-link">
                        <div class="kids-card kids-red">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalDeduct($conn)?>
                                    </div>
                                    <div class="kids-label">Total Deduct</div>
                                    <div class="kids-small">Payment deductions</div>
                                </div>

                                
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Payment Request -->
                <div class="col-xl-3 col-lg-6 col-xs-6">
                    <a href="payment-request.php" class="kids-card-link">
                        <div class="kids-card kids-mint">
                            <div class="kids-card-content">
                                <div>
                                    <div class="kids-number">
                                        <?=getTotalPaymentRequest($conn)?>
                                    </div>
                                    <div class="kids-label">Payment Request</div>
                                    <div class="kids-small">Pending requests</div>
                                </div>

                                
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            <?php } ?>

        </div>
    </div>
</div>


<!-- ================= KIDS PORTAL CSS ================= -->



<?php include('footer.php') ?>


<!-- BEGIN VENDOR JS-->
<script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
<script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
<script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>