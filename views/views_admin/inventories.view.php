 <!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title>Inventories::REDDOT</title>
		<meta charset="utf-8" />
		<meta name="description" content="Automated Revenue Management System" />
		<meta name="keywords" content="Automated Revenue Management System" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="../public/assets_user/media/logos/favicon.png" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used by this page)-->
		<link href="../public/assets_user/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../public/assets_user/plugins/custom/vis-timeline/vis-timeline.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="../public/assets_user/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="../public/assets_user/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--Begin::Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!--End::Google Tag Manager -->
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	
	<?php if(isset($_SESSION['success'])){ ?>
										
										<div class="modal fade" tabindex="-1" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Successful</h3>

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
			
                
				
			  <?php } ?>
	
	<body id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on" data-kt-app-layout="dark-sidebar"  data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
		
		<!--begin::loader-->
		<?php //include('include/loader.php'); ?>
		<!--end::Loader-->
		
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				<?php include('include/header.php'); ?>
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<?php include('include/sidebar.php'); ?>
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<?php include('include/welcome.php'); ?>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page title-->
									<!--begin::Actions-->
									
									<!--end::Actions-->
								</div>
								<!--end::Toolbar container-->
							</div>
							
							
							<div class="row g-5 g-xl-10">
							
							
							<div id="kt_app_content" class="app-content flex-column-fluid">
							<center><img src="../public/assets_user/media/logos/logo.png" alt="" width="80px"  /></center>
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card body-->
										<div class="card-body">
											<!--begin::Heading-->
											<div class="card-px text-center pt-15 pb-15">
												<!--begin::Title-->
												<h2 class="fs-2x fw-bold mb-0">Inventories</h2><br>
												<a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_new_ticket" class="btn btn-primary fw-bold fs-8 fs-lg-base">Add Inventory</a>
												
												
															
												
												
												<!--begin::Modal - Support Center - Create Ticket-->
									<div class="modal fade" id="kt_modal_new_ticket" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-750px">
											<!--begin::Modal content-->
											<div class="modal-content rounded">
												<!--begin::Modal header-->
												<div class="modal-header pb-0 border-0 justify-content-end">
													<!--begin::Close-->
													<div class="btn btn-sm btn-icon btn-active-color-primary"  data-bs-dismiss="modal">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-1">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Close-->
												</div>
												<!--begin::Modal header-->
												<!--begin::Modal body-->
												<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
													<!--begin:Form-->
													<form id="kt_modal_new_ticket_form" method="POST" class="form" action="InsertInventory" onsubmit="return confirm('Are you sure you want to proceed?');">
														<!--begin::Heading-->
														<div class="mb-13 text-center">
															<!--begin::Title-->
															<h1 class="mb-3">Add New Inventory</h1>
															<!--end::Title-->
															<!--begin::Description-->
															
															<!--end::Description-->
														</div>
														<!--end::Heading-->
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
															<!--begin::Label-->
															
															<!--end::Label-->
															<input type="hidden" class="form-control form-control-solid" value="<?php echo $_SESSION['user_']['name']; ?> - <?php echo $_SESSION['user_']['user_id']; ?>" name="name" readonly>
															<input type="hidden" class="form-control form-control-solid" value="<?php echo $_SESSION['user_']['email']; ?>" name="email" />
														</div>
														<!--end::Input group-->
														
													
														<!--begin::Input group-->
													<!--	<div class="d-flex flex-column mb-8 fv-row" id="txtHint">-->
														
														
													
														
															
															<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2"><span style="color:#ff0000;">Hivorex HD FL 7000</span></label>
																<input value="<?php echo "Hivorex HD FL 7000"; ?>" class="form-control form-control-solid" name="product_name" readonly>
																
														</div>
														<!--begin::Input group-->
														
															
															<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Hivorex HD FL 7000 Amount</label>
															<!--end::Input group-->
														<input value=<?php echo $hivorex_amount; ?> class="form-control form-control-solid" name="hivorex_amount" readonly>	
														</div>
														<!--begin::Input group-->
														
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Hivorex Supply Date</label>
																<input type="date" class="form-control form-control-solid" name="supply_date">
																
														</div>
														<!--end::Input group-->
														
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Hivorex No. Of Bags</label>
																<input type="number" class="form-control form-control-solid" name="no_bags">
																
														</div>
														<!--end::Input group-->
														
														
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Hivorex Total Cost of Transportation/Shipping/Offloading </label>
																<input type="number" class="form-control form-control-solid" name="tp">
																
														</div>
														<!--end::Input group-->
														
														
														
																
																<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2"><span style="color:#ff0000;">Exceed 1018</span></label>
																<input value="<?php echo "Exceed 1018"; ?>" class="form-control form-control-solid" name="exceed_product_name" readonly>
																
														</div>
														<!--begin::Input group-->
														
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Exceed 1018 Amount</label>
																
														<input  value=<?php echo $exceed_amount; ?> class="form-control form-control-solid" name="exceed_amount" readonly>
														</div>
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Exceed Supply Date</label>
																<input type="date" class="form-control form-control-solid" name="exceed_supply_date">
																
														</div>
														<!--end::Input group-->
														
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Exceed No. Of Bags</label>
																<input type="number" class="form-control form-control-solid" name="exceed_no_bags">
																
														</div>
														<!--end::Input group-->
														
														
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-8 fv-row">
														<label class="required fs-6 fw-semibold mb-2">Exceed Total Cost of Transportation/Shipping/Offloading </label>
																<input type="number" class="form-control form-control-solid" name="exceed_tp">
																
														</div>
														<!--end::Input group-->
														
													
														
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="text-center">
															<button type="reset" id="kt_modal_new_ticket_cancel" class="btn btn-light me-3">Cancel</button>
															<button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-primary">
																<span class="indicator-label">Add Inventory</span>
																<span class="indicator-progress">Please wait... 
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
															</button>
															<br><br>
														</div>
														<!--end::Actions-->
													</form>
													<!--end:Form-->
												</div>
												<!--end::Modal body-->
											</div>
											<!--end::Modal content-->
										</div>
										<!--end::Modal dialog-->
									</div>
									<!--end::Modal - Support Center - Create Ticket-->
												</div>
											<!--end::Heading-->
											
											<!--end::Illustration-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Content container-->
							</div>
							
											
											<div id="kt_app_content" class="app-content flex-column-fluid">
											
											
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
								
									<!--begin::Products-->
									<div class="card card-flush">
									<center>
									
									<div class="col-xl-8 mb-5 mb-xl-10">
									 <form  method="post" action="Inventories" enctype="multipart/form-data">

                                    <table class="table table-striped table-bordered table-hover table-green">
  <tr>
    <td width="35%"><center><strong>Start Date</strong></center></td>
     <td width="33%"><center><strong>End Date</strong></center></td>
    <td width="32%"><center><strong>Generate</strong></center></td>

  </tr>
  <tr>
    <td>  <input value="YYYY-MM-DD" class="form-control" type="date" name="startdate" id="textfield" required />
