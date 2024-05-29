 <!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title>Detailed Order::REDDOT</title>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

	</head>
	<!--end::Head-->
	<!--begin::Body-->
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
				<?php 
				include('include/header.php');
				?>
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<?php  include('include/sidebar.php'); ?>
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
							
							<?php if(isset($_SESSION['success'])){ ?>
										
										<div class="modal fade" tabindex="-1" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"><?php echo $_SESSION['success']; ?></h3>

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
				<?php unset($_SESSION['success']); ?>
                
				
			  <?php } ?>
										
			   <?php if(isset($_SESSION['fail'])){ ?>
				<div class="alert alert-danger">
				<?php echo $_SESSION['fail']; ?>
				<?php unset($_SESSION['fail']); ?>
                </div>  
			  <?php } ?>
							<!--end::Toolbar-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Layout-->
									<div class="d-flex flex-column flex-xl-row">
										
										<!--begin::Content-->
										<div class="flex-lg-row-fluid ms-lg-15">
											<!--begin:::Tabs-->
											<!--<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
												
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_customer_overview">Sales Slip</a>
												</li>
												
											</ul>-->
											<!--end:::Tabs-->
											
					                         
											<!--begin:::Tab content-->
											<div class="tab-content" id="myTabContent">
												<!--begin:::Tab pane-->
												<div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
													
													<!--begin::Card-->
													<div class="card pt-4 mb-6 mb-xl-9">
														<!--begin::Card header-->
														<div class="card-header border-0">
															<!--begin::Card title-->
															<div class="card-title">
																<h2>Ordered Details</h2>
															</div>
															<!--end::Card title-->
															<a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_new_ticket_receive" class="btn btn-danger fw-bold fs-8 fs-lg-base">Receive Order</a>
														</div>
														
														
														
														
														<div class="modal fade" id="kt_modal_new_ticket_receive" tabindex="-1" aria-hidden="true">
										<!--begin::Modal dialog-->
										<div class="modal-dialog modal-dialog-centered mw-1000px">
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
													<form id="kt_modal_new_ticket_form" method="POST" class="form" action="ReceiveOrders" onsubmit="return confirm('Are you sure you want to receive these orders?');">
    <div class="mb-13 text-center">
        <h1 class="mb-3">Receive Order</h1>
    </div>
	
	 <?php foreach ($detailed as $value): ?>
    <div id="books_container">
        <div class="book_entry d-flex align-items-center mb-8 fv-row">
            <div class="d-flex flex-column mb-6 me-4">
                <label class="required fs-6 fw-semibold mb-2"><span style="color:#ff0000;">Book Name</span></label>
                <input value="<?php echo $value['book_name']; ?> " name="book_name[]" class="form-control form-control-solid book_name" data-hide-search="true"  readonly>
            </div>

            <div class="d-flex flex-column mb-4 me-4">
                <label class="required fs-6 fw-semibold mb-2"><span style="color:#ff0000;">Select Quantity</span></label>
                <input type="number" class="form-control form-control-solid quantity" name="quantity[]" required oninput="calculateTotal(this)" max="<?php echo $value['quantity']; ?>" required>
            </div>

            <div class="d-flex flex-column mb-4 me-4">
                <label class="required fs-6 fw-semibold mb-2"><span style="color:#ff0000;">Unit Amount</span></label>
                <input type="text" class="form-control form-control-solid unit_amount" name="unit_amount[]" required oninput="calculateTotal(this)" required>
            </div>

            <div class="d-flex flex-column mb-4">
                <label class="required fs-6 fw-semibold mb-2"><span style="color:#ff0000;">Total Amount</span></label>
                <input type="text" class="form-control form-control-solid total_amount" name="total_amount[]" required readonly>
            </div>
			
			<input type="hidden" value="<?php echo $value['id']; ?>"  name="id[]" >
			<input type="hidden" value="<?php echo $orderCode; ?>"  name="order_code[]" >			
			
        </div>
    </div>
	<?php endforeach; ?>
    <!-- Display the Grand Total -->
    <!--<div id="grand_total_display" class="text-center mb-3"></div>-->
	<div id="grand_total_display" class="text-center mb-3" style="font-size: 1.2em; color: #ff0000;"></div>


    <div class="text-center">
        
        
        <button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-primary">
            <span class="indicator-label">Receive Book</span>
            <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form>



												</div>
												<!--end::Modal body-->
											</div>
											<!--end::Modal content-->
										</div>
										<!--end::Modal dialog-->
									</div>
									<!--end::Modal - Support Center - Create Ticket-->
														
														
														<!--end::Card header-->
														<!--begin::Card body-->
														
															<!--begin::Table-->
															
															<div id="kt_app_content" class="app-content flex-column-fluid">
											
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
								
									
									<div class="card card-flush">
									
										
										<!--<div class="card-header align-items-center py-5 gap-2 gap-md-5">
										<br>
											
											<div class="card-title">
												
												<div class="d-flex align-items-center position-relative my-1">
													
													<span class="svg-icon svg-icon-1 position-absolute ms-4">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
															<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
														</svg>
													</span>
													
													<input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
												</div>
												
												<div id="kt_ecommerce_report_views_export" class="d-none"></div>
												
											</div>
											
											<div class="card-toolbar flex-row-fluid justify-content-end gap-5">
												
												<button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
												
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
														<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
														<path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
													</svg>
												</span>
												Export PAYE Report</button>
												
												<div id="kt_ecommerce_report_views_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
													
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">Copy to clipboard</a>
													</div>
													
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">Export as Excel</a>
													</div>
													
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">Export as CSV</a>
													</div>
													
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">Export as PDF</a>
													</div>
													
												</div>
												
											</div>
											
										</div>-->
										
										<div class="card-body pt-0">
										<div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
													<!--begin::Invoice 2 content-->
													<div class="mt-n1">
														<!--begin::Top-->
														<div class="d-flex flex-stack pb-10">
															
															
															<span class="badge badge-light-success me-2">Ordered</span>
															
															
															<!--end::Action-->
														</div>
														<!--end::Top-->
														<!--begin::Wrapper-->
														<div class="m-0">
															<!--begin::Label-->
															<div class="fw-bold fs-3 text-gray-800 mb-8">Ordered Code: <?php echo $secret->id($id); ?></div>
															<!--end::Label-->
															<!--begin::Row-->
															<div class="row g-5 mb-11">
																<!--end::Col-->
																<div class="col-sm-6">
																	<!--end::Label-->
																	<div class="fw-semibold fs-7 text-gray-600 mb-1">Issue Date:</div>
																	<!--end::Label-->
																	<!--end::Col-->
																	<div class="fw-bold fs-6 text-gray-800"><?php echo date('d-m-Y'); ?></div>
																	<!--end::Col-->
																</div>
																<!--end::Col-->
																<!--end::Col-->
																<div class="col-sm-6">
																	<!--end::Label-->
																	<div class="fw-semibold fs-7 text-gray-600 mb-1">Terms:</div>
																	<!--end::Label-->
																	<!--end::Info-->
																	<div class="fw-bold fs-6 text-gray-800 d-flex align-items-center flex-wrap">
																		<!--<span class="pe-2">02 May 2021</span>-->
																		<span class="fs-7 text-danger d-flex align-items-center">
																		<span class="bullet bullet-dot bg-danger me-2"></span>Order made in good faith...</span>
																	</div>
																	<!--end::Info-->
																</div>
																<!--end::Col-->
															</div>
															<!--end::Row-->
															<!--begin::Row-->
															<div class="row g-5 mb-12">
																<!--end::Col-->
																<div class="col-sm-6">
																	<!--end::Label-->
																	<div class="fw-semibold fs-7 text-gray-600 mb-1">Issue For:</div>
																	<!--end::Label-->
																	<!--end::Text-->
																	<div class="fw-bold fs-6 text-gray-800">something</div>
																	<!--end::Text-->
																	<!--end::Description-->
																	<!--<div class="fw-semibold fs-7 text-gray-600">8692 Wild Rose Drive 
																	<br />Livonia, MI 48150</div>-->
																	<!--end::Description-->
																</div>
																<!--end::Col-->
																<!--end::Col-->
																<div class="col-sm-6">
																	<!--end::Label-->
																	<div class="fw-semibold fs-7 text-gray-600 mb-1">Ordered By:</div>
																	<!--end::Label-->
																	<!--end::Text-->
																	<div class="fw-bold fs-6 text-gray-800">REDDOT</div>
																	<!--end::Text-->
																	<!--end::Description-->
																	<!--<div class="fw-semibold fs-7 text-gray-600">9858 South 53rd Ave.
																	<br />Matthews, NC 28104</div>-->
																	<!--end::Description-->
																</div>
																<!--end::Col-->
															</div>
															<!--end::Row-->
															<!--begin::Content-->
															<div class="flex-grow-1">
																<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_views_table">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													
													<tr class="text-start fw-bold fs-7 text-uppercase gs-0">
													
														<th class="min-w-10px"><font color="#0000ff">S/N</th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Book Name</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Order Code</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Quantity</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Unit Amount</strong></font></th>
														<th class="min-w-100px"><font color="#0000ff"><strong>Total Amount</strong></font></th>
														
														
														
														<!--<th class="min-w-100px"><font color="#0000ff"><strong>View Details</strong></font></th>-->
														
														
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fw-semibold">
    <!--begin::Table row-->
    <?php if (!empty($detailed)): ?>
	<?php $i=0; ?>
        <?php foreach($detailed as $value): ?>
		<?php $i++ ?>
            <tr>
                <!--begin::Product-->
                <td><?php echo $i;?></td>
                <!--end::Product-->
                <!--begin::SKU-->
				<td>
                    <span><?php echo $value['book_name']; ?></span>
                </td>
                <td>
                    <span><?php echo $value['order_code']; ?></span>
                </td>
				 <td>
                    <span><?php echo $value['quantity']; ?></span>
                </td>
				<td>
                    <span><?php echo number_format($value['unit_amount'],2); ?></span>
                </td>
				<td>
                    <span><?php echo number_format($value['total_amount'],2); ?></span>
                </td>
				
                <!--end::SKU-->
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">No data available</td>
        </tr>
    <?php endif; ?>
    <!--end::Table row-->
