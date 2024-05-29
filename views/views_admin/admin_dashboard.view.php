 <!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title>Dashboard::REDDOT</title>
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
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<script>
function validateForm() {
  var x = document.forms["myForm"]["top_up_amount"].value;
  var y = document.forms["myForm"]["payment_methods"].value;
  if (x == "" || x == null) {
    alert("Amount must be filled out");
    return false;
  }
  if (y == "" || x == null) {
    alert("Payment Method must be selected");
    return false;
  }
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "90%" 
        }
</script>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
		foreach($switchpiechart as $value) { ?>
          ['<?php echo $value['switch']; ?>', <?php echo $value['amount']; ?>],
		<?php } ?>
          ['others',    0]
        ]);

        var options = {
          title: 'Payment Switches'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	
	    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .scrolling-text {
            white-space: nowrap;
            overflow: hidden;
            width: 100%;
        }

        .scrolling-text span {
            display: inline-block;
            padding-right: 20px; /* Adjust as needed for spacing */
            animation: scroll 10s linear infinite;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.css">
    <!-- Include ApexCharts and jQuery from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.28.3/dist/apexcharts.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

	
	<!--end::Head-->
	<!--beon-->
<body onload="zoom()" id="kt_app_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on" data-kt-app-layout="dark-sidebar"  data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--Begin::Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!--End::Google Tag Manager (noscript) -->
		
		<!--begin::loader-->
		<?php include('include/loader.php'); ?>
		<!--end::Loader-->
		
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				<?php 
				include('include/header.php');
				?>
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
										
										<?php if(isset($_SESSION['success'])){ ?>
										
										<div class="modal fade" tabindex="-1" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Successful !</h3>

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
										
			   <?php if(isset($_SESSION['fail'])){ ?>
				<div class="alert alert-danger">
				<?php echo $_SESSION['fail']; ?>
				<?php unset($_SESSION['fail']); ?>
                </div>  
			  <?php } ?>
										
									<?php include('include/welcome.php'); ?>
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							
							
							
							 <!--begin::Content-->
						 <div style="background-color:#ffffff">
						 <br><br>
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Row-->
                            <div class="row g-6 g-xl-9 mb-10">
                                <!--begin::Col-->
													 <div class="rounded min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.2); background-color: #0095e8; width:180px">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <div  data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="&#8358;"></div>
                                                  <div class="fw-bold fs-2 text-white opacity-100"><?php echo number_format($availableOrders ?? 0.00, 2); ?></div>
													</div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <font color="#ffffff">Available Stocks (Orders)</font>
                                                    <!--end::Label-->
                                                </div>
												 <div class="rounded min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.2); background-color: #0095e8; width:180px">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <div  data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="&#8358;"></div>
                                                  <div class="fw-bold fs-2 text-white opacity-100"><?php echo number_format($pendingOrders ?? 0.00, 2) ?></div>
													</div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <font color="#ffffff">Pending Stocks (Orders)</font>
                                                    <!--end::Label-->
                                                </div>
												 <div class="rounded min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.2); background-color: #0095e8; width:180px">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <div  data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="&#8358;"></div>
                                                  <div class="fw-bold fs-2 text-white opacity-100"><?php echo number_format($year, 2) ?></div>
													</div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <font color="#ffffff"><?php echo date('Y'); ?> Payment</font>
                                                    <!--end::Label-->
                                                </div>
                                     
												 <div class="rounded min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.2); background-color: #0095e8; width:180px">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <div  data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="&#8358;"></div>
                                                  <div class="fw-bold fs-2 text-white opacity-100"><?php echo number_format($tPayment['totalPayment'], 2) ?></div>
													</div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <font color="#ffffff">Total Payment</font>
                                                    <!--end::Label-->
                                                </div>
												 <div class="rounded min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.2); background-color: #0095e8; width:180px">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <div  data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="&#8358;"></div>
                                                  <div class="fw-bold fs-2 text-white opacity-100"><?php echo $tApplicants; ?></div>
													</div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <font color="#ffffff">Total Applicants</font>
                                                    <!--end::Label-->
                                                </div>
												 <div class="rounded min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.2); background-color: #0095e8; width:180px">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <div  data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="&#8358;"></div>
                                                  <div class="fw-bold fs-2 text-white opacity-100"><?php echo number_format($total_demand, 2) ?></div>
													</div>
                                                    <!--end::Number-->
                                                    <!--begin::Label-->
                                                    <font color="#ffffff">Pending Request</font>
                                                    <!--end::Label-->
                                                </div>
												
												
												<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack flex-grow-1">
															<!--begin::Content-->
															<div class="fw-bold">
																 <div class="fw-bold scrolling-text">
        <?php
        foreach ($allStages as $stage => $count) {
            echo "<span><font color='#ff0000'>$stage:</font> $count</span>";
        }
        ?>
    </div>

																</div>
																
																
															
															<!--end::Content-->
														</div>
														<!--end::Wrapper-->
													</div>
							</div>
							</div>
							</div>
							</div>
												
												
											
								
					

<div style="background-color:#ffffff">
						 
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Row-->
                            <div class="row g-6 g-xl-9 mb-12">
                                <!--begin::Col-->
                                <div class="col-sm-12 col-xl-8">
								
								 <form id="form1" name="form1" method="post" action="Dashboard" enctype="multipart/form-data">

                                    <table class="table table-striped table-bordered table-hover table-green">
  
  <tr>
    <td> <font color="#fd0100"; size="3px">Select Start Date </font><input value="Select" class="form-control" type="date" name="startdate" id="textfield" required />
</td>
        <td>  <font color="#fd0100"; size="3px">Select Start Date </font><input value="YYYY-MM-DD" class="form-control" type="date" name="enddate" id="textfield" required />
</td>
        <td><br><input type="submit" class="btn btn-primary" value="Generate Report" name="submit">
</td>

  </tr>
 
</table>
</form>  
								
								<h3>Total Distributions Across Depots</h3>
								 <div id="chart"></div>
								
								


                                          
                                                <!--end::Tap pane-->
                                                <!--begin::Tap pane-->
								</div>
								
								<div class="col-sm-12 col-xl-4">
								<center><h3>Total Distributions / Pending</h3></center>
								 <!--begin::Action-->
                                            <div class="d-flex justify-content-end pb-0 px-0">
                                                <a href="#" class="btn btn-light btn-active-light-primary me-2" id="kt_account_billing_cancel_subscription_btn"><font color="#ff0000"><?php echo $reqCount; ?> Admission(s)</font></a>
                                                <button onclick="location.href='#';"  class="btn btn-primary" >View Now</button>
												<a href="#" class="btn btn-light btn-active-light-primary me-2" id="kt_account_billing_cancel_subscription_btn"><font color="#ff0000"> <?php echo $objection; ?> Visa</font></a>
							
                                            </div>
												</div>
								
</div>
</div>
</div>
</div>

<div style="background-color:#ffffff">
						 
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Row-->
                            <div class="row g-6 g-xl-9 mb-10">
                                <!--begin::Col-->
                                
								<div class="col-sm-12 col-xl-5">
								<h3>Total Transaction from Payment Switches</h3>
								<center>
								 <div id="piechart" style="width: 500px; height: 400px; align:left;"></div>
								 </center>
								</div>
								
								<div class="col-sm-12 col-xl-7">
								<h3>Recent Distributions</h3>
								<!--begin::Products-->
									<div class="card card-flush">
									
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
												<!--end::Svg Icon-->Export Transaction Report</button>
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
														<th class="min-w-100px"><font color="#0000ff"><strong>Stages</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>No. Of Applicants</strong></font></th>
														
														
														<th class="min-w-100px"><font color="#0000ff"><strong>View Details</strong></font></th>
														
														
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
										<tbody class="fw-semibold">
    <!--begin::Table row-->
    <?php $i = 0; ?>
    <?php foreach ($allStages as $stageName => $count) { ?>
        <?php $i++; ?>
        <tr>
            <!--begin::Product-->
            <td>
                <?php echo $i; ?>
            </td>
            <!--end::Product-->
            <!--begin::SKU-->
            <td>
             <?php    $stageNumber = filter_var($stageName, FILTER_SANITIZE_NUMBER_INT); ?>
                <span><?php echo $stageName; ?></span>
            </td>
            <td>
                <span class="fw-bold"><?php echo $count; ?> Applicants</span>
            </td>
            <td>
                <span class="fw-bold">
                    <!-- Add an <a> tag with href linking to Details@$id -->
                    
                    <a href="StageDetails@<?php echo base64_encode($stageNumber).'$'.base64_encode($_SESSION['secret']); ?>" class="btn btn-primary">View Details</a>
                </span>
            </td>
        </tr>
    <?php } ?>
    <!--end::Table row-->
</tbody>


												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
								
								
								</div>
								
								
								
</div>
</div>
</div>
</div>

						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						<div id="kt_app_footer" class="app-footer">
							<!--begin::Footer container-->
							<?php include('include/footer.php'); ?>
							<!--end::Footer container-->
						</div>
						<!--end::Footer-->
					</div>
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
		
		
		<!--begin::Modal - Create Campaign-->
		<div class="modal fade" id="kt_modal_top_up_wallet" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-fullscreen p-9">
				<!--begin::Modal content-->
				<div class="modal-content modal-rounded">
					<!--begin::Modal header-->
					<div class="modal-header py-7 d-flex justify-content-between">
						<!--begin::Modal title-->
						<h2>Top Up Wallet</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-kt-modal-action-type="close">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
							<button class="btn btn-lg btn-danger" >close</button>
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
					<div class="modal-body scroll-y m-5">
						<!--begin::Stepper-->
						<div class="stepper stepper-links d-flex flex-column gap-5" id="kt_modal_top_up_wallet_stepper">
							<!--begin::Nav-->
							<div class="stepper-nav justify-content-center py-2">
								<!--begin::Step 1-->
								<div class="stepper-item current" data-kt-stepper-element="nav">
									<h3 class="stepper-title">Deposit Amount</h3>
								</div>
								<!--end::Step 1-->
								<!--begin::Step 2-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<h3 class="stepper-title">Payment Channel</h3>
								</div>
								<!--end::Step 2-->
								
								<!--begin::Step 4-->
								<div class="stepper-item" data-kt-stepper-element="nav">
									<h3 class="stepper-title">Payment Portal</h3>
								</div>
								<!--end::Step 4-->
							</div>
							<!--end::Nav-->
							<!--begin::Form-->
							<form name="myForm" id="kt_modal_top_up_wallet_stepper_form" class="mx-auto w-100 mw-600px pt-15 pb-10" action="TopupWallet" method="POST" onsubmit="return validateForm()">
								<!--begin::Step 1-->
								<div class="current" data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-10 pb-lg-15">
											<!--begin::Title-->
											<h2 class="fw-bold d-flex align-items-center text-dark">Set Amount to Top Up 
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="You will be charged the set amount from your selected payment option"></i></h2>
											<!--end::Title-->
											<!--begin::Notice-->
											<div class="text-muted fw-semibold fs-6">If you need more info, please check out 
											<a href="#" class="link-primary fw-bold">Help Page</a>.</div>
											<!--end::Notice-->
										</div>
										<!--end::Heading-->
										<!--begin::Input group-->
										<div class="mb-10 fv-row">
											<!--begin::Label-->
											<label class="form-label mb-3">
												<span class="required">Top Up Amount</span>
											</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" class="form-control form-control-lg form-control-solid" name="top_up_amount" placeholder="Enter Amount"  autocomplete="off" required />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Step 1-->
								<!--begin::Step 2-->
								<div data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-10 pb-lg-12">
											<!--begin::Title-->
											<h1 class="fw-bold text-dark">Payment Channel</h1>
											<!--end::Title-->
											<!--begin::Description-->
											<div class="text-muted fw-semibold fs-6">If you need more info, please check 
											<a href="#" class="link-primary">FAQ</a></div>
											<!--end::Description-->
										</div>
										<!--end::Heading-->
										<!--begin::Dollar options-->
										<div class="" data-kt-modal-top-up-wallet-option="dollar">
											<!--begin::Input group-->
											<div class="fv-row mb-10">
												<!--begin::Label-->
												<label class="required fs-6 fw-semibold mb-2">Select a payment method</label>
												<!--End::Label-->
												<!--begin::Row-->
												<div class="row row-cols-1 row-cols-md-2 g-5">
													<!--begin::Col-->
													<div class="col">
														<!--begin::Option-->
														<input type="radio" class="btn-check" name="payment_methods" value="dollar" id="kt_modal_top_up_wallet_payment_method_option_0"  />
														<label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-start gap-5 h-100" for="kt_modal_top_up_wallet_payment_method_option_0">
															<!--begin::Icon-->
															<img src="../public/assets_user/media/svg/card-logos/mastercard.svg" alt="" class="w-50px" />
															<!--end::Icon-->
															<!--begin::Card details-->
															<div class="d-flex align-items-start flex-column gap-3">
																<div class="d-flex align-items-center">
																	<!--begin::Card name-->
																	<span>Personal</span>
																	<!--end::Card name-->
																	<!--begin::Badge-->
																	<div class="badge badge-primary ms-5">Primary</div>
																	<!--end::Badge-->
																</div>
																<!--begin::Card number-->
																<div class="text-dark fw-bold">**** 8742</div>
																<!--end::Card number-->
																<!--begin::Card expiry-->
																<div class="text-muted">exp 01/23</div>
																<!--end::Card expiry-->
															</div>
															<!--end::Card details-->
														</label>
														<!--end::Option-->
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="col">
														<!--begin::Option-->
														<input type="radio" class="btn-check" name="payment_methods" value="dollar" id="kt_modal_top_up_wallet_payment_method_option_1" />
														<label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-start gap-5 h-100" for="kt_modal_top_up_wallet_payment_method_option_1">
															<!--begin::Icon-->
															<img src="../public/assets_user/media/svg/card-logos/visa.svg" alt="" class="w-50px" />
															<!--end::Icon-->
															<!--begin::Card details-->
															<div class="d-flex align-items-start flex-column gap-3">
																<div class="d-flex align-items-center">
																	<!--begin::Card name-->
																	<span>Family</span>
																	<!--end::Card name-->
																</div>
																<!--begin::Card number-->
																<div class="text-dark fw-bold">**** 1141</div>
																<!--end::Card number-->
																<!--begin::Card expiry-->
																<div class="text-muted">exp 05/24</div>
																<!--end::Card expiry-->
															</div>
															<!--end::Card details-->
														</label>
														<!--end::Option-->
													</div>
													<!--end::Col-->
													<!--begin::Col-->
														<div class="col">
														<!--begin::Option-->
														<input type="radio" class="btn-check" name="payment_methods" value="paystack" id="kt_modal_top_up_wallet_payment_method_option_2" />
														<label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-start gap-5 h-100" for="kt_modal_top_up_wallet_payment_method_option_2">
															<!--begin::Icon-->
															<center> <img src="../public/assets_user/media/logos/paystack.png" alt="" width="200px" /></center>
										
															<!--end::Icon-->
															<!--begin::Card details-->
															<div class="d-flex align-items-start flex-column gap-3">
																<div class="d-flex align-items-center">
																	<!--begin::Card name-->
																	
																	<!--end::Card name-->
																</div>
																
															</div>
															<!--end::Card details-->
														</label>
														<!--end::Option-->
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="col">
														<!--begin::Add new card-->
														<a href="#" class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex flex-column flex-center gap-5 h-100">
															<!--begin::Icon-->
															<!--begin::Svg Icon | path: icons/duotune/general/gen041.svg-->
															<span class="svg-icon svg-icon-3hx svg-icon-primary">
																<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
																	<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
																	<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
																</svg>
															</span>
															<!--end::Svg Icon-->
															<!--end::Icon-->
															<!--begin::Label-->
															<div class="fs-5 fw-bold">Add New Card</div>
															<!--end::Label-->
														</a>
														<!--end::Add new card-->
													</div>
													<!--end::Col-->
												</div>
												<!--end::Row-->
											</div>
											<!--end::Input group-->
										</div>
										<!--end::Dollar options-->
										
										<!--end::Crypto options-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Step 2-->
								
								<!--begin::Step 5-->
								<div data-kt-stepper-element="content">
									<!--begin::Wrapper-->
									<div class="w-100">
										<!--begin::Heading-->
										<div class="pb-12 text-center">
											<!--begin::Title-->
											<h1 class="fw-bold text-dark">Payment Portal Redirection</h1>
											<!--end::Title-->
											<!--begin::Description-->
											<div class="fw-semibold text-muted fs-4">You will now be redirected to payment portal</div>
											<!--end::Description-->
										</div>
										
										<!--end::Heading-->
										<!--begin::Actions-->
										<!--<div class="d-flex flex-center pb-20">
											<button type="submit" class="btn btn-lg btn-primary">Proceed With Paystack Payment</button>
											<!--<a href="#" class="btn btn-lg btn-primary" data-bs-toggle="tooltip" title="Coming Soon">View Wallet</a>-->
										<!--</div>-->
										<!--end::Actions-->
										<!--begin::Illustration-->
										<!--<div class="text-center px-4">
											<img src="../public/assets_user/media/illustrations/sketchy-1/9.png" alt="" class="mww-100 mh-350px" />
										</div>-->
										<!--end::Illustration-->
									</div>
								</div>
								<!--end::Step 5-->
								<!--begin::Actions-->
								<div class="d-flex flex-stack pt-10">
									<!--begin::Wrapper-->
									<div class="me-2">
										<button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
										<span class="svg-icon svg-icon-3 me-1">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
												<path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon-->Back</button>
									</div>
									<!--end::Wrapper-->
									<!--begin::Wrapper-->
									<div>
										<!--<button class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
											<span>
											
											
											</span>
											
										</button>-->
										
										
										<button type="submit" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
											<span class="indicator-label">Proceed With Paystack Payment

											<span class="svg-icon svg-icon-3 ms-2 me-0">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
												</svg>
											</span>
											</span>
											<span class="indicator-progress">Please wait...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										</button>
										
										
											
										<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue 
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
										<span class="svg-icon svg-icon-3 ms-1 me-0">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
												<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
											</svg>
										</span>
										<!--end::Svg Icon--></button>
										
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Actions-->
							</form>
							
							<!--end::Form-->
						</div>
						
						<!--end::Stepper-->
					</div>
					<!--begin::Modal body-->
				</div>
			</div>
		</div>
		<!--end::Modal - Create Campaign-->
		
		<!-- place below the html form -->
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_096331646323b65e93f9ecb39f7940768f1d0312',
      email: 'customer@email.com',
      amount: 10000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>

		
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
		<script src="../public/assets_user/js/custom/utilities/modals/top-up-wallet.js"></script>
		<script src="../public/assets_user/js/custom/apps/ecommerce/reports/views/transreport.js"></script>
		</script>
		<script src="../public/assets_user/js/custom/apps/chat/chat.js"></script>
		
<!--end::Custom Javascript-->


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
 <script type="text/javascript">
        $(window).on('load', function () {
            setTimeout(function () {
                $('#myModal').modal('show');
                // Initialize the chart after the modal is shown
                initChart();
            }, 5000); // Adjust the delay as needed
        });
    </script>

<!-- Script to initialize the chart -->
<script type="text/javascript">
    // PHP array passed to JavaScript
    var allStages = <?php echo json_encode($allStages); ?>;

    // Function to initialize the chart
    var initChart = function () {
        // Extract numeric values from the PHP array
        var data = Object.values(allStages).map(Number);

        // Extract labels (depot names) from the PHP array
        var labels = Object.keys(allStages);

        // Create the chart
        var chart = new ApexCharts(document.getElementById("chart"), {
            series: [{
                name: 'Total Quantity',
                data: data
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    dataLabels: {
                        position: 'top',
                        colors: ['#FF0000'], // Color for text on bars (like "2 Applicants")
                        formatter: function (val, opt) {
                            return opt.w.globals.labels[opt.dataPointIndex] + ": " + val.toFixed(0) + " books";
                        }
                    },
                }
            },
            dataLabels: {
                enabled: true,
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ['#ff0000'] // Red color for data labels
                },
                formatter: function (val) {
                    return val.toFixed(0) + ' books';
                }
            },
            xaxis: {
                categories: labels, // Use depot names as categories
            },
            colors: ['#000093'], // Bar color
            yaxis: {
                labels: {
                    style: {
                        colors: ['#000093'] // Blue color for stage labels
                    }
                }
            }
        });

        // Render the chart
        chart.render();
    };

    // Initialize the chart immediately
    initChart();
</script>


	</body>
	<!--end::Body-->

</html>