</td>
        <td>  <input value="YYYY-MM-DD" class="form-control" type="date" name="enddate" id="textfield" required />
		
</td>
        <td><input type="submit" class="btn btn-primary" value="Generate Report" name="submit">
</td>

  </tr>
 
</table>
</form>  
</div>  
									<br>
									<h2>Inventory History</h2>
									</center>
										<!--begin::Card header-->
										<div class="card-header align-items-center py-5 gap-2 gap-md-5">
										<br>
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
													<span class="svg-icon svg-icon-1 position-absolute ms-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
												</div>
												<!--end::Search-->
												<!--begin::Export buttons-->
												<div id="kt_ecommerce_report_views_export" class="d-none"></div>
												<!--end::Export buttons-->
											</div>
											<!--end::Card title-->
											<!--begin::Card toolbar-->
											<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
												<!--begin::Daterangepicker-->
												<!--<input class="form-control form-control-solid w-100 mw-250px" placeholder="Pick date range" id="kt_ecommerce_report_views_daterangepicker" />-->
												<!--end::Daterangepicker-->
												<!--begin::Filter-->
												<!--<div class="w-150px">
													
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Rating" data-kt-ecommerce-order-filter="rating">
														<option></option>
														<option value="all">All</option>
														<option value="rating-5">5 Stars</option>
														<option value="rating-4">4 Stars</option>
														<option value="rating-3">3 Stars</option>
														<option value="rating-2">2 Stars</option>
														<option value="rating-1">1 Stars</option>
													</select>
													
												</div>-->
												<!--end::Filter-->
												<!--begin::Export dropdown-->
												<button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
														<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
														<path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->Export Report</button>
												<!--begin::Menu-->
												<div id="kt_ecommerce_report_views_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to clipboard</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as Excel</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">Export as CSV</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
												<!--end::Export dropdown-->
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													
													<tr class="text-start fw-bold fs-7 text-uppercase gs-0">
													
														<th class="min-w-10px"><font color="#0000ff">S/N</th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Product</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Weight</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Purchased Amount</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Delivery Amount</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>No. Bags</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Supplied Weight</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Current Weight</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Supplied Date</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Registered Date</strong></font></th>
														
														
														<!--<th class="min-w-100px"><font color="#0000ff"><strong>View Details</strong></font></th>-->
														
														
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fw-semibold">
													<!--begin::Table row-->
													<?php $i=0; ?>
													<?php foreach($inventory as $value){ ?>
													<?php $i++ ?>
													<tr>
														<!--begin::Product=-->
														<td>
															<?php echo $i;?>
														</td>
														<!--end::Product=-->
														<!--begin::SKU=-->
														<td>
															<span><?php echo $value['product_name']; ?></span>
														</td>
														<td>
															<span><?php echo $value['weight']; ?></span>
														</td>
														<td>
															<span class="fw-bold"><?php echo number_format($value['amount'], 2); ?></span>
														</td>
														
														<td>
															<span class="fw-bold"><?php echo number_format($value['amount_tp'], 2); ?></span>
														</td>
														
														<td>
															<span class="fw-bold"><?php echo $value['no_bags']; ?></span>
														</td>
														<td>
															<span class="fw-bold"><?php echo $value['total_weight']; ?> KG</span>
														</td>
														
														<td>
															<span class="fw-bold"><?php echo $value['real_weight']; ?> KG</span>
														</td>
														<td>
															<span class="fw-bold"><?php echo $value['supply_date']; ?></span>
														</td>
														<td>
															<span class="fw-bold"><?php echo $value['datetime']; ?></span>
														</td>
														
														<!--<td>
												<span class="fw-bold"><button type="button" class="btn btn-primary">View Details</button></span>
														</td>-->
														
														
													</tr>
													<?php } ?>
													
													<!--end::Table row-->
													
													
													<!--end::Table row-->
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
										
										
									</div>
									<br>
									<!--<canvas id="myChart" style="width:100%;max-width:600px;"></canvas>-->
								
								

									
									
									
									<!--end::Products-->
								</div>
								<!--end::Content container-->
							</div>
											
										</div>
									
									
									
								</div>
								<!--end::Content container-->
							
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		
		
		
		<!--end::Drawers-->
		<!--begin::Engage drawers-->
		
		<!--end::Demos drawer-->
		
		
		<!--end::Engage toolbar-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		
		
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Create App-->
		
		
		<!--end::Modal - Invite Friend-->
		<!--end::Modals-->
		
		
		
		
		<!--begin::Javascript-->
		<script>var hostUrl = "../public/assets_user/index.html";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="../public/assets_user/plugins/global/plugins.bundle.js"></script>
		<script src="../public/assets_user/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used by this page)-->
		<script src="../public/assets_user/plugins/custom/datatables/datatables.bundle.js"></script>
		<script src="../public/assets_user/plugins/custom/vis-timeline/vis-timeline.bundle.js"></script>
		<script src="cdn.amcharts.com/lib/5/index.js"></script>
		<script src="cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used by this page)-->
		
		<script src="../public/assets_user/js/widgets.bundle.js"></script>
		<script src="../public/assets_user/js/custom/widgets.js"></script>
		<script src="../public/assets_user/js/custom/apps/chat/chat.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-app.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-campaign.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/type.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/budget.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/settings.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/team.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/targets.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/files.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/complete.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/create-project/main.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/users-search.js"></script>
		<script src="../public/assets_user/js/custom/apps/support-center/tickets/paye.js"></script>
		<script src="../public/assets_user/js/custom/apps/ecommerce/reports/views/transreport.js"></script>
		<script src="../public/assets_user/js/custom/utilities/modals/paye_payment.js"></script>
		<script src="../public/assets_user/js/custom/apps/support-center/tickets/products.js"></script>
		
		
		
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
		
			 <script>
    "use strict";

    // Class definition
    var KTChartsWidget15 = (function () {
        // Private methods
        var initChart = function () {
            // Check if amchart library is included
            if (typeof am5 === "undefined") {
                return;
            }

            var element = document.getElementById("states_revenue_chart");

            if (!element) {
                return;
            }

            var root;

            var init = function() {
                // Create root element
                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                root = am5.Root.new(element);

                // Set themes
                // https://www.amcharts.com/docs/v5/concepts/themes/
                root.setThemes([am5themes_Animated.new(root)]);

                // Create chart
                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                var chart = root.container.children.push(
                    am5xy.XYChart.new(root, {
                        panX: false,
                        panY: false,
                        //wheelX: "panX",
                        //wheelY: "zoomX",
                        layout: root.verticalLayout,
                    })
                );

                // Data
                var colors = chart.get("colors");
                var data2 = <?php echo json_encode($total_transactions_data)?>;
                var data = [
                    {
                        month: "Jan",
                        visits: 725
                    },
                    {
                        month: "Feb",
                        visits: 625
                    },
                    {
                        month: "Mar",
                        visits: 602,
                    },
                    {
                        month: "Apr",
                        visits: 509
                    },
                    {
                        month: "May",
                        visits: 322
                    },
                    {
                        month: "Jun",
                        visits: 214
                    },
                    {
                        month: "Jul",
                        visits: 204
                    },
                    {
                        month: "Aug",
                        visits: 200
                    },
                    {
                        month: "Sep",
                        visits: 165
                    },
                    {
                        month: "Oct",
                        visits: 152
                    },
                    {
                        month: "Nov",
                        visits: 125
                    },
                    {
                        month: "Dec",
                        visits: 99
                    },
                ];

                // Create axes
                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                var xAxis = chart.xAxes.push(
                    am5xy.CategoryAxis.new(root, {
                        categoryField: "month",
                        renderer: am5xy.AxisRendererX.new(root, {
                            minGridDistance: 30,
                        }),
                        bullet: function (root, axis, dataItem) {
                            return am5xy.AxisBullet.new(root, {
                                location: 0.5,
                                sprite: am5.Picture.new(root, {
                                    width: 24,
                                    height: 24,
                                    centerY: am5.p50,
                                    centerX: am5.p50,
                                    src: dataItem.dataContext.icon,
                                }),
                            });
                        },
                    })
                );

                xAxis.get("renderer").labels.template.setAll({
                    paddingTop: 20,
                    fontWeight: "400",
                    fontSize: 14,
                    fill: am5.color(KTUtil.getCssVariableValue('--kt-gray-500'))
                });

                xAxis.get("renderer").grid.template.setAll({
                    disabled: true,
                    strokeOpacity: 0
                });

                xAxis.data.setAll(data2);

                var yAxis = chart.yAxes.push(
                    am5xy.ValueAxis.new(root, {
                        renderer: am5xy.AxisRendererY.new(root, {}),
                    })
                );

                yAxis.get("renderer").grid.template.setAll({
                    stroke: am5.color(KTUtil.getCssVariableValue('--kt-gray-300')),
                    strokeWidth: 1,
                    strokeOpacity: 1,
                    strokeDasharray: [3]
                });

                yAxis.get("renderer").labels.template.setAll({
                    fontWeight: "400",
                    fontSize: 14,
                    fill: am5.color(KTUtil.getCssVariableValue('--kt-gray-500'))
                });

                // Add series
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                var series = chart.series.push(
                    am5xy.ColumnSeries.new(root, {
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: "visits",
                        categoryXField: "month",
                        fill: am5.color(KTUtil.getCssVariableValue('--kt-primary')),
                    })
                );

                series.columns.template.setAll({
                    tooltipText: "{categoryX}: {valueY}",
                    tooltipY: 0,
                    strokeOpacity: 0,
                    templateField: "columnSettings",
                });

                series.columns.template.setAll({
                    strokeOpacity: 0,
                    cornerRadiusBR: 0,
                    cornerRadiusTR: 6,
                    cornerRadiusBL: 0,
                    cornerRadiusTL: 6,
                });

                series.data.setAll(data2);

                // Make stuff animate on load
                // https://www.amcharts.com/docs/v5/concepts/animations/
                series.appear();
                chart.appear(1000, 100);
            }

            am5.ready(function () {
                init();
            });

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {
                // Destroy chart
                root.dispose();

                // Reinit chart
                init();
            });
        };

        // Public methods
        return {
            init: function () {
                initChart();
            },
        };
    })();

    // Webpack support
    if (typeof module !== "undefined") {
        module.exports = KTChartsWidget15;
    }

    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTChartsWidget15.init();
    });

    "use strict";

    // Class definition
    var StateCharts = function () {
        var chart1 = {
            self: null,
            rendered: false
        };

        var chart2 = {
            self: null,
            rendered: false
        };

        var chart3 = {
            self: null,
            rendered: false
        };

        // Private methods
        var initChart = function(chart, toggle, chartSelector, data, initByDefault) {
            var element = document.querySelector(chartSelector);

            if (!element) {
                return;
            }

            var height = parseInt(KTUtil.css(element, 'height'));
            var labelColor = KTUtil.getCssVariableValue('--kt-gray-900');

            var borderColor = KTUtil.getCssVariableValue('--kt-border-dashed-color');

            var options = {
                series: [{
                    name: 'Total Transactions',
                    data: data
                }],
                chart: {
                    fontFamily: 'inherit',
                    type: 'bar',
                    height: height,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: ['22%'],
                        borderRadius: 5,
                        dataLabels: {
                            position: "top" // top, center, bottom
                        },
                        startingShape: 'flat'
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: true,
                    offsetY: -28,
                    style: {
                        fontSize: '13px',
                        colors: [labelColor]
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                   // categories: ['Abia', 'Adamawa', 'Akwa-Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue', 'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'Ekiti', 'Enugu', 'Gombe', 'Imo', 'Jigawa', 'Kaduna'],
                  categories: <?php echo $state; ?>,
                  axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: KTUtil.getCssVariableValue('--kt-gray-500'),
                            fontSize: '13px'
                        }
                    },
                    crosshairs: {
                        fill: {
                            gradient: {
                                opacityFrom: 0,
                                opacityTo: 0
                            }
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: KTUtil.getCssVariableValue('--kt-gray-500'),
                            fontSize: '13px'
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    }
                },
                colors: [KTUtil.getCssVariableValue('--kt-primary'), KTUtil.getCssVariableValue('--kt-primary-light')],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                }
            };

            chart.self = new ApexCharts(element, options);
            var tab = document.querySelector(toggle);

            if (initByDefault === true) {
                // Set timeout to properly get the parent elements width
                setTimeout(function() {
                    chart.self.render();
                    chart.rendered = true;
                }, 200);
            }

            tab.addEventListener('shown.bs.tab', function (event) {
                if (chart.rendered === false) {
                    chart.self.render();
                    chart.rendered = true;
                }
            });
        }

        // Public methods
        return {
            init: function () {
                var chart1Data = <?php echo json_encode($chart1Data); ?>;
                initChart(chart1, '#state_chart_tab_1', '#state_chart_chart_1', chart1Data, true);

                var chart2Data = <?php echo json_encode($chart2Data)?>;
                initChart(chart2, '#state_chart_tab_2', '#state_chart_chart_2', chart2Data, false);

                var chart3Data = <?php echo json_encode($chart3Data)?>;
                initChart(chart3, '#state_chart_tab_3', '#state_chart_chart_3', chart3Data, false);

                // Update chart on theme mode change
                KTThemeMode.on("kt.thememode.change", function() {
                    if (chart1.rendered) {
                        chart1.self.destroy();
                    }

                    if (chart2.rendered) {
                        chart2.self.destroy();
                    }

                    if (chart3.rendered) {
                        chart3.self.destroy();
                    }

                    initChart(chart1, '#state_chart_tab_1', '#state_chart_chart_1', chart1Data, chart1.rendered);
                    initChart(chart2, '#state_chart_tab_2', '#state_chart_chart_2', chart2Data, chart2.rendered);
                    initChart(chart3, '#state_chart_tab_3', '#state_chart_chart_3', chart3Data, chart3.rendered);
                });
            }
        }
    }();

    // Webpack support
    if (typeof module !== 'undefined') {
        module.exports = StateCharts;
    }

    // On document ready
    KTUtil.onDOMContentLoaded(function() {
        StateCharts.init();
    });

</script>

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
		
<script>
function showAmount(str) {

    if (str == "") {

        document.getElementById("txtHint").innerHTML = "";

        return;

    } else { 

        if (window.XMLHttpRequest) {

            // code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp = new XMLHttpRequest();

        } else {

            // code for IE6, IE5

            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

            }

        }

        xmlhttp.open("GET","getamount.php?q="+str,true);

        xmlhttp.send();

    }

}

</script>
        <!--End Custom script-->
	</body>
	<!--end::Body-->

</html>