<style>
/* =========================================================
   KIDS PORTAL ADMIN SIDEBAR
   ========================================================= */

:root {
    --kids-blue: #4dabf7;
    --kids-blue-dark: #1976d2;

    --kids-yellow: #ffd43b;
    --kids-orange: #ff922b;

    --kids-green: #69db7c;
    --kids-green-dark: #2f9e44;

    --kids-purple: #9775fa;
    --kids-pink: #f783ac;

    --kids-red: #ff6b6b;

    --kids-bg: #f4f9ff;
    --kids-white: #ffffff;

    --kids-text: #263238;
    --kids-muted: #718096;
}


/* =========================================================
   SIDEBAR
   ========================================================= */

.franchise-sidebar.kids-sidebar {

    width: 100%;

    height: auto;

    position: ;

    left: 0;
    top: 0;

    background:
        radial-gradient(circle at 10% 10%,
            rgba(255,255,255,.25) 0 20px,
            transparent 21px),

        radial-gradient(circle at 90% 25%,
            rgba(255,255,255,.18) 0 30px,
            transparent 31px),

        linear-gradient(
            180deg,
            #4dabf7 0%,
            #74c0fc 35%,
            #91d5ff 70%,
            #d0ebff 100%
        );

    box-shadow:
        8px 0 30px rgba(25,118,210,.15);

    border-right: 4px solid rgba(255,255,255,.7);

    overflow: hidden;
	border-radius:20px;

    z-index: 999;
}


/* =========================================================
   HEADER
   ========================================================= */

.kids-sidebar-header {

    min-height: 105px;

    padding: 20px 18px;

    display: flex;

    align-items: center;

    gap: 14px;

    background:
        linear-gradient(
            135deg,
            #1976d2,
            #4dabf7
        );

    color: #fff;

    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 25px;

    box-shadow:
        0 5px 20px rgba(25,118,210,.25);
}


/* Big dashboard icon */

.kids-dashboard-icon {

    width: 58px;
    height: 58px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #fff;

    border-radius: 20px;

    font-size: 30px;

    box-shadow:
        0 5px 12px rgba(0,0,0,.15);

    transform: rotate(-5deg);
}


/* Header title */

.kids-sidebar-header h4 {

    margin: 0;

    font-size: 21px;

    font-weight: 800;

    letter-spacing: .3px;

    color: #fff;
}


.kids-sidebar-header span {

    display: block;

    margin-top: 4px;

    font-size: 12px;

    color: rgba(255,255,255,.9);

    font-weight: 600;
}


/* =========================================================
   SCROLL AREA
   ========================================================= */

.kids-sidebar-scroll {

    height: auto;

    overflow-y: auto;

    padding: 15px 12px 30px;
}


/* Scrollbar */

.kids-sidebar-scroll::-webkit-scrollbar {

    width: 7px;
}


.kids-sidebar-scroll::-webkit-scrollbar-track {

    background: rgba(255,255,255,.25);

    border-radius: 20px;
}


.kids-sidebar-scroll::-webkit-scrollbar-thumb {

    background: rgba(25,118,210,.45);

    border-radius: 20px;
}


/* =========================================================
   MENU TABLE
   ========================================================= */

.kids-menu {

    border-collapse: separate !important;

    border-spacing: 0 8px !important;

}


/* Remove old table styling */

.kids-menu tr,
.kids-menu td {

    border: none !important;

}


.kids-menu td {

    padding: 0 !important;

}


/* =========================================================
   MENU ROW
   ========================================================= */

.kids-menu tr td {

    position: relative;

}


.kids-menu tr td a {

    min-height: 56px;

    padding: 8px 12px 8px 66px;

    display: flex;

    align-items: center;

    position: relative;

    text-decoration: none;




    color: var(--kids-text);

    font-size: 14px;

    font-weight: 700;

    background: rgba(255,255,255,.88);

    border-radius: 18px;

    box-shadow:
        0 4px 10px rgba(25,118,210,.08);

    transition:
        all .25s ease;

}


/* Hover */

.kids-menu tr:hover td a {

    color: var(--kids-blue-dark);

    background: #fff;

    transform: translateX(5px);

    box-shadow:
        0 7px 18px rgba(25,118,210,.18);

}


/* =========================================================
   ACTIVE MENU
   ========================================================= */

.kids-menu tr.active td a {

    color: #fff !important;

    background:
        linear-gradient(
            135deg,
            #ffb703,
            #ff922b
        );

    box-shadow:
        0 7px 18px rgba(255,146,43,.35);

    transform: translateX(5px);

}


/* Active little indicator */

.kids-menu tr.active td::after {

    content: "";

    position: absolute;

    right: -12px;

    top: 50%;

    width: 18px;
    height: 18px;

    background: #ffd43b;

    transform:
        translateY(-50%)
        rotate(45deg);

    border-radius: 4px;

}


/* =========================================================
   MENU ICON BOX
   ========================================================= */