</tbody>

												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
																<!--end::Table-->
																<!--begin::Container-->
																<div class="d-flex justify-content-end">
																	<!--begin::Section-->
																	<div class="mw-300px">
																		<!--begin::Item-->
																		<div class="d-flex flex-stack mb-3">
																			<!--begin::Accountname-->
																			<div class="fw-semibold pe-10 text-gray-600 fs-7">Subtotal:</div>
																			<!--end::Accountname-->
																			<!--begin::Label-->
																			<div class="text-end fw-bold fs-6 text-gray-800"><?php echo number_format($grandTotal,2); ?></div>
																			<!--end::Label-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex flex-stack mb-3">
																			<!--begin::Accountname-->
																			<div class="fw-semibold pe-10 text-gray-600 fs-7">VAT 0%</div>
																			<!--end::Accountname-->
																			<!--begin::Label-->
																			<div class="text-end fw-bold fs-6 text-gray-800">0.00</div>
																			<!--end::Label-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex flex-stack mb-3">
																			<!--begin::Accountnumber-->
																			<div class="fw-semibold pe-10 text-gray-600 fs-7">Subtotal + VAT</div>
																			<!--end::Accountnumber-->
																			<!--begin::Number-->
																			<div class="text-end fw-bold fs-6 text-gray-800"><?php echo number_format($grandTotal,2); ?></div>
																			<!--end::Number-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex flex-stack">
																			<!--begin::Code-->
																			<div class="fw-semibold pe-10 text-gray-600 fs-7">Total</div>
																			<!--end::Code-->
																			<!--begin::Label-->
																			<div class="text-end fw-bold fs-6 text-gray-800"><?php echo number_format($grandTotal,2); ?></div>
																			<!--end::Label-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Section-->
																</div>
																<!--end::Container-->
															</div>
															<!--end::Content-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Invoice 2 content-->
												</div>	
											
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Products-->
								</div>
								<!--end::Content container-->
							</div>
															
															<!--end::Table-->
														
														<!--end::Card body-->
													</div>
													<!--end::Card-->
																									
												<!-- Print button -->
