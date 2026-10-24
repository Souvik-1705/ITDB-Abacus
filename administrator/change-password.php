<?php include('header.php');
$left=1;
?>
<style>
.password-wrapper {
    position: relative !important;
    width: 100% !important;
    height: 36px !important;
}

.password-wrapper input.form-control {
    width: 100% !important;
    height: 36px !important;
    padding-right: 50px !important;
    box-sizing: border-box !important;
}

.password-wrapper .form-control-position {
    position: absolute !important;
    left: 0 !important;
    top: 0 !important;
    width: 40px !important;
    height: 36px !important;
    line-height: 36px !important;
    z-index: 2 !important;
}

.password-toggle {
    position: absolute !important;
    right: 8px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    width: 32px !important;
    height: 32px !important;
    padding: 0 !important;
    margin: 0 !important;
    border: none !important;
    background: transparent !important;
    color: #888 !important;
    font-size: 15px !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 10 !important;
}

.password-toggle:hover {
    color: #ff6f9f !important;
}

.password-toggle:focus {
    outline: none !important;
    box-shadow: none !important;
}
</style>
<!-- main menu-->
<?php include('leftpanel.php'); ?>
<!-- / main menu-->


<div class="app-content content container-fluid">
<div class="content-wrapper">

<div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
<div class="row match-height">
<div class="col-md-3">&nbsp;</div>

<div class="col-md-6">
<div class="card">
<div class="card-header">
<h4 class="card-title" id="basic-layout-colored-form-control">Change password</h4>
<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
<div class="heading-elements">
<ul class="list-inline mb-0">
<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
<li><a data-action="reload"><i class="icon-reload"></i></a></li>
<li><a data-action="expand"><i class="icon-expand2"></i></a></li>

</ul>
</div>
</div>
<div class="card-body collapse in">
<div class="card-block">

<?php if($_REQUEST['m']==1){?><div align="center"><div id="norecord" style="color:#FF0000;">Current password does not match!</div></div><?php }?>
<?php if($_REQUEST['n']==2){?><div align="center"><div id="norecord" style="color:#009900;">New password successfully updated!</div></div><?php }?>
<?php if($_REQUEST['p']==3){?><div align="center"><div id="norecord" style="color:#FF0000;">Confirm password does not match!</div></div><?php }?>

<form class="form" action="change-password-process.php" method="post">
<div class="form-body">

<div class="form-group"> 
<label for="timesheetinput1">Current Password<span style="color:#FF0000">*</span></label> 

<div class="position-relative has-icon-left password-wrapper">

<input type="password" 
id="current" 
name="current" 
class="form-control" 
placeholder="Current Password" 
required>

<div class="form-control-position"> 
<i class="icon-key"></i> 
</div>

<button type="button" 
class="password-toggle"
onclick="togglePassword('current','currentIcon')">
<i class="icon-eye" id="currentIcon"></i>
</button>

</div>
</div>


<div class="form-group"> 
<label for="timesheetinput2">New Password<span style="color:#FF0000">*</span></label> 

<div class="position-relative has-icon-left password-wrapper">

<input type="password" 
id="newpass" 
class="form-control" 
placeholder="New Password" 
name="newpass" 
required>

<div class="form-control-position"> 
<i class="icon-key"></i> 
</div>

<button type="button" 
class="password-toggle"
onclick="togglePassword('newpass','newpassIcon')">
<i class="icon-eye" id="newpassIcon"></i>
</button>

</div>
</div>


<div class="form-group"> 
<label for="timesheetinput3">Confirm Password<span style="color:#FF0000">*</span></label> 

<div class="position-relative has-icon-left password-wrapper">

<input type="password" 
id="conpass" 
class="form-control" 
placeholder="Confirm Password" 
name="conpass" 
required>

<div class="form-control-position"> 
<i class="icon-lock"></i> 
</div>

<button type="button" 
class="password-toggle"
onclick="togglePassword('conpass','conpassIcon')">
<i class="icon-eye" id="conpassIcon"></i>
</button>

</div>
</div>
</div>

<div class="form-actions right">
<button type="submit" class="btn btn-primary">
<i class="icon-check2"></i>Save</button>
</div>

</form>

</div>
</div>
</div>
</div>

<div class="col-md-3">&nbsp;</div>
</div>












</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div>



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
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="app-assets/js/core/app.js" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
<script>
function togglePassword(inputId, iconId)
{
    var password = document.getElementById(inputId);
    var icon = document.getElementById(iconId);

    if(password.type === "password")
    {
        password.type = "text";
        icon.classList.remove("icon-eye");
        icon.classList.add("icon-eye-blocked");
    }
    else
    {
        password.type = "password";
        icon.classList.remove("icon-eye-blocked");
        icon.classList.add("icon-eye");
    }
}
</script>
</body>
</html>