.kids-menu-icon {

    width: 42px;
    height: 42px;

    position: absolute;

    left: 10px;
    top: 7px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background: #e7f5ff;

    box-shadow:
        0 3px 7px rgba(0,0,0,.08);

    transition: .25s ease;

    z-index: 2;
}


/* Image */

.kids-menu-icon img {

    width: 25px;
    height: 25px;

    object-fit: contain;

}


/* =========================================================
   COLORFUL ICON BACKGROUNDS
   ========================================================= */

.kids-menu-icon.dashboard {
    background: #fff3bf;
}

.kids-menu-icon.profile {
    background: #d0ebff;
}

.kids-menu-icon.password {
    background: #d3f9d8;
}

.kids-menu-icon.admission {
    background: #e5dbff;
}

.kids-menu-icon.pending {
    background: #ffe8cc;
}

.kids-menu-icon.accepted {
    background: #d3f9d8;
}

.kids-menu-icon.registered {
    background: #d0ebff;
}

.kids-menu-icon.certified {
    background: #e5dbff;
}

.kids-menu-icon.payment {
    background: #ffdeeb;
}

.kids-menu-icon.account {
    background: #fff3bf;
}

.kids-menu-icon.deposit {
    background: #d3f9d8;
}

.kids-menu-icon.deduct {
    background: #ffe3e3;
}

.kids-menu-icon.signature {
    background: #e5dbff;
}

.kids-menu-icon.logout {
    background: #ffe3e3;
}


/* =========================================================
   ICON HOVER
   ========================================================= */

.kids-menu tr:hover .kids-menu-icon {

    transform:
        rotate(-8deg)
        scale(1.08);

}


/* =========================================================
   ACTIVE ICON
   ========================================================= */

.kids-menu tr.active .kids-menu-icon {

    background: #fff;

    transform:
        rotate(-5deg)
        scale(1.08);

}


/* =========================================================
   COUNT BADGES
   ========================================================= */

.kids-count {

    margin-left: auto;

    min-width: 25px;
    height: 25px;

    padding: 0 7px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border-radius: 50px;

    color: #fff;

    font-size: 11px;

    font-weight: 800;

    box-shadow:
        0 3px 7px rgba(0,0,0,.12);
}


/* Badge colors */

.kids-count.orange {

    background:
        linear-gradient(
            135deg,
            #ff922b,
            #ff6b35
        );
}


.kids-count.green {

    background:
        linear-gradient(
            135deg,
            #69db7c,
            #2f9e44
        );
}


.kids-count.blue {

    background:
        linear-gradient(
            135deg,
            #4dabf7,
            #1976d2
        );
}


.kids-count.purple {

    background:
        linear-gradient(
            135deg,
            #9775fa,
            #7048e8
        );
}


/* =========================================================
   LOGOUT
   ========================================================= */

.kids-menu tr.logout-row {

    margin-top: 15px;
}


.kids-menu tr.logout-row td a {

    color: #e03131;

    background:
        linear-gradient(
            135deg,
            #fff5f5,
            #ffe3e3
        );

    border: 2px solid #ffc9c9;

}


.kids-menu tr.logout-row:hover td a {

    color: #fff;

    background:
        linear-gradient(
            135deg,
            #ff6b6b,
            #e03131
        );

    border-color: transparent;

}


.kids-menu tr.logout-row:hover .kids-menu-icon {

    background: #fff;

}


/* =========================================================
   MAIN PAGE BACKGROUND
   ========================================================= */

body {

    background:

        radial-gradient(
            circle at 10% 10%,
            rgba(255,212,59,.18) 0 45px,
            transparent 46px
        ),

        radial-gradient(
            circle at 90% 20%,
            rgba(151,117,250,.15) 0 60px,
            transparent 61px
        ),

        linear-gradient(
            135deg,
            #f8fbff,
            #eef8ff
        );

}


/* =========================================================
   SIDEBAR DECORATION
   ========================================================= */

.franchise-sidebar.kids-sidebar::before {

    content: ;

    position: absolute;

    top: 130px;
    right: 15px;

    font-size: 22px;

    color: rgba(255,255,255,.55);

    animation: kidsFloat 3s ease-in-out infinite;

}


.franchise-sidebar.kids-sidebar::after {

    content: ;

    position: absolute;

    bottom: 50px;
    left: 18px;

    font-size: 25px;

    color: rgba(255,255,255,.45);

    animation: kidsFloat 4s ease-in-out infinite;

}


@keyframes kidsFloat {

    0% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }

    100% {
        transform: translateY(0);
    }

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 768px) {

    .franchise-sidebar.kids-sidebar {

        width: 100%;

    }


    .kids-sidebar-header {

        min-height: 90px;

        padding: 15px;

    }


    .kids-dashboard-icon {

        width: 48px;
        height: 48px;

        font-size: 25px;

    }


    .kids-sidebar-header h4 {

        font-size: 18px;

    }


    .kids-menu tr td a {

        min-height: 52px;

        font-size: 13px;

    }

}
</style>
<div class="col-lg-3 col-md-3" align="left" style="font-family:Arial, Helvetica, sans-serif;">