<button id="printButton" class="btn btn-block btn-danger btn-lg">
    <span class="svg-icon svg-icon-3">
        <!-- SVG icon for print -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="6" y="2" width="12" height="20" rx="2" ry="2"></rect>
            <line x1="12" y1="18" x2="12" y2="2"></line>
            <line x1="4" y1="6" x2="20" y2="6"></line>
        </svg>
    </span>
    Print
</button>

<!--<button id="downloadPDFButton" class="btn btn-block btn-primary btn-lg">
    <span class="svg-icon svg-icon-3">
        
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 8l-5 5-5-5"></path>
            <path d="M12 16.5v-12"></path>
            <path d="M4 20h16"></path>
        </svg>
    </span>
    Download PDF
</button>-->

												</div>


												
											</div>
											<!--end:::Tab content-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Layout-->
									<!--end::Modals-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
							</div>
							<!--end::Content-->
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
		
		
		<!-- place below the html form -->
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_096331646323b65e93f9ecb39f7940768f1d0312',
      email: '<?php echo $switch_payment['email']; ?>',
      amount: '<?php echo $switch_payment['amount'] * 100; ?>',
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "mobile_number",
                variable_name: "mobile_number",
                value: "<?php echo $switch_payment['phone']; ?>"
            }
         ]
      },
      callback: function(response){
          //alert('success. transaction ref is ' + response.reference);
		  window.location.href = "PaystackSuccess?switch_referenceid="+response.reference+"&email=<?php echo $switch_payment['email']; ?>&voucher=<?php echo $switch_payment['voucher']; ?>&amount=<?php echo $switch_payment['amount']; ?>";
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
		<script src="../public/assets_user/js/custom/apps/support-center/tickets/payeinit.js"></script>
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
		// Script for printing
document.getElementById('printButton').addEventListener('click', function() {
    printDiv('kt_ecommerce_customer_overview');
});

// Function to print a specific div
function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

		</script>
		
		<script>
		document.getElementById('downloadPDFButton').addEventListener('click', function() {
    const element = document.getElementById('kt_ecommerce_customer_overview'); // Assuming this is the ID of the div you want to convert to PDF

    html2canvas(element).then(function(canvas) {
        const pdf = new jsPDF('p', 'mm', 'a4');
        pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 210, 297); // A4 size: 210 x 297 mm
        pdf.save('content.pdf');
    });
});

		</script>
		
		<script>
function calculateTotal(input) {
    var parentDiv = input.closest('.book_entry');
    var quantity = parseFloat(parentDiv.querySelector('.quantity').value) || 0;
    var unitAmount = parseFloat(parentDiv.querySelector('.unit_amount').value) || 0;
    var totalAmount = quantity * unitAmount;
    parentDiv.querySelector('.total_amount').value = totalAmount.toFixed(2); // Format to two decimal places

    // Calculate and display the Grand Total
    calculateGrandTotal();
}

document.getElementById('add_book_button').addEventListener('click', function() {
    var clone = document.querySelector('.book_entry').cloneNode(true);
    var container = document.getElementById('books_container');
    container.appendChild(clone);
});

// Function to calculate and display the Grand Total
function calculateGrandTotal() {
    var totalAmountFields = document.querySelectorAll('.total_amount');
    var grandTotal = 0;
    totalAmountFields.forEach(function(field) {
        grandTotal += parseFloat(field.value) || 0;
    });
    document.getElementById('grand_total_display').innerHTML = "Grand Total: " + grandTotal.toFixed(2);
}
</script>
		
	</body>
	<!--end::Body-->

</html>