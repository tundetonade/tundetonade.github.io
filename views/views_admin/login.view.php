<?php
require 'controllers/init.php';

if(isset($_SESSION['user_'])){header("Location:Dashboard"); }
?>
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title>Login::REDDOT</title>
		<meta charset="utf-8" />
		<meta name="description" content="Automated Revenue Management System" />
		<meta name="keywords" content="Automated Revenue Management System" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="../public/assets_user/media/logos/favicon.png" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="../public/assets_user/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../public/assets_user/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= '../../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!--End::Google Tag Manager -->
		<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "80%" 
        }
</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('../public/assets_user/media/auth/bg10.jpg'); } [data-theme="dark"] body { background-image: url('../public/assets_user/media/auth/bg10-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<!--begin::Image-->
						<img class="d-none d-lg-flex flex-lg-row-fluid" src="../public/assets_user/media/auth/reddot.png" width="800px" alt="" />
						<!--<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="../public/assets_user/media/auth/agency-dark.png" alt="" />-->
						<!--end::Image-->
						<!--begin::Title-->
						
					<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">AFRICA EDUCATIONAL SERVICES LTD..</h1>
<!--end::Title-->
<!--begin::Text-->
<!--<div class="text-gray-600 fs-base text-center fw-semibold">
 <span style="color:#000093">UNICORN PATHWAYS LTD serves as your reliable guide for studying in Canada, offering personalized support and expertise throughout the entire application to admission process, ensuring a smooth and successful journey.</span>
  </div>-->
<!--end::Text-->

						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<!--begin::Wrapper-->
					<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
					<!--begin::Aside-->
				<?php if(isset($_GET['errorlog'])){ ?><div class="alert alert-danger">
			  
				 <?php echo $_GET['errorlog']; ?>
				 </div>
			 <?php } ?>
						<!--begin::Content-->
						<div class="w-md-400px">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="CheckLogin" method="post">
							<!--begin::Heading-->
								<div class="text-center mb-11">
								<font size="4px">
									<?php if(isset($_SESSION['fail'])){ ?>
				<div class="alert alert-danger">
				<?php echo $_SESSION['fail']; ?>
				<?php unset($_SESSION['fail']); ?>
                </div>  
			  <?php } ?>
			  </font>
			  
			  <?php if(isset($_SESSION['success'])){ ?>
										
										<div class="modal fade" tabindex="-1" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Password Reset Successful</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-1"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p><?php echo $_SESSION['success']; ?></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>
				
				<?php unset($_SESSION['success']); ?>
				<?php //session_destroy(); ?>
                
				
			  <?php } ?>
			  
			  <a href="#" class="">
									<img alt="Logo" src="../public/assets_user/media/logos/logo.jpeg" class="h-60px" />
								</a>
								<br><br>
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Sign In</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<!--<div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>-->
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
								<!--begin::Login options-->
								<!--<div class="row g-3 mb-9">
									
									<div class="col-md-6">
										
										<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
										<img alt="Logo" src="../public/assets_user/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Sign in with Google</a>
										
									</div>
									
									<div class="col-md-6">
										
										<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
										<img alt="Logo" src="../public/assets_user/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3" />
										<img alt="Logo" src="../public/assets_user/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
										
									</div>
									
								</div>
								
								<div class="separator separator-content my-14">
									<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
								</div>-->
								
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Password-->
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Password-->
								</div>
								<input type="hidden" name="uri" value="<?php echo $_SERVER['REQUEST_URI']; ?>"  class="form-control">
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<!--begin::Link-->
								<!--	<a href="ResetPassword" class="link-primary">Forgot Password ?</a> -->
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Sign In</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait... 
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								<div class="text-gray-500 text-center fw-semibold fs-6"><!--Not Registered Yet? -->
							<!--	<a href="MakeDonation" class="link-primary">Make Donation</a> ||	<a href="MakeRequest" class="link-primary">Make Request</a>-->
								</div>
								<!--end::Sign up-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "../public/assets_user/index.html";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../public/assets_user/plugins/global/plugins.bundle.js"></script>
		<script src="../public/assets_user/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
		<script src="../public/assets_user/js/custom/authentication/sign-in/general.js"></script>
		
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
		
		<!--Custom script to handle modal on load-->
        <script type="text/javascript">
            $(window).on('load',function(){
                //var delayMs = 5000; // delay in milliseconds

                setTimeout(
                    function(){
                    $('#myModal').modal('show');
                },
                    //delayMs
                );
            });
        </script>
        <!--End Custom script-->
		
	</body>
	<!--end::Body-->

</html>