<div class="franchise-sidebar kids-sidebar">

    <!-- Sidebar Header -->
    


    <div class="kids-sidebar-scroll">

        <table width="100%"
               border="0"
               cellspacing="0"
               cellpadding="0"
               id="leftpanel"
               class="kids-menu">


            <!-- My Dashboard -->
            <tr <?php if($pageid==19){?>class="active"<?php }else{?>class="class1"<?php }?>>
                <td>

                    <div class="kids-menu-icon dashboard">
                        <img src="images/dashboard-icon.png">
                    </div>

                    <a href="dashboard.php">
                        My Dashboard
                    </a>

                </td>
            </tr>


            <!-- My Profile -->
            <tr <?php if($pageid==23){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon profile">
                        <img src="images/icon-profile.png">
                    </div>

                    <a href="profile.php">
                        My Profile
                    </a>

                </td>
            </tr>


            <!-- Change Password -->
            <tr <?php if($pageid==12){?>class="active"<?php }else{?>class="class1"<?php }?>>
                <td>

                    <div class="kids-menu-icon password">
                        <img src="images/password-password-icon-png-green.png">
                    </div>

                    <a href="password.php">
                        Change Password
                    </a>

                </td>
            </tr>


            <!-- Student Admission -->
            <tr <?php if($pageid==13){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon admission">
                        <img src="images/student_icon.png">
                    </div>

                    <a href="student-admission.php">
                        Student Admission
                    </a>

                </td>
            </tr>


            <!-- Applied Student -->
            <tr <?php if($pageid==14){?>class="active"<?php }else{?>class="class1"<?php }?>>
                <td>

                    <div class="kids-menu-icon pending">
                        <img src="images/pending-student.png">
                    </div>

                    <a href="pending-student.php">
                        Applied Student

                        <span class="kids-count orange">
                            <?=getAppliedStudent($conn,$_SESSION['fid'])?>
                        </span>
                    </a>

                </td>
            </tr>


            <!-- Accepted Student -->
            <tr <?php if($pageid==15){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon accepted">
                        <img src="images/approved-student.png">
                    </div>

                    <a href="approve-student.php">
                        Accepted Student

                        <span class="kids-count green">
                            <?=getApprovedStudent($conn,$_SESSION['fid'])?>
                        </span>
                    </a>

                </td>
            </tr>


            <!-- Registered Student -->
            <tr <?php if($pageid==16){?>class="active"<?php }else{?>class="class1"<?php }?>>
                <td>

                    <div class="kids-menu-icon registered">
                        <img src="images/registered-student.png">
                    </div>

                    <a href="registered-student.php">
                        Registered Student

                        <span class="kids-count blue">
                            <?=getRegisteredStudent($conn,$_SESSION['fid'])?>
                        </span>
                    </a>

                </td>
            </tr>


            <!-- Certified Student -->
            <tr <?php if($pageid==11){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon certified">
                        <img src="images/certified-student.png">
                    </div>

                    <a href="certified-student.php">
                        Certified Student

                        <span class="kids-count purple">
                            <?=getCertifiedStudent($conn,$_SESSION['fid'])?>
                        </span>
                    </a>

                </td>
            </tr>


            <!-- Payment Request -->
            <tr <?php if($pageid==17){?>class="active"<?php }else{?>class="class1"<?php }?>>
                <td>

                    <div class="kids-menu-icon payment">
                        <img src="images/icon-head-content.png">
                    </div>

                    <a href="payment-request.php">
                        Payment Request
                    </a>

                </td>
            </tr>


            <!-- Account Information -->
            <tr <?php if($pageid==18){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon account">
                        <img src="images/account.png">
                    </div>

                    <a href="account-information.php">
                        Account Information
                    </a>

                </td>
            </tr>


            <!-- Account Deposit -->
            <tr <?php if($pageid==49){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon deposit">
                        <img src="images/deposit.png">
                    </div>

                    <a href="account-deposit.php">
                        Account Deposit
                    </a>

                </td>
            </tr>


            <!-- Account Deduct -->
            <tr <?php if($pageid==50){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon deduct">
                        <img src="images/deduct.png">
                    </div>

                    <a href="account-deduct.php">
                        Account Deduct
                    </a>

                </td>
            </tr>


            <!-- Signature -->
            <tr <?php if($pageid==277){?>class="active"<?php }else{?>class="class2"<?php }?>>
                <td>

                    <div class="kids-menu-icon signature">
                        <img src="images/signature.png">
                    </div>

                    <a href="franchise-signature.php">
                        Signature
                    </a>

                </td>
            </tr>


            <!-- Sign Out -->
            <tr class="logout-row">

                <td>

                    <div class="kids-menu-icon logout">
                        <img src="images/icon-signout.png">
                    </div>

                    <a href="franchise-logout.php"
                       onClick="return confirm('Are you sure want to logout?');">
                        Sign Out
                    </a>

                </td>

            </tr>


        </table>

    </div>

</div>




<div>&nbsp;</div>

</div>