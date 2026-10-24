<?php include('header.php');
$left=1;
?>

    <!-- main menu-->
  <?php include('leftpanel.php'); ?>
    <!-- / main menu-->


    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Edit Profile</h2>
          </div>
          
        </div>
        <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-3">&nbsp;</div>

		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-colored-form-control">Member Profile</h4>
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

						<?php if(isset($_REQUEST['m'])=='1'){?>
<div align="center" style="color:#009933;font-size:16px;">Your profile successfully updated!</div>
<?php }?>

						<form class="form" action="edit-profile-process.php" method="post">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-eye6"></i> Personal Information</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput1">Name</label>
											<input type="text" id="name"  class="form-control border-primary" placeholder="Name" name="name" required value="<?=getMember($conn,$_SESSION['mid'],'name')?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput2">Email</label>
											<input type="text" id="email" class="form-control border-primary" placeholder="Email" name="email" required value="<?=getMember($conn,$_SESSION['mid'],'email')?>" readonly="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput3">Phone No</label>
											<input type="text" id="phone" class="form-control border-primary" placeholder="Phone No" name="phone" required value="<?=getMember($conn,$_SESSION['mid'],'phone')?>" readonly="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="userinput4">Address</label>
											<input type="text" id="address" class="form-control border-primary" placeholder="Address" name="address" required value="<?=getMember($conn,$_SESSION['mid'],'address')?>">
										</div>
									</div>
								</div>
								
								

								<h4 class="form-section"><i class="icon-mail6"></i> Bank Details</h4>

								<div class="form-group">
									<label for="userinput5">Bank Name</label>
		 							<input class="form-control border-primary" type="text" placeholder="Bank Name" id="bname" name="bname" value="<?=getMember($conn,$_SESSION['mid'],'bname')?>">
								</div>

								<div class="form-group">
									<label for="userinput6">Branch Name</label>
									<input class="form-control border-primary" type="text" placeholder="Branch Name" id="branch" name="branch" value="<?=getMember($conn,$_SESSION['mid'],'branch')?>">
								</div>

								<div class="form-group">
									<label>Account Name</label>
									<input class="form-control border-primary" id="accname" type="text" placeholder="Account Number" name="accname" value="<?=getMember($conn,$_SESSION['mid'],'accname')?>">
								</div>
								
								<div class="form-group">
									<label for="userinput6">Account Number</label>
									<input class="form-control border-primary" type="text" placeholder="Account Number" id="accno" name="accno" value="<?=getMember($conn,$_SESSION['mid'],'accno')?>">
								</div>

								<div class="form-group">
									<label>IFSC Code</label>
									<input class="form-control border-primary" id="ifsc" type="text" placeholder="IFSC Code"name="ifsc" value="<?=getMember($conn,$_SESSION['mid'],'ifsc')?>">
								</div>


								

							</div>

							<div class="form-actions right">
								
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Update
								</button>
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
  </body>
</html